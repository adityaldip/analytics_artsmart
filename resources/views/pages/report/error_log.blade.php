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
		<div class="table-responsive" >
			<table class="table table-hover" id="kt_datatable">
				<thead style="color:#d2dde9;">
					<tr>
						<th >Date</th>
						<th style="width:100px;">Description</th>
						<th >URL</th>
						<th >Detail</th>
					</tr>
				</thead>
				<tbody style="color:#d2dde9;">
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script>
        // Class definition
        var KTDatatablesServerSide = function () {
            var table;
            var dt;
            // Private functions
            var initDatatable = function () {
                dt = $("#kt_datatable").DataTable({
                    processing: true,
                    serverSide: true,
                    responsive:true,
                    cache:true,
                    deferRender:true,
                    ajax: {
                        url: "{{ url('error-data') }}/",
                    },
                    columns: [
                        {data: 'created_at',orderable: true, searchable: true},
                        {data: 'description',orderable: true, searchable: true},
                        {data: 'url',orderable: true, searchable: true},
                        {data: 'error',orderable: true, searchable: true},
                    ]
                });

                table = dt.$;
            }

            // Public methods
            return {
                init: function () {
                    initDatatable();
                }
            }
        }();

		$(document).ready(function() {
            KTDatatablesServerSide.init();
		});
</script>