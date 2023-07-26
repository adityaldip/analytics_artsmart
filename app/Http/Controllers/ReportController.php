<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Modules\Transaction;
use App\Models\Modules\CreditUsage;
use App\Models\Modules\PlaygroundGenerate;
use App\Models\Modules\CouponTier;
use App\Models\Modules\Plans;
use App\Models\Modules\LoadBalancerLog;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;
use Cache;
use Carbon\Carbon;
use App\Models\Enums\TransactionTypeEnum;
use App\Models\Enums\CreditSourceTypeEnum;
use App\Models\Enums\SubscriptionTypeEnum;

/**
 * Class ReportController
 */
class ReportController extends Controller
{

    public function index(Request $request)
    {

        $user = $request->input('user', 'all');
        $type = $request->input('type', 'daily');

        $process = $request->input('process');

        $start_date = $request->input('start_date', null);
        $start_date_ = $start_date;
        if(!is_null($start_date)){
            $start_date = Carbon::createFromFormat('Y-m-d', $start_date, 'America/Los_Angeles');
            $start_date->setTimezone('UTC');
            $start_date = $start_date->toDateString();
        }
        


        $end_date = $request->input('end_date', null);
        $end_date_ = $end_date;
        if(!is_null($end_date)){
            $end_date = Carbon::createFromFormat('Y-m-d', $end_date, 'America/Los_Angeles');
            $end_date->setTimezone('UTC');
            $end_date = $end_date->toDateString();
        }

        $traffic = $this->getTraffic($process, $type, $start_date, $end_date);
        $graph_arr = $this->getUsage($user, $type, $start_date, $end_date, $request);
        

        return view('pages.reports.index')
            ->withTraffic($traffic['graph'])
            ->withTraffictotal($traffic['total'])
            ->withGraph($graph_arr)
            ->withUsertype($user)
            ->withSet($process)
            ->withStartdate($start_date_)
            ->withEnddate($end_date_)
            ->withType($type);

    }


    private function getUsage($user, $type, $start_date, $end_date, $request){

        if(Cache::has("999_graph_arr_".$user.'_'.$type.'_'.$start_date.'_'.$end_date)) {
            $graph_arr = Cache::get("999_graph_arr_".$user.'_'.$type.'_'.$start_date.'_'.$end_date);

            return $graph_arr;
        }


        $users = 0;
        $recurring = 0;

        $transactions = 0;
        $images0 = 0;
        $tunes0 = 0;
        $images1 = 0;
        $tunes1 = 0;

        $time0 = null;
        $time1 = null;


        $user_id = [];
        $tier_arr = [];
        $tiers = CouponTier::where('is_active', 1)->get();

        if(count($tiers) > 0) {
            foreach ($tiers as $key => $value) {
                $tier_arr[$value->id] = $value;
            }
        }

        $plan_arr = [];
        $plans_all = Plans::where('is_active', 1)->get();

        if(count($plans_all) > 0) {
            foreach ($plans_all as $key => $value) {
                $plan_arr[$value->id] = $value;
            }
        }

        $graph = User::select("id","tier_id", "plan_id", "credit", "created_at");

        if(is_null($start_date) && is_null($end_date)){

            if($type == 'daily') $graph = $graph->whereDate('created_at', '=', Carbon::now()->toDateString());

            if($type == 'weekly') $graph = $graph->where('created_at', '>=', Carbon::now()->startOfWeek()->toDatetimeString())->where('created_at', '<=', Carbon::now()->endOfWeek()->toDatetimeString());
            if($type == 'last_week') $graph = $graph->where('created_at', '>=', Carbon::now()->startOfWeek()->subWeek()->toDatetimeString())->where('created_at', '<=', Carbon::now()->endOfWeek()->subWeek()->toDatetimeString());


            if($type == 'monthly') $graph = $graph->where('created_at', '>=', Carbon::now()->startOfMonth()->toDatetimeString())->where('created_at', '<=', Carbon::now()->endOfMonth()->toDatetimeString());
            if($type == 'last_month') $graph = $graph->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth()->toDatetimeString())->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth()->toDatetimeString());

