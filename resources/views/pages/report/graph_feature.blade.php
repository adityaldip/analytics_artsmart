<div class="mb-3 card" style="background:#111d2c">
	<div class="card-header" style="background:#111d2c">
		<div class="align-items-center row">
			<div class="d-flex align-items-center col">
				<button type="button" class="ms-sm-1 btn btn-falcon-default btn-sm" onclick="window.location.reload()">
					<i class="fa-solid fa-rotate-right"></i>
				</button>
			</div>
            
		</div>
	</div>

	<div class="card-body">
        <canvas id="feature" width="400" height="200"></canvas>
	</div>
</div>
<script scr="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.1/chart.min.js"></script>
<script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('graph.feature.data') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    createChart(data);
                },
                error: function(error) {
                    console.log("Error fetching data:", error);
                }
            });
            
            function createChart(data) {
                const dataModel = data.map(item => item.total);
                const label = data.map(item => item.name);

                var ctx = document.getElementById('feature').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar', // You can change the chart type (e.g., line, pie, etc.)
                    data: {
                        labels: label, // Replace with your labels
                        datasets: [{
                            label: 'Features',
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
        });
    </script>