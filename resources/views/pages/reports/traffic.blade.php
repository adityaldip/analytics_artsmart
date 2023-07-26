<div class="card overflow-hidden mb-3">
	<div class="card-body">
		<div class="echart-bar-monthly-usage echart-bar-top-products-ecommerce" data-echart-responsive="true" style="height:320px;"></div>
	</div>

	<div class="card-footer bg-light py-2">
			<div class="row flex-between-center g-0">
				<div class="col-auto">
					<div class="d-flex justify-content-between align-items-center">
						<select class="form-select form-select-sm report-select-menu mx-1" id="traffic-select-menu">
							<option value="daily" {{ $set == 'daily' ? 'selected' : '' }}>Every day</option>
							<option value="hourly" {{ $set == 'hourly' ? 'selected' : '' }}>Every hour</option>
						</select>

						
					</div>
				</div>
				<div class="col-auto text-success fs--1 fw-semi-bold">
					<span class="text-danger me-3"><span class="fs-2">{{ ($traffictotal > 0 && $traffictotal > $graph['images'][0]) ? ceil(($traffictotal-$graph['images'][0])/$traffictotal*100) : 0 }}%</span> error rate</span>
					<span class="fs-2">{{ number_format($traffictotal,0) }}</span> request
				</div>
			</div>
		</div>
</div>


<script src="{{ url('vendors/echarts/echarts.min.js') }}"></script>
<script src="{{ url('vendors/chart/chart.min.js') }}"></script>
<script src="{{ url('vendors/dayjs/dayjs.min.js') }}"></script>

<script type="text/javascript" src="{{ url('assets/js/utils.js?v='.env('BUILD_NUMBER', date('ymd'))) }}"></script>
<script type="text/javascript" src="{{ url('assets/js/graph2.js?v='.env('BUILD_NUMBER', date('ymd'))) }}"></script>


<script type="text/javascript" defer>
    setTimeout(function(){
    	graphInitSet(["Request count"], Object.values(JSON.parse(('{!! $traffic !!}'))));
    }, 2000);

    (function () {
	    $('#traffic-select-menu, #traffic-time-select-menu').on('change', function () {
			var url = $('#traffic-select-menu').val();
			

			if (url || time) {
				var turl = new URLSearchParams(window.location.search);

				if(url){
					turl.set('process', url);
				}
				
				window.location.search = turl;
			}
			return false;
		});
	})();
</script>