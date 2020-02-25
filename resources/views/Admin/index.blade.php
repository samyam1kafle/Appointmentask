@extends('Admin.layouts.master')
@section('main_content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        @if($Roles->name=='employee')
                            <div class="page-title">Employee Dashboard</div>
                        @endif
                        @if($Roles->name=='admin')
                            <div class="page-title">Admin Dashboard</div>
                        @endif
                        @if($Roles->name=='super_admin')
                            <div class="page-title">Super Admin Dashboard</div>
                        @endif
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                            href="{{route('admin-dashboard')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
            @if(Auth::user()->role_id==1)
            <!-- start widget -->
            <div class="state-overview">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-12">
                        <div class="info-box bg-b-green">
                            <span class="info-box-icon push-bottom"><i class="material-icons">group</i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Employee</span>
                                <span class="info-box-number">{{$employee}}</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 45%"></div>
                                </div>

                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-xl-3 col-md-6 col-12">
                        <div class="info-box bg-b-yellow">
                            <span class="info-box-icon push-bottom"><i class="material-icons">group</i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total subscriber</span>
                                <span class="info-box-number">{{$subscriber}}</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 40%"></div>
                                </div>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-xl-3 col-md-6 col-12">
                        <div class="info-box bg-b-blue">
                            <span class="info-box-icon push-bottom"><i class="material-icons">group</i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Provider</span>
                                <span class="info-box-number">{{$providers}}</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 85%"></div>
                                </div>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    {{--<div class="col-xl-3 col-md-6 col-12">
                        <div class="info-box bg-b-pink">
									<span class="info-box-icon push-bottom"><i
                                                class="material-icons">monetization_on</i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Fees Collection</span>
                                <span class="info-box-number">13,921</span><span>$</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 50%"></div>
                                </div>
                                <span class="progress-description">
											50% Increase in 28 Days
										</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>--}}
                    <!-- /.col -->
                </div>
            </div>
            @endif
            <!-- end widget -->

        </div>
    </div>
    <!-- end page content -->

@endsection
