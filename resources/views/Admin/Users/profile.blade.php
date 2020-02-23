@extends('Admin.layouts.master')
@section('main_content')
    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Your Profile</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                               href="{{route('admin-dashboard')}}">Home</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>

                        <li class="active">User Profile</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PROFILE SIDEBAR -->
                    <div class="profile-sidebar">
                        <div class="card card-topline-aqua">
                            <div class="card-body padding height-9">
                                <div class="row">
                                    <div class="profile-userpic">
                                        <img src="{{asset('Uploads/users/thumbnails/'.Auth::user()->image )}}"
                                             class="img-responsive" alt=""></div>
                                </div>
                                <div class="profile-usertitle">
                                    <div class="profile-usertitle-name">{{Auth::user()->name}}</div>                           
                                    <div class="profile-usertitle-job"> {{strtoupper(Auth::user()->roles->name)}}</div>
                                    <div class="profile-usertitle-email">Email : {{(Auth::user()->email)}} </div>
                                    <div class="profile-usertitle-job">Joined Date/Time
                                        : {{strtoupper(Auth::user()->created_at)}}</div>

                                </div>
                                <ul class="list-group list-group-unbordered">
                                    @if(Auth::user()->roles->name == 'super_admin')
                                        <li class="list-group-item">
                                            <b>Total Providers</b> <a class="pull-right">{{$providers}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Total Subscribers</b> <a class="pull-right">{{$subscriber}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Total Employee</b> <a class="pull-right">{{$employee}}</a>
                                        </li>
                                    @endif


                                </ul>
                                <!-- END SIDEBAR USER TITLE -->
                                <!-- SIDEBAR BUTTONS -->
                                <div class="profile-userbuttons">
                                    <a href="{{route('update_profile')}}">
                                        <button type="button" class="btn btn-circle green btn-sm">Update
                                            Profile
                                        </button>
                                    </a>
                                    {{--<button type="button" class="btn btn-circle red btn-sm">Message</button>--}}
                                </div>
                                <!-- END SIDEBAR BUTTONS -->
                            </div>
                        </div>
                        <!-- <div class="card">
                            <div class="card-head card-topline-aqua">
                                <header>Performance</header>
                            </div>
                            <div class="card-body padding height-9">
                                <ul class="performance-list">
                                    <li>
                                        <a href="user_profile.html#">
                                            <i class="fa fa-circle-o" style="color:#F39C12;"></i> Total Product
                                            Sales <span class="pull-right">23456</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="user_profile.html#">
                                            <i class="fa fa-circle-o" style="color:#DD4B39;"></i> Total Product
                                            Refer <span class="pull-right">$234</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="user_profile.html#">
                                            <i class="fa fa-circle-o" style="color:#00A65A;"></i> Total Earn
                                            <span class="pull-right"> $345000</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div> -->

                                <div class="card">
                                    <div class="card-head card-topline-aqua">
                                        <header>Personal Details</header>
                                    </div>
                                    <div class="card-body padding height-9">
                                        <!-- <div class="profile-desc">
                                            Hello I am Samyam a web and user interface designer. I love to work
                                            with the application interface and
                                            the web elements.
                                        </div> -->
                                        <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item">
                                                <b>Current Address</b>
                                                <div class="profile-desc-item pull-right">{{$prsnl->address1}}</div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Permanent Address</b>
                                                <div class="profile-desc-item pull-right">{{$prsnl->address2}}</div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Gender </b>
                                                <div class="profile-desc-item pull-right">{{strtoupper(Auth::user()->gender)}}</div>
                                            </li>
                                            
                                            <li class="list-group-item">
                                                <b>Department</b>
                                                <div class="profile-desc-item pull-right">{{Auth::user()->department->name}}</div>
                                            </li>

                                            <li class="list-group-item">
                                                <b>Contact No.</b>
                                                <div class="profile-desc-item pull-right">{{$prsnl->phone1.' and  '.$prsnl->phone2}}</div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Date of Birth</b>
                                                <div class="profile-desc-item pull-right">{{$prsnl->date_of_birth}}</div>
                                            </li>
                                        </ul>                                        
                                    </div>
                                </div>

                    </div>
                    <!-- END BEGIN PROFILE SIDEBAR -->
                    <!-- BEGIN PROFILE CONTENT -->
                    <div class="profile-content">
                        <div class="row">
                            <div class="col-md-12">
                                
                                <div class="card">
                                    <div class="card-head card-topline-aqua">
                                        <header>Education Details</header>
                                    </div>
                                    <div class="card-body padding height-9">
                                        
                                        <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item">
                                                <b>Degree </b>
                                                <div class="profile-desc-item pull-right">{{ $educ ? $educ->degree->degree_name : ''}}</div>
                                            </li>
                                            
                                            <li class="list-group-item">
                                                <b>Board</b>
                                                <div class="profile-desc-item pull-right">{{ $educ ? $educ->board : ''}}</div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Faculty</b>
                                                <div class="profile-desc-item pull-right">{{ $educ ? $educ->faculty : ''}}</div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Institute Name</b>
                                                <div class="profile-desc-item pull-right">{{ $educ ? $educ->inst_name : ''}}</div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Institute Address</b>
                                                <div class="profile-desc-item pull-right">{{ $educ ? $educ->inst_address : ''}}</div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Passed Year</b>
                                                <div class="profile-desc-item pull-right">{{ $educ ? $educ->passed_year : ''}}</div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Division</b>
                                                <div class="profile-desc-item pull-right">{{ $educ ? $educ->passed_division : ''}}</div>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-head card-topline-aqua">
                                        <header>Work Details</header>
                                    </div>
                                    <div class="card-body padding height-9">
                                        
                                        <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item">
                                             <b> Work Experience</b>
                                                <div class="profile-desc">
                                                {{ $wrk ? $wrk->work_exp : ''}}
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Profession </b>
                                                <div class="profile-desc-item pull-right">{{ $wrk ? $wrk->profession : ''}}</div>
                                            </li>
                                                                                                                                    
                                            <li class="list-group-item">
                                                <b>Organization Name</b>
                                                <div class="profile-desc-item pull-right">{{ $wrk ? $wrk->org_name : ''}}</div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Organization Address</b>
                                                <div class="profile-desc-item pull-right">{{ $wrk ? $wrk->org_address : ''}}</div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Organization Phone</b>
                                                <div class="profile-desc-item pull-right">{{$wrk ? 'Telephone : '. $wrk->phone_1.' '.' Mobile : '.$wrk->phone_2 : ''}}</div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Organization PAN No.</b>
                                                <div class="profile-desc-item pull-right">{{ $wrk ? $wrk->org_pan : ''}}</div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Service Fee</b>
                                                <div class="profile-desc-item pull-right">{{ $wrk ? $wrk->fee : ''}}</div>
                                            </li>
                                            @if($wrk->document)
                                            <li class="list-group-item">
                                                <b>Document</b>
                                                <div class="profile-desc-item pull-right">
                                                <img src="{{asset('Uploads/work_document'.$wrk->document)}}"
                                                         alt="" width="auto" height="100px">
                                                </div>                                                                  
                                            @else
                                                <div class="profile-desc-item pull-right">No Document available</div>
                                                </li> 
                                            @endif
                                        </ul>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PROFILE CONTENT -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content -->

    </div>
    <!-- end page container -->
@endsection