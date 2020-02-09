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
                            <form action="{{route('service_details.update',$service_details_id->id)}}" id="form_sample_2" class="form-horizontal"
                                  method="post"
                                  autocomplete="on">
                                {{ csrf_field() }}
                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Username
                                            <span class="required"> * </span>
                                        </label>

                                        <div class="col-md-8">
                                            <select class="form-control  select2" name="users">
                                                <option value="0" selected>None</option>
                                                @foreach($users as $user)
                                                    @foreach($user as $us)
                                                        <option value="{{$us->id}}">{{$us->name}}</option>
                                                    @endforeach
                                                @endforeach
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
                                                @foreach($servBookedId as $servBooked)
                                                    <option value="{{$servBooked->id}}">{{$servBooked->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Cancel ID
                                            <span class="required"> * </span>
                                        </label>

                                        <div class="col-md-8">
                                            <select class="form-control  select2" name="cancel_id">
                                                <option value="0" selected>None</option>
                                                @foreach($servCancelId as $servCancel)
                                                    <option value="{{$servCancel->id}}">{{$servCancel->id}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Reschedule ID
                                            <span class="required"> * </span>
                                        </label>

                                        <div class="col-md-8">
                                            <select class="form-control  select2" name="reschedule_id">
                                                <option value="0" selected>None</option>
                                                @foreach($servRescheduleId as $servReschedule)
                                                    <option value="{{$servReschedule->id}}">{{$servReschedule->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Complete ID
                                            <span class="required"> * </span>
                                        </label>

                                        <div class="col-md-8">
                                            <select class="form-control  select2" name="complete_id">
                                                <option value="0" selected>None</option>
                                                @foreach($servCompleteId as $servComplete)
                                                    <option value="{{$servComplete->id}}">{{$servComplete->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Booking ID
                                            <span class="required"> * </span>
                                        </label>

                                        <div class="col-md-8">
                                            <select class="form-control  select2" name="booking_id">
                                                <option value="0" selected>None</option>
                                                @foreach($bookingId as $booking)
                                                    <option value="{{$booking->id}}">{{$booking->name}}</option>
                                                @endforeach
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