@extends('Admin.layouts.master')
@section('main_content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">All Details</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                               href="index.html">Home</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="">Service Details</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">All Details</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-topline-red">
                        <div class="card-head">
                            <header>All Details</header>
                            <div class="tools">
                                <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-6">
                                    <a class="parent-item btn btn-primary" href="{{ route('service_details.create') }}">Add
                                        +</a>
                                </div>
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
                                        <th>S.N</th>
                                        <th> Username</th>
                                        <th> Booked_id</th>
                                        <th> Cancel_id</th>
                                        <th> Reschedule_id</th>
                                        <th> Complete_id </th>
                                        <th> Booking_id </th>
                                        <th> Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="odd gradeX">
                                        @foreach($service_details as $key=> $service_detail)
                                        <td>{{ $key+1 }}</td>
                                        <td>{{$service_detail->users}}</td>
                                        <td>{{$service_detail->booked_id}}</td>
                                        <td>{{$service_detail->cancel_id}}</td>
                                        <td>{{$service_detail->reschedule_id}}</td>
                                        <td>{{$service_detail->complete_id}}</td>
                                        <td>{{$service_detail->booking_id}}</td>
                                        <td class="text-left">

                                            <form action="{{ route('service_details.edit', $service_detail->id)}}" method="GET" style="display: inline-block">
                                                {{csrf_field()}}
                                                {{method_field('PUT')}}
                                                <button class="btn btn-primary btn-sm" type="submit">Edit</button>
                                            </form>

                                            <form action="{{ route('service_details.destroy', $service_detail->id)}}" method="post" style="display: inline-block">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                            </form>
                                        </td>
                                        @endforeach
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page content -->
@endsection