@extends('Admin.layouts.master')
@section('main_content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Service Reschedule</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                               href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="">Service Details</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Service Reschedule</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-topline-red">
                        <div class="card-head">
                            <header>All Service Reschedule</header>                            
                        </div>
                        <div class="card-body ">
                            <div class="row">                                
                                <div class="col-md-6 col-sm-6 col-6">
                                    <div class="btn-group pull-right">
                                        <button class="btn deepPink-bgcolor  btn-outline dropdown-toggle"
                                                data-toggle="dropdown">Tools
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa fa-print"></i> Print </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="table-scrollable">
                                <table
                                        class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                                        id="example4">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Service Name</th>
                                        <th>Booked By</th>
                                        <th>Booking purpose</th>
                                        <th>Service Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bookings as $key=>$book)
                                        <tr class="odd gradeX">
                                            <td>{{ $key+1}}</td>
                                            <td>{{$book->ser_booking['name']}}</td>
                                            <td>{{$book->user_booking['name']}}</td>
                                            <td>{{$book->name}}</td>
                                            <td class="valigntop">
                                                <div class="btn-group">
                                                    <button
                                                            class="btn btn-xs  dropdown-toggle no-margin"
                                                            type="button" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                        @if($book->Servicestatus=='pending')
                                                            Pending
                                                        @endif
                                                        @if($book->Servicestatus=='completed')
                                                            completed
                                                        @endif
                                                        @if($book->Servicestatus=='cancel')
                                                            cancel
                                                        @endif
                                                        @if($book->Servicestatus=='reschedule')
                                                            Reschedule
                                                        @endif
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-left" role="menu">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <a href="{{route('StatusPending',$book->id)}}">
                                                                    <button class="btn "
                                                                            type="submit">Pending
                                                                    </button>
                                                                </a>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <a href="{{route('StatusCompleted',$book->id)}}">
                                                                    <button class="btn "
                                                                            type="submit">Completed
                                                                    </button>
                                                                </a>
                                                            </a>
                                                        </li>
                                                    </ul>
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
            </div>
        </div>
    </div>
    <!-- end page content -->
@endsection