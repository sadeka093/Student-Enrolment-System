@extends('layouts')
@section('content')

<div class="card">
	<div class="card-body">
		<h2 class="card-title">Data table</h2>
		<div class="row">
			<div class="col-12">
				<table id="order-listing" class="table table-striped" style="width:100%;">
					<thead>
						<tr>
							<th>St Roll #</th>
							<th>St Name</th>
							<th>Phone</th>
							<th>Image</th>
							<th>Address</th>
							<th>Department</th>
							<th>Action</th>

						</tr>
					</thead>
					<tbody>
						<?php $i=0; ?>
						@foreach($teachers as $teacher)
						<tr>
							<td>{{ $teacher->teachers_roll }}</td>
							<td>{{ $teacher->teachers_name }}</td>
							<td>{{ $teacher->teachers_phone }}</td>
							<td><img src="{{ asset('images/teachers/' . $teacher->teachers_image) }}" width="100" 
								height="120" /></td>
								<td>{{ $teacher->teachers_address }}</td>
								<td>
									@if($teacher->teachers_department==1)
									<span class="label label-success">{{'CSE'}}</span>    @elseif($teacher->teachers_department==2)
									<span class="label label-success">{{'EEE'}}</span>   @elseif($teacher->teachers_department==3)
									<span class="label label-success">{{'ECE'}}</span>   @elseif($teacher->teachers_department==4)
									<span class="label label-success">{{'BBA'}}</span> 
									@elseif($teacher->teachers_department==5)
									<span class="label label-success">{{'MBA'}}</span>  
									@else
									<span class="label label-success">{{'Not Defined'}}</span>
									@endif
								</td>

								<td>
								<!-- <a href="{{ URL::to('/teacherview',$teacher->teachers_id ) }}"><button class="btn btn-outline-primary">View</button></a> -->
									<!-- <a href="{{ URL::to('/teacheredit',$teacher->teachers_id ) }}"><button class="btn btn-outline-warning">Edit</button></a> -->
									 <!-- <button class="btn btn-outline-danger">Delete</button> -->
									<a href="#deleteModal{{ $teacher->teachers_id }}" data-toggle="modal" ><button class="btn btn-outline-danger">Delete</button></a>

									<!-- DELETE  Modal -->
									<div class="modal fade" id="deleteModal{{ $teacher->teachers_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLongTitle">Are you sure to delete?</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form action="{!! route('admin.deleteteacher',$teacher->teachers_id ) !!}" method="post">

														{{ csrf_field() }}
														<button type="submit" class="btn btn-danger">Permanent Delete</button>
													</form>

												</div>
												<div class="modal-footer">


													<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
												</div>
											</div>
										</div>
									</div> 
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	@endsection