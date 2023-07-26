@extends('layouts.page')


@push('vendor_scripts')
    

    {{-- <script src="{{ url('vendors/echarts/echarts.min.js') }}"></script>
    <script src="{{ url('vendors/chart/chart.min.js') }}"></script>
    <script src="{{ url('vendors/dayjs/dayjs.min.js') }}"></script>

    <script type="text/javascript" src="{{ url('assets/js/utils.js?v='.env('BUILD_NUMBER', date('ymd'))) }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/graph.js?v='.env('BUILD_NUMBER', date('ymd'))) }}"></script> --}}

    

    <script type="text/javascript">
    	(function () {
	    	// graphInit({
		    //   users: [
		    //     [200, 333, 400, 606, 451, 685, 404],
		    //     [100, 229, 707, 575, 420, 536, 258],
		    //   ],
		    //   appsumo: [
		    //     [322, 694, 235, 537, 791, 292, 806],
		    //     [584, 661, 214, 286, 526, 707, 627],
		    //   ],
		    //   recurring: [
		    //     [789, 749, 412, 697, 633, 254, 472],
		    //     [276, 739, 525, 394, 643, 653, 719],
		    //   ],
		    //   transactions: [
		    //     [625, 269, 479, 654, 549, 305, 671],
		    //     [499, 670, 550, 222, 696, 695, 469],
		    //   ],
		    //   images: [
		    //     [719, 697, 412, 697, 633, 254, 472],
		    //     [276, 739, 525, 394, 643, 653, 719],
		    //   ],
		    //   tunes: [
		    //     [625, 269, 695, 654, 549, 305, 671],
		    //     [499, 670, 550, 222, 696, 671, 469],
		    //   ],
		    // });


	    	$('#report-select-menu, #report-user-select-menu').on('change', function () {
	    		var type = $('#report-select-menu').val();
	    		var user = $('#report-user-select-menu').val();

	    		if (type || user) {
	    			var turl = new URLSearchParams(window.location.search);

	    			if(user){
							turl.set('user', user);
						}

						if(type){
							turl.set('type', type);
							turl.delete('start_date');
							turl.delete('end_date');
						}


	    			window.location.search = turl;
	    		}
	    		return false;
	    	});


	    	$('#search_date').on('click', function () {
	    		var user = $('#report-user-select-menu').val();
					var type = 'custom';
					var start = $('#start_date').val();
					var end = $('#end_date').val();
					

					if (start || end) {

						var turl = new URLSearchParams(window.location.search);


						if(user){
							turl.set('user', user);
						}

						if(type){
							turl.set('type', type);
						}

						if(start){
							turl.set('start_date', start);
						}

						if(end){
							turl.set('end_date', end);
						}
						
						window.location.search = turl;
					}
					return false;
				});
	    })();
    </script>

@endpush

@section('content-set')
<link href="{{ url('vendors/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
<div class="mb-3 card">
	<div class="bg-holder bg-card" style="background-image: url(&quot;/assets/img/illustrations/corner-4.png&quot;); border-top-right-radius: 0.375rem; border-bottom-right-radius: 0.375rem;"></div>
	<div class="position-relative card-body">
		<div class="row">
			<div class="col-lg-8">

				<h3 class="mb-0">Analysis Reports</h3>

			</div>
		</div>
	</div>
