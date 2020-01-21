@extends('Admin.layouts.master')
@section('main_content')


    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Update Available Date</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                               href="{{route('admin-dashboard')}}">Home</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="">Available Date</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Create Department</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card card-box">
                        <div class="card-head">
                            <header>Edit & Update Available Date</header>

                        </div>
                        <div class="card-body" id="bar-parent2">
                            <form action="{{route('AvailableDate.update',$date->id)}}" method="post" id="form_sample_2" class="form-horizontal"  enctype="multipart/form-data" autocomplete="on">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-body">
                                    <div class="form-group row margin-top-20">

                                        <label class="col-md-3 control-label">Date:</label>
                                        <div class="input-append date form_date" data-date-format="yy-m-d H:i:s"
                                             data-date="2013-02-21T15:25:00Z">
                                            <input size="30" type="text" value="{{$date->date}}" readonly name="date">
                                            <span class="add-on"><i class="fa fa-remove icon-remove"></i></span>
                                            <span class="add-on"><i class="fa fa-calendar"></i></span>
                                            @if ($errors->any())
                                                <div class="alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="offset-md-3 col-md-9">
                                            <button type="submit" class="btn btn-info m-r-20">Submit</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection