<div class="mb-3 card" style="background:#111d2c">
	<div class="card-header" style="background:#111d2c">
		<div class="align-items-center row">
			<div class="d-flex align-items-center col-sm-9">
				<button type="button" class="ms-sm-1 btn btn-falcon-default btn-sm" onclick="window.location.reload()">
					<i class="fa-solid fa-rotate-right"></i>
				</button>
                
			</div>
            <div class="d-flex align-items-right col-sm-3">
                <select class="ms-sm-1 form-select form-sm" id="range">
                    <option value="7">Last Week</option>
                    <option value="30">Last 30 Days</option>
                    <option value="90">Last 90 Days</option>
                </select>
            </div>            
		</div>
	</div>

	<div class="card-body">
        <canvas id="error" width="400" height="200"></canvas>
	</div>
</div>
<script scr="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.1/chart.min.js"></script>
<script>
        $(document).ready(function() {
            let myChart; // Declare the chart variable

            $.ajax({
                url: "{{ route('graph.error.data') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    myChart = createChart(data,7);

                },
                error: function(error) {
                    console.log("Error fetching data:", error);
                }
            });

            $('#range').on('change', function() {
                $.ajax({
                    url: "{{ route('graph.error.data') }}",
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        myChart.destroy();
                        myChart = createChart(data,$('#range').val());
                    },
                    error: function(error) {
                        console.log("Error fetching data:", error);
                    }
                });
            })
            
            function createChart(data,range) {
                const newdata = filterData(data,range)
                const dataModel = newdata.map(item => item.total);
                const label = newdata.map(item => item.date);
                
                var ctx = document.getElementById('error').getContext('2d');
                return myChart = new Chart(ctx, {
                    type: 'bar', // You can change the chart type (e.g., line, pie, etc.)
                    data: {
                        labels: label, // Replace with your labels
                        datasets: [{
                            label: 'Error Count',
                            data: dataModel,
                            backgroundColor: '#3e7ee6', // Customize the color
                            barThickness: 20
                        }]
                    },
                    options: {
                        // Add additional options and customization here

                    }
                });
            }

            // Function to filter data
            function filterData(data,range) {
                const today = new Date();
                const oneWeekAgo = new Date(today.getTime() - range * 24 * 60 * 60 * 1000);

                const date = data.filter(item => {
                    const dateObj = new Date(item.date);
                    return dateObj >= oneWeekAgo && dateObj <= today;
                });

                return date;
            }
        });
    </script>