            if($type == 'all') $graph = $graph->whereDate('created_at', '>', '2023-01-29');
        } else {
            $graph = $graph->where('created_at', '>', $start_date.' 00:00:00')->where('created_at', '<=', $end_date.' 23:59:59');
        }


        // die(print_r($graph->toSql()));



        $graph = $graph->chunk(200, function($rows) use($type, $user, $tier_arr, $plan_arr, &$user_id, &$users, &$recurring, &$transactions) {

            if(count($rows) > 0) {
                foreach ($rows as $key => $value) {


                    if($user == 'all'){

                        $user_id[] = $value->id;
                        $users += 1;
                        if(!is_null($value->plan_id)) $recurring += 1;

                        $tier_credit = isset($tier_arr[$value->tier_id]) ? $tier_arr[$value->tier_id]->benefit_credit : 0;
                        $plan_credit = isset($plan_arr[$value->plan_id]) ? (int)$plan_arr[$value->plan_id]->credit : 0;

                        $transactions += ($value->credit + $tier_credit + $plan_credit);
                    }

                    if($user == 'appsumo'){
                        if(!is_null($value->tier_id)) {
                            $user_id[] = $value->id;
                            $users += 1;

                            $tier_credit = isset($tier_arr[$value->tier_id]) ? $tier_arr[$value->tier_id]->benefit_credit : 0;
                            $plan_credit = isset($plan_arr[$value->plan_id]) ? (int)$plan_arr[$value->plan_id]->credit : 0;

                            $transactions += ($value->credit + $tier_credit + $plan_credit);

                        }
                        if(!is_null($value->tier_id) && !is_null($value->plan_id)) $recurring += 1;
                    }

                    if($user == 'free'){
                        if(is_null($value->tier_id) && is_null($value->plan_id)) {
                            $user_id[] = $value->id;
                            $users += 1;

                            $tier_credit = isset($tier_arr[$value->tier_id]) ? $tier_arr[$value->tier_id]->benefit_credit : 0;
                            $plan_credit = isset($plan_arr[$value->plan_id]) ? (int)$plan_arr[$value->plan_id]->credit : 0;

                            $transactions += ($value->credit + $tier_credit + $plan_credit);
                        }
                        $recurring = 0;
                    }

                    if($user == 'api'){
                        if(!is_null($value->plan_id) && in_array($plan_arr[$value->plan_id]->slug, ['standard', 'business'])) {
                            $user_id[] = $value->id;
                            $users += 1;

                            $tier_credit = isset($tier_arr[$value->tier_id]) ? $tier_arr[$value->tier_id]->benefit_credit : 0;
                            $plan_credit = isset($plan_arr[$value->plan_id]) ? (int)$plan_arr[$value->plan_id]->credit : 0;

                            $transactions += ($value->credit + $tier_credit + $plan_credit);
                        }
                        if(!is_null($value->plan_id) && in_array($plan_arr[$value->plan_id]->slug, ['standard', 'business'])) $recurring += 1;
                    }


                }
            }

        });

        // die(print_r($user_id));

        $api_arr = [];
        if($user == 'api'){
            $api_arr = PlaygroundGenerate::select('playground_generate.id')
            ->whereIn('playground_generate.user_id', $user_id)
            ->leftJoin('generate', function ($join) {
                $join->on('playground_generate.generate_id', '=', 'generate.id');
                $join->where('generate.request_via', '=', 'api');
            })
            ->pluck('id')->toArray();
        }
        

        $usages = CreditUsage::select("source_type", "subscription_type", DB::raw("sum(value) as output, count(1) as total"))
        // ->whereIn('credit_usage.user_id', $user_id)
        ->when(($user == 'api'), function($q) use($api_arr) {
            $q->whereIn('credit_usage.playground_generate_id', $api_arr);
        })
     
        ->whereIn('credit_usage.source_type', [CreditSourceTypeEnum::CREDIT->value, CreditSourceTypeEnum::TUNE_CREDIT->value])
        ->whereIn('credit_usage.subscription_type', [SubscriptionTypeEnum::LIFETIME->value, SubscriptionTypeEnum::RECURRING->value])
        ->groupBy('credit_usage.subscription_type', 'credit_usage.source_type');

        if(is_null($start_date) && is_null($end_date)){

            if($type == 'daily') {
                $time0 = Carbon::now();
                $usages = $usages->whereDate('credit_usage.created_at', '=', $time0->toDateString());
            }
            if($type == 'weekly') {

                $time0 = Carbon::now()->startOfWeek();
                $time1 = Carbon::now()->endOfWeek();
                $usages = $usages->where('credit_usage.created_at', '>=', $time0->toDatetimeString())->where('credit_usage.created_at', '<=', $time1->toDatetimeString());
            }
            if($type == 'last_week') {

                $time0 = Carbon::now()->startOfWeek()->subWeek();
                $time1 = Carbon::now()->endOfWeek()->subWeek();
                $usages = $usages->where('credit_usage.created_at', '>=', $time0->toDatetimeString())->where('credit_usage.created_at', '<=', $time1->toDatetimeString());
            }
            if($type == 'monthly') {
                $time0 = Carbon::now()->startOfMonth();
                $time1 = Carbon::now()->endOfMonth();
                $usages = $usages->where('credit_usage.created_at', '>=', $time0->toDatetimeString())->where('credit_usage.created_at', '<=', $time1->toDatetimeString());
            }
            if($type == 'last_month') {
                $time0 = Carbon::now()->startOfMonth()->subMonth();
                $time1 = Carbon::now()->endOfMonth()->subMonth();
                $usages = $usages->where('credit_usage.created_at', '>=', $time0->toDatetimeString())->where('credit_usage.created_at', '<=', $time1->toDatetimeString());
            }
            if($type == 'all') {
                $usages = $usages->whereDate('credit_usage.created_at', '>', '2023-01-29');
            }
        } else {
            $usages = $usages->where('credit_usage.created_at', '>=', $start_date.' 00:00:00')->where('credit_usage.created_at', '<=', $end_date.' 23:59:59');
        }

        $usages = $usages->get();

        // die(print_r($usages->toJson()));


        if(count($usages) > 0) {

            foreach ($usages as $key => $value) {
                
                if($value->source_type == CreditSourceTypeEnum::CREDIT->value) {
                    $images0 += $value->total;
                    $images1 += $value->output;
                }

                if($value->source_type == CreditSourceTypeEnum::TUNE_CREDIT->value) {
                    $tunes0 += $value->total;
                    $tunes1 += $value->output;
                }
                

            }
        }



        $graph_arr = Cache::remember("999_graph_arr_".$user.'_'.$type.'_'.$start_date.'_'.$end_date, 60, function() use($users, $recurring, $transactions, $images0, $images1, $tunes0, $tunes1, $time0, $time1) {
            return [
                'users' => $users,
                'recurring' => $recurring,
                'transactions' => $transactions,
                'images' => [$images0, $images1],
                'tunes' => [$tunes0, $tunes1],
                'time' => [(!is_null($time0) ? $time0->format('M d, Y') : null), (!is_null($time1) ? $time1->format('M d, Y') : null)]
            ];
        });

        return $graph_arr;


    }


    private function getTraffic($type, $time, $start_date, $end_date){

        $timezone = 'America/Los_Angeles';

        if(Cache::has("999_traffic_graph_arr_".$type.'_'.$time.'_'.$timezone.'_'.$start_date.'_'.$end_date)) {
            $init_graph = Cache::get("999_traffic_graph_arr_".$type.'_'.$time.'_'.$timezone.'_'.$start_date.'_'.$end_date);
            return $init_graph;
        }


        if($type == 'hourly'){
            $init = "date_format(created_at, '%Y-%m-%d %H')";
            $format = "d M, gA";
            $extra = ':00:00';
        } else {
            $init = "date(created_at)";
            $format = "d M";
            $extra = '';
        }



        $query = LoadBalancerLog::select(DB::raw("count(1) as total, ".$init." as date"));

        if(is_null($start_date) && is_null($end_date)){
            if($time == 'daily') {
                $time0 = Carbon::now();
                $query = $query->whereDate('created_at', '=', $time0->toDateString());
            }
            if($time == 'weekly') {
                $time0 = Carbon::now()->startOfWeek();
                $time1 = Carbon::now()->endOfWeek();
                $query = $query->where('created_at', '>=', $time0->toDatetimeString())->where('created_at', '<=', $time1->toDatetimeString());
            }
            if($time == 'last_week') {
                $time0 = Carbon::now()->startOfWeek()->subWeek();
                $time1 = Carbon::now()->endOfWeek()->subWeek();
                $query = $query->where('created_at', '>=', $time0->toDatetimeString())->where('created_at', '<=', $time1->toDatetimeString());
            }
            if($time == 'monthly') {
                $time0 = Carbon::now()->startOfMonth();
                $time1 = Carbon::now()->endOfMonth();
                $query = $query->where('created_at', '>=', $time0->toDatetimeString())->where('created_at', '<=', $time1->toDatetimeString());
            }
            if($time == 'last_month') {
                $time0 = Carbon::now()->startOfMonth()->subMonth();
                $time1 = Carbon::now()->endOfMonth()->subMonth();
                $query = $query->where('created_at', '>=', $time0->toDatetimeString())->where('created_at', '<=', $time1->toDatetimeString());
            }
            if($time == 'all') {
                $query = $query->whereDate('created_at', '>', '2023-01-29');
            }
        } else {

            $query = $query->where('created_at', '>', $start_date.' 00:00:00')->where('created_at', '<=', $end_date.' 23:59:59');
        }

        

        $query = $query->groupBy('date')
        ->get();



        $graph = [];
        $init_graph = [];
        $all = 0;
        if(count($query) > 0){
       
            foreach ($query as $key => $value) {
    
                $date = Carbon::createFromFormat(($type == 'hourly' ? 'Y-m-d H:i:s' : 'Y-m-d'), $value->date.$extra, 'UTC');
                $date->setTimezone($timezone);



                $init_graph[] = [
                    $date->format($format),
                    str_replace(".00", "", (string) number_format($value->total, 2, ".", "")),
                ];

                $all += $value->total;
            }
        }



        $init_graph = Cache::remember("999_traffic_graph_arr_".$type.'_'.$time.'_'.$timezone.'_'.$start_date.'_'.$end_date, 60, function() use($init_graph, $all) {
            return [
                'graph' => json_encode(array_merge([["product", "Request count"]], $init_graph)),
                'total' => $all
            ];
        });

        return $init_graph;
    }


    


   
}
