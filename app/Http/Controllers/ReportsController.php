<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class ReportsController extends Controller
{
    public function index()
    {
        return view('pages.report.index');
    }
    public function home()
    {
        return view('pages.report.page');
    }

    public function data()
    {
        try {
            if(Cache::has("generate_error_data")) {
                $model = Cache::get("generate_error_data");
            }else{
                $model = DB::table('generate')
                ->join('playground_generate', 'generate.id', '=', 'playground_generate.generate_id')
                ->select("request_via", "predict_time","error","generate.created_at","playground_generate.diffusion_mode","generate.url")->where("status",'failed')->orderBy('generate.created_at','desc')->get(); 
                Cache::remember('generate_error_data', 3600, function () use ($model){
                    return $model;
                });
            }
            $data = datatables()->of($model)
            ->addColumn('description', function ($pasien) {
                $html = "<ul>";
                $html .= "<li> Action:</li>";
                $html .= "<li> Via:".$pasien->request_via."</li>";
                $html .= "<li> Model:".$pasien->diffusion_mode."</li>";
                $html .= "<li> time:".$pasien->predict_time."</li>";
                $html .= "</ul>";
                return $html;
            })
            ->rawColumns(['description'])
            ->toJson();
            return $data;
        } catch (Exception $ex) {
            dd($ex);
        }
    }

    public function modelData()
    {
        if(Cache::has("generate_graph_model_data")) {
            $model = Cache::get("generate_graph_model_data");
        }else{
            $model = DB::table('playground_generate')
            ->selectRaw("diffusion_mode, count(*) as total")->groupBy('diffusion_mode')->get(); 
            Cache::remember('generate_graph_model_data', 3600, function () use ($model){
                return $model;
            });
        }
        return response()->json($model);
    }
    public function featureData()
    {
        if(Cache::has("generate_graph_feature_data")) {
            $model = Cache::get("generate_graph_feature_data");
        }else{
            $model = DB::table('playground_generate')
            ->selectRaw("plugin_sort, count(*) as total")
            ->groupBy('plugin_sort')->get(); 
            Cache::remember('generate_graph_feature_data', 3600, function () use ($model){
                return $model;
            });
        }
        return response()->json($model);
    }

    public function errorData()
    {
        if(Cache::has("generate_graph_error_data")) {
            $modelError = Cache::get("generate_graph_error_data");
        }else{
            $modelError = DB::table('generate')
            ->selectRaw("date(created_at) as date, count(*) as total")
            ->where('status','failed')
            ->groupByRaw("date(created_at)")->orderByRaw("date(created_at)")->get(); 
            Cache::remember('generate_graph_error_data', 3600, function () use ($modelError){
                return $modelError;
            });
        }
        return response()->json($modelError);
    }
}
