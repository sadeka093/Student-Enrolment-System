@extends('student_layout')
@section('content')
<div class="col-12 col-lg-6 grid-margin">
	<div class="card">
		<div class="card-body">
			<h2 class="card-title">Basic form elements</h2>

			<p class="alert-success"><?php 
			$success=Session::get('success');
			if($success)
			{
				echo $success;
				Session::put('success',null);
			}
			?>  
		</p>

		<form class="forms-sample" method="post" action="{{ URL::to('/student_own_update') }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			
			<div class="form-group">
				<label for="exampleInputPassword1">Student Phone</label>
				<input type="test" class="form-control p-input" name="student_phone" placeholder="{{$student_description_view->student_phone}}">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Student Address</label>
				<input type="test" class="form-control p-input" name="student_address" placeholder="{{$student_description_view->student_address}}">
			</div> 
			<div class="form-group">
				<label for="exampleInputPassword1">Student Password</label>
				<input type="password" class="form-control p-input" name="student_password" placeholder="{{$student_description_view->student_password}}">
			</div>
			
		
			<button type="submit" class="btn btn-success btn-block">Update</button>
		</form>
	</div>
</div>
</div>
@endsection