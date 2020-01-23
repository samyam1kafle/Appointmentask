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
                                    <div class="btn-group">
                                        <button id="addRow1" class="btn btn-info">
                                            Add New <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
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
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="valigntop">
                                            <div class="btn-group">
                                                <button
                                                        class="btn btn-xs deepPink-bgcolor dropdown-toggle no-margin"
                                                        type="button" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                    Actions
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-left" role="menu">
                                                    <li>
                                                        <a href="javascript:;">
                                                            <form action=""
                                                                  method="GET"
                                                                  style="display: inline-block">
                                                                {{csrf_field()}}
                                                                {{method_field('PUT')}}
                                                                <button class="btn btn-primary btn-sm"
                                                                        type="submit"><span
                                                                            class="note-icon-pencil"></span> Update
                                                                </button>
                                                            </form>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <form action=""
                                                                  method="post"
                                                                  style="display: inline-block">
                                                                {{csrf_field()}}
                                                                {{method_field('DELETE')}}
                                                                <button class="btn btn-danger btn-sm" type="submit">
                                                                    <span class="fa fa-trash-o"></span> Delete
                                                                </button>
                                                            </form>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </td>
                                        {{--<td class="valigntop">--}}
                                            {{--<div class="btn-group">--}}
                                                {{--<button--}}
                                                        {{--class="btn btn-xs deepPink-bgcolor dropdown-toggle no-margin"--}}
                                                        {{--type="button" data-toggle="dropdown"--}}
                                                        {{--aria-expanded="false">--}}
                                                    {{--Actions--}}
                                                    {{--<i class="fa fa-angle-down"></i>--}}
                                                {{--</button>--}}
                                                {{--<ul class="dropdown-menu pull-left" role="menu">--}}
                                                    {{--<li>--}}
                                                        {{--<a href="javascript:;">--}}
                                                            {{--<i class="icon-docs"></i> New Post </a>--}}
                                                    {{--</li>--}}
                                                    {{--<li>--}}
                                                        {{--<a href="javascript:;">--}}
                                                            {{--<i class="icon-tag"></i> New Comment </a>--}}
                                                    {{--</li>--}}
                                                    {{--<li>--}}
                                                        {{--<a href="javascript:;">--}}
                                                            {{--<i class="icon-user"></i> New User </a>--}}
                                                    {{--</li>--}}
                                                    {{--<li class="divider"></li>--}}
                                                    {{--<li>--}}
                                                        {{--<a href="javascript:;">--}}
                                                            {{--<i class="icon-flag"></i> Comments--}}
                                                            {{--<span class="badge badge-success">4</span>--}}
                                                        {{--</a>--}}
                                                    {{--</li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</td>--}}
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