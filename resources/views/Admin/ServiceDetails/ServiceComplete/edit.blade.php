
@extends('Admin.layouts.master')
@section('main_content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Service Complete</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                               href="{{route('admin-dashboard')}}">Home</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="{{route('service_complete.index')}}">Service Complete</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Service Complete</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card card-box">
                        <div class="card-head">
                            <header>Add New Service Complete</header>

                        </div>
                        <div class="card-body" id="bar-parent2">
                            <form action="{{route('service_complete.update',$sComplete->id)}}" id="form_sample_2" class="form-horizontal"
                                  method="post"
                                  autocomplete="on">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Service Booked
                                        <span class="required"> * </span>
                                    </label>

                                    <div class="col-md-8">
                                        <select class="form-control  select2" name="service_booked_id">
                                            <option value="0" selected>None</option>
                                            <optgroup label="User">
                                                @foreach($serviceBooked as $serviceBookedId)
                                                    <option value="{{ $serviceBookedId->id }}">{{$serviceBookedId->name}}</option>
                                                @endforeach
                                            </optgroup>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3">Service Reschedule
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-8">
                                        <select class="form-control  select2" name="service_id">
                                            <option value="0" selected>None</option>
                                            <optgroup label="Services">
                                                @foreach($serviceReschedule as $serviceRescheduleId)
                                                    <option value="{{ $serviceRescheduleId->id }}">{{$serviceRescheduleId->name}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row margin-top-20">
                                    <label class="col-md-3 control-label">Complete Date
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-8 input-append date form_date" data-date-format="yy-m-d H:i:s"
                                         data-date="2013-02-21T15:25:00Z">
                                        <input size="30" type="text" value="" readonly name="booking_date">
                                        <span class="add-on"><i class="fa fa-remove icon-remove"></i></span>
                                        <span class="add-on"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>


                                <div class="form-group row margin-top-20">
                                    <label class="col-md-3 control-label">Complete Time
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-8 input-append date form_time">
                                        <input size="30" type="text" value="" name="booking_time" readonly>
                                        <span class="add-on"><i class="fa fa-remove icon-remove"></i></span>
                                        <span class="add-on"><i class="fa fa-clock-o"></i></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3">Status
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-8">
                                        <select class="form-control  select2" name="status">
                                            <option value=""></option>
                                            <optgroup label="Status">
                                                <option value="0">Complete</option>
                                                <option value="1">Incomplete</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="offset-md-3 col-md-9">
                                        <button type="submit" class="btn btn-info m-r-20">Submit</button>
                                        <button type="reset" class="btn btn-default">Cancel</button>
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