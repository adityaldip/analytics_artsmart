<div class="card">
	<div class="card-header">
		<div class="align-items-center row">
			<div class="d-flex align-items-center col">
				<button type="button" class="ms-sm-1 btn btn-falcon-default btn-sm" onclick="window.location.reload()">
					<i class="fa-solid fa-rotate-right"></i>
				</button>
			</div>
			<div class="col-auto">

				
			</div>
		</div>
	</div>

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">Date</th>
						<th scope="col">Description</th>
						<th scope="col">Type</th>
						<th scope="col">Detail</th>
					</tr>
				</thead>
				<tbody>
					{{-- @forelse ($transactions as $transaction) --}}
					<tr class="align-top">
						<td class="text-nowrap">sasas</td>
						<td class="text-nowrap">

							<ul>
								<li>Action: dsadsad</li>
								<li>Via: dasdsad</li>
								<li>Model: dasdsad</li>
								<li>Time: dasdsadsadsad</li>
							</ul>


						</td>
						<td class="text-nowrap">dasdsad</td>
						<td class="text-nowrap">dasdsadad</td>

					</tr>
					{{-- @empty --}}
					{{-- No Data --}}
					{{-- @endforelse --}}
				</tbody>
			</table>
		</div>
	</div>

	<div class="card-footer">
		{{-- @include('layouts.pagination', ['paginator' => $transactions, 'search' => '']) --}}
	</div>

</div>