</div>
<div>



	<div class="card overflow-hidden mb-3">
		<div class="card-header report-chart-header p-0 bg-light scrollbar-overlay">
			<ul class="nav nav-tabs border-0 chart-tab flex-nowrap" id="report-chart-tab" role="tablist">

				<li class="nav-item" role="presentation"><a class="nav-link mb-0" id="users-tab" data-bs-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="false">
					<div class="report-tab-item p-2 pe-4">
						<h6 class="text-800 fs--2 text-nowrap">Users</h6>
						<h5 class="text-800">{{ number_format($graph['users'],0) }} Users</h5>
						
					</div>
				</a></li>

				<li class="nav-item" role="presentation"><a class="nav-link mb-0" id="recurring-tab" data-bs-toggle="tab" href="#recurring" role="tab" aria-controls="recurring" aria-selected="false">
					<div class="report-tab-item p-2 pe-4">
						<h6 class="text-800 fs--2 text-nowrap">Recurring Plan</h6>
						<h5 class="text-800">{{ number_format($graph['recurring'],0) }} Users</h5>
						
					</div>
				</a></li>
				
				<li class="nav-item" role="presentation"><a class="nav-link mb-0" id="transactions-tab" data-bs-toggle="tab" href="#transactions" role="tab" aria-controls="transactions" aria-selected="false">
					<div class="report-tab-item p-2 pe-4">
						<h6 class="text-800 fs--2 text-nowrap">Image Purchased</h6>
						<h5 class="text-800">{{ number_format($graph['transactions'],0) }} Credits</h5>
						
					</div>
				</a></li>
				<li class="nav-item" role="presentation"><a class="nav-link mb-0" id="images-tab" data-bs-toggle="tab" href="#images" role="tab" aria-controls="images" aria-selected="false">
					<div class="report-tab-item p-2 pe-4">
						<h6 class="text-800 fs--2 text-nowrap">Image Usage</h6>
						<h5 class="text-800">{{ number_format($graph['images'][1],0) }} Credits</h5>
						<div class="d-flex align-items-center">
							<h6 class="fs--2 mb-0 ms-1 text-warning">{{ number_format($graph['images'][0],0) }} Process</h6>
						</div>
					</div>
				</a></li>
				<li class="nav-item" role="presentation"><a class="nav-link mb-0" id="tunes-tab" data-bs-toggle="tab" href="#tunes" role="tab" aria-controls="tunes" aria-selected="false">
					<div class="report-tab-item p-2 pe-4">
						<h6 class="text-800 fs--2 text-nowrap">Tunes Usage</h6>
						<h5 class="text-800">{{ number_format($graph['tunes'][1],0) }} Credits</h5>
						<div class="d-flex align-items-center">
							<h6 class="fs--2 mb-0 ms-1 text-warning">{{ number_format($graph['tunes'][0],0) }} Process</h6>
						</div>
					</div>
				</a></li>

			</ul>
		</div>

		<div class="card-body">
          {{-- <div class="tab-content">
            <div class="tab-pane active" id="users" role="tabpanel" aria-labelledby="users-tab">
              <div class="echart-report" data-echart-responsive="true" style="height:320px;"></div>
            </div>
            <div class="tab-pane" id="appsumo" role="tabpanel" aria-labelledby="appsumo-tab">
              <div class="echart-report" data-echart-responsive="true" style="height:320px;"></div>
            </div>
            <div class="tab-pane" id="recurring" role="tabpanel" aria-labelledby="recurring-tab">
              <div class="echart-report" data-echart-responsive="true" style="height:320px;"></div>
            </div>
            <div class="tab-pane" id="transactions" role="tabpanel" aria-labelledby="transactions-tab">
              <div class="echart-report" data-echart-responsive="true" style="height:320px;"></div>
            </div>
            <div class="tab-pane" id="images" role="tabpanel" aria-labelledby="images-tab">
              <div class="echart-report" data-echart-responsive="true" style="height:320px;"></div>
            </div>
            <div class="tab-pane" id="tunes" role="tabpanel" aria-labelledby="tunes-tab">
              <div class="echart-report" data-echart-responsive="true" style="height:320px;"></div>
            </div>
          </div> --}}
        </div>

		<div class="card-footer bg-light py-2">
			<div class="row flex-between-center g-0">
				<div class="col-auto">
					<div class="d-flex justify-content-between align-items-center w-100">
						<select class="form-select form-select-sm report-select-menu mx-1" id="report-user-select-menu">
							<option value="free" {{ $usertype == 'free' ? 'selected' : '' }}>Free</option>
							<option value="api" {{ $usertype == 'api' ? 'selected' : '' }}>API</option>
							<option value="appsumo" {{ $usertype == 'appsumo' ? 'selected' : '' }}>AppSumo</option>
							<option value="all" {{ $usertype == 'all' ? 'selected' : '' }}>All Users</option>
						</select>

						<select class="form-select form-select-sm report-select-menu mx-1" {{ $startdate != '' || $enddate != '' ? 'disabled' : '' }} id="report-select-menu">
							<option value="daily" {{ $type == 'daily' ? 'selected' : '' }}>Today</option>
							<option value="weekly" {{ $type == 'weekly' ? 'selected' : '' }}>This week</option>
							<option value="last_week" {{ $type == 'last_week' ? 'selected' : '' }}>Last week</option>
							<option value="monthly" {{ $type == 'monthly' ? 'selected' : '' }}>This month</option>
							<option value="last_month" {{ $type == 'last_month' ? 'selected' : '' }}>Last month</option>
							<option value="all" {{ $type == 'all' ? 'selected' : '' }}>All of time</option>
						</select>
						<input class="mx-1" type="checkbox" id="checkbox_date" {{ $startdate != '' || $enddate != '' ? 'checked' : '' }}><span class="me-4">Custom</span>
						<div class="d-flex" style="width:200%;">
							<input class="form-control form-select-sm mx-1" id="start_date" type="text" placeholder="Y-m-d" name="start_date" style="{{ $startdate == '' ? 'visibility:hidden' : '' }}" value="{{ $startdate != '' ? $startdate : '' }}">
							<input class="form-control form-select-sm mx-1" id="end_date" type="text" placeholder="Y-m-d" name="end_date" style="{{ $enddate == '' ? 'visibility:hidden' : '' }}" value="{{ $enddate != '' ? $enddate : '' }}">
						</div>
						<button class="btn btn-sm btn-outline-primary" id="search_date" style="{{ $startdate == '' || $enddate == '' ? 'visibility:hidden' : '' }}"><i class="fas fa-search"></i></button>
						
					</div>

	
					
				</div>

				<div class="col-auto text-success fs--1 fw-semi-bold">
					@if($startdate == '' || $enddate == '')
					{{ isset($graph['time'][0]) ? $graph['time'][0] : '' }} {!! isset($graph['time'][1]) ? ' <span class="text-900 px-2">to</span>  '.$graph['time'][1] : '' !!}
					@else
					{{ $startdate != '' ? $startdate : '' }} {!! $enddate != '' ? ' <span class="text-900 px-2">to</span>  '.$enddate : '' !!}
					@endif
				</div>
				
			</div>
		</div>
	</div>
	<script src="{{ url('assets/js/flatpickr.js') }}"></script>
	<script src="{{ url('assets/js/rangePlugin.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.43/moment-timezone-with-data.min.js"></script>
	<script type="text/javascript">
		let timeZone = 'America/Los_Angeles';
		let timezonedDate_ = new moment.tz(timeZone);
		const fp = flatpickr("#start_date", {
			"mode":"range",
			"dateFormat":"Y-m-d",
			"disableMobile":true,
			"plugins": [new rangePlugin({ input: "#end_date"})],
			@if(!isset($startdate))
			"defaultDate": new Date(
            timezonedDate_.year(),
            timezonedDate_.month(),
            timezonedDate_.date()
        ), 
			@endif
		}); // flatpickr



		const checkbox = document.getElementById('checkbox_date')

		checkbox.addEventListener('change', (event) => {
		  if (event.currentTarget.checked) {

		    $('#report-select-menu').attr('disabled', true);
		    document.getElementById('start_date').style.visibility = 'visible';
		    document.getElementById('end_date').style.visibility = 'visible';
		    document.getElementById('search_date').style.visibility = 'visible';

		  } else {

		    $('#report-select-menu').attr('disabled', false)
		    document.getElementById('start_date').style.visibility = 'hidden';
		    document.getElementById('end_date').style.visibility = 'hidden';
		    document.getElementById('search_date').style.visibility = 'hidden';

		  }
		})
	</script>


@include('pages.reports.traffic')
@include('pages.reports.error_log')
@endsection
