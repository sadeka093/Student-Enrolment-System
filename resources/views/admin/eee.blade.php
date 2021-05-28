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
                    	@foreach($eee_students as $student)
                      <tr>
                          <td>{{ $student->student_roll }}</td>
                          <td>{{ $student->student_name }}</td>
                          <td>{{ $student->student_phone }}</td>
                          <td><img src="{{ asset('images/students/' . $student->student_image) }}" width="100" 
     height="120" /></td>
                          <td>{{ $student->student_address }}</td>
                          <td>
                          @if($student->student_department==1)
                          <span class="label label-success">{{'CSE'}}</span>    @elseif($student->student_department==2)
                          <span class="label label-success">{{'EEE'}}</span>   @elseif($student->student_department==3)
                          <span class="label label-success">{{'ECE'}}</span>   @elseif($student->student_department==4)
                          <span class="label label-success">{{'BBA'}}</span> 
                          @elseif($student->student_department==5)
                          <span class="label label-success">{{'MBA'}}</span>  
                          @else
                          <span class="label label-success">{{'Not Defined'}}</span>
                          @endif
                          </td>
                        
                          <td>
                            <button class="btn btn-outline-primary">View</button>
                            <button class="btn btn-outline-warning">Edit</button>
                            <button class="btn btn-outline-danger">Delete</button>
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
