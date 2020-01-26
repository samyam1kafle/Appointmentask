@extends('Admin.layouts.master')
@section('main_content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Services</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                               href="{{route('admin-dashboard')}}">Home</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="{{route('service_details.index')}}">All Details</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Create Services</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card card-box">
                        <div class="card-head">
                            <header>Add New Services</header>

                        </div>
                        <div class="card-body" id="bar-parent2">
                            <form action="{{route('service_details.store')}}" id="form_sample_2" class="form-horizontal"
                                  method="post"
                                  autocomplete="on">
                                {{ csrf_field() }}
                                <div class="form-body">
                                    {{--<div class="form-group row  margin-top-20">--}}
                                    {{--<label class="control-label col-md-3">Name--}}
                                    {{--<span class="required"> * </span>--}}
                                    {{--</label>--}}
                                    {{--<div class="col-md-8">--}}
                                    {{--<div class="input-icon right">--}}
                                    {{--<i class="fa"></i>--}}
                                    {{--<input type="text" class="form-control" name="name"/></div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}

                                    <div class="form-group row">
                                        <label class="control-label col-md-3">User
                                            <span class="required"> * </span>
                                        </label>

                                        <div class="col-md-8">
                                            <select class="form-control  select2" name="users">
                                                <option value="0" selected>None</option>
                                                <optgroup label="User">
                                                    @foreach($user as $users)
                                                        @foreach($user as $usr)
                                                            @foreach($usr as $u )
                                                                <option value="{{ $u->id }}">{{ $u->name }}</option>
                                                            @endforeach
                                                        @endforeach

                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Booked
                                            <span class="required"> * </span>
                                        </label>

                                        <div class="col-md-8">
                                            <select class="form-control  select2" name="booked_id">
                                                <option value="0" selected>None</option>

                                                <optgroup label="Booked">
                                                    @foreach($bookingId as $booked)
                                                        <option value="{{$booked->id}}">{{$booked->name}}</option>
                                                    @endforeach
                                                </optgroup>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Cancel ID
                                            <span class="required"> * </span>
                                        </label>

                                        <div class="col-md-8">
                                            <select class="form-control  select2" name="cancel_id">
                                                <option value=""></option>
                                                <optgroup label="Cancel">
                                                    <option value="0" selected>None</option>

                                                </optgroup>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Reschedule ID
                                            <span class="required"> * </span>
                                        </label>

                                        <div class="col-md-8">
                                            <select class="form-control  select2" name="reschedule_id">
                                                <option value=""></option>
                                                <optgroup label="Rescheduled">
                                                    <option value="0" selected>None</option>

                                                </optgroup>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Complete ID
                                            <span class="required"> * </span>
                                        </label>

                                        <div class="col-md-8">
                                            <select class="form-control  select2" name="complete_id">
                                                <option value=""></option>
                                                <optgroup label="Complete">
                                                    <option value="0" selected>None</option>

                                                </optgroup>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Booking ID
                                            <span class="required"> * </span>
                                        </label>

                                        <div class="col-md-8">
                                            <select class="form-control  select2" name="booking_id">
                                                <option value=""></option>
                                                <optgroup label="Booking">
                                                    <option value="0" selected>None</option>

                                                </optgroup>

                                            </select>
                                        </div>
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