@extends('student_layout')
@section('content')
 
    
    
          <div class="row user-profile">
            <div class="col-lg-12 side-left">
              <div class="card mb-6">
                <div class="card-body avatar">
                  <h2 class="card-title">Info</h2>
                 <img src="{{ asset('images/students/' . $student_profile->student_image) }}" width="100" 
     height="120" />
                  <p class="name">{{ $student_profile->student_name }}</p>
                  <p class="designation">@if($student_profile->student_department==1)
                          <span class="label label-success">{{'CSE'}}</span>    @elseif($student_profile->student_department==2)
                          <span class="label label-success">{{'EEE'}}</span>   @elseif($student_profile->student_department==3)
                          <span class="label label-success">{{'ECE'}}</span>   @elseif($student_profile->student_department==4)
                          <span class="label label-success">{{'BBA'}}</span> 
                          @elseif($student_profile->student_department==5)
                          <span class="label label-success">{{'MBA'}}</span>  
                          @else
                          <span class="label label-success">{{'Not Defined'}}</span>
                          @endif</p>
                  <a class="email" href="#">{{ $student_profile->student_email }}</a>
                  <a class="number" href="#">{{ $student_profile->student_phone }}</a>
                </div>
              </div>
              <div class="card mb-6">
                <div class="card-body overview">
                  <ul class="achivements">
                    <li><p>34</p><p>Projects</p></li>
                    <li><p>23</p><p>Task</p></li>
                    <li><p>29</p><p>Completed</p></li>
                  </ul>
                  <div class="wrapper about-user">
                    <h2 class="card-title mt-4 mb-3">About</h2>
                    <p>All informations about the student are given below  </p>
                  </div>
                  <div class="info-links">
                    <a class="website" href="https://www.bootstrapdash.com/">
                      <i class="icon-globe icon">Father's Name</i>
                      <span style="font-family: vermade; font-size: 15px;">{{ $student_profile->student_fathername}}</span>
                    </a>
                    <a class="website" href="https://www.bootstrapdash.com/">
                      <i class="icon-globe icon">Mother's Name</i>
                      <span style="font-family: vermade; font-size: 15px;">{{ $student_profile->student_mothername}}</span>
                    </a><a class="website" href="https://www.bootstrapdash.com/">
                      <i class="icon-globe icon">Student Roll</i>
                      <span style="font-family: vermade; font-size: 15px;">{{ $student_profile->student_roll}}</span>
                    </a><a class="website" href="https://www.bootstrapdash.com/">
                      <i class="icon-globe icon">Student Address</i>
                      <span style="font-family: vermade; font-size: 15px;">{{ $student_profile->student_address}}</span>
                    </a>
                  
                  </div>
                </div>
              </div>
            </div>
           
          </div>
       
     
@endsection
