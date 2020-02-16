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
                        <div class="card">
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
                        </div>


                    </div>
                    <!-- END BEGIN PROFILE SIDEBAR -->
                    <!-- BEGIN PROFILE CONTENT -->
                    <div class="profile-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-head card-topline-aqua">
                                        <header>About Me</header>
                                    </div>
                                    <div class="card-body padding height-9">
                                        <div class="profile-desc">
                                            Hello I am Samyam a web and user interface designer. I love to work
                                            with the application interface and
                                            the web elements.
                                        </div>
                                        <ul class="list-group list-group-bordered">
                                            <li class="list-group-item">
                                                <b>Gender </b>
                                                <div class="profile-desc-item pull-right">{{strtoupper(Auth::user()->gender)}}</div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Contact</b>
                                                <div class="profile-desc-item pull-right">88888888</div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Skills</b>
                                                <div class="profile-desc-item pull-right">Java,Spring</div>
                                            </li>
                                        </ul>
                                        <div class="row list-separated profile  ">
                                            <div class="col-md-4 col-sm-4 col-6">
                                                <div class="uppercase profile-stat-title"> 37</div>
                                                <div class="uppercase profile-stat-text"> Projects</div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-6">
                                                <div class="uppercase profile-stat-title"> 51</div>
                                                <div class="uppercase profile-stat-text"> Tasks</div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-6">
                                                <div class="uppercase profile-stat-title"> 61</div>
                                                <div class="uppercase profile-stat-text"> Uploads</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-head card-topline-aqua">
                                        <header>Work Progress</header>
                                    </div>
                                    <div class="card-body padding height-9">
                                        <div class="work-monitor work-progress">
                                            <div class="states">
                                                <div class="info">
                                                    <div class="desc pull-left">Operations</div>
                                                    <div class="percent pull-right">80%</div>
                                                </div>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar progress-bar-danger progress-bar-striped active"
                                                         role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                         aria-valuemax="100" style="width: 70%">
                                                        <span class="sr-only">80% </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="states">
                                                <div class="info">
                                                    <div class="desc pull-left">Consultation</div>
                                                    <div class="percent pull-right">55%</div>
                                                </div>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar progress-bar-success progress-bar-striped active"
                                                         role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                         aria-valuemax="100" style="width: 45%">
                                                        <span class="sr-only">55% </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="states">
                                                <div class="info">
                                                    <div class="desc pull-left">Support</div>
                                                    <div class="percent pull-right">20%</div>
                                                </div>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar progress-bar-warning progress-bar-striped active"
                                                         role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                         aria-valuemax="100" style="width: 35%">
                                                        <span class="sr-only">20% </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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