@extends('Admin.layouts.master')
@section('main_content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">ToDos</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                               href="{{route('admin-dashboard')}}">Home</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="{{route('Todo.index')}}">ToDos</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Add</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card card-box">
                        <div class="card-head">
                            <header>Add ToDos</header>

                        </div>
                        <div class="card-body" id="bar-parent2">
                            <form action="{{route('Todo.store')}}" method="post" id="form_sample_2"
                                  class="form-horizontal" enctype="multipart/form-data" autocomplete="on">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-body">
                                    <div class="form-group row  margin-top-20">
                                        <div class="col-md-8">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="hidden" class="form-control" value="{{Auth::user()->id}}"
                                                       required readonly name="User_id"/></div>
                                        </div>
                                    </div>
                                    <div class="form-group row  margin-top-20">
                                        <label class="control-label col-md-3">Title
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" class="form-control" required name="title"/></div>
                                        </div>
                                    </div>

                                    <div class="form-group row  margin-top-20">
                                        <label class="control-label col-md-3">Description
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <textarea name="description" class="form-control" cols="30"
                                                          required rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group row margin-top-20">
                                        <label class="col-md-3 control-label">Assigned Date
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-append  date form_date" data-date-format="yy-m-d H:i:s"
                                                 data-date="2013-02-21T15:25:00Z">
                                                <input size="30" type="text" required readonly name="assignedDate">
                                                <span class="add-on"><i class="fa fa-remove icon-remove"></i></span>
                                                <span class="add-on"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row margin-top-20">
                                        <div class="col-md-8">
                                            <div>
                                                <input size="30" type="hidden" readonly name="CompletedDate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row  margin-top-20">
                                        <label class="control-label col-md-3">Assigned TO
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-icon right ">
                                                <i class="fa"></i>
                                                <select class="form-control col-12 input-append" required
                                                        name="assignedTo">
                                                    <option value=""  disabled selected hidden>--Select--</option>
                                                    @if(isset($employee))
                                                        @foreach($employee as $employee_data)
                                                            <option value="{{$employee_data->id}}">{{$employee_data->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row  margin-top-20">
                                        <label class="control-label col-md-3">Requested BY
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <select  class="form-control col-12 input-append" required
                                                        name="requestedBy">
                                                    <option value="" disabled selected hidden>--Select--</option>
                                                    @if(isset($superadmin))
                                                        @foreach($superadmin as $superadmin_data)
                                                            <option value="{{$superadmin_data->id}}">{{$superadmin_data->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row margin-top-20">
                                        <label class="col-md-3 control-label">Deadline
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-append  date form_date" data-date-format="yy-m-d H:i:s"
                                                 data-date="2013-02-21T15:25:00Z">
                                                <input size="30" type="text" required readonly name="DeadLine">
                                                <span class="add-on"><i class="fa fa-remove icon-remove"></i></span>
                                                <span class="add-on"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row  margin-top-20">
                                        <label class="control-label col-md-3">Status
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <select class="form-control col-12 input-append" required name="status">
                                                    <option value="" disabled selected hidden>--Select--</option>
                                                    <option value="0">Pending</option>
                                                    <option value="1">Completed</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row  margin-top-20">
                                        <label class="control-label col-md-3">Remarks
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <textarea name="remarks" class="form-control" id="editor" cols="auto"
                                                          required rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="offset-md-3 col-md-9">
                                            <button type="submit" class="btn btn-info m-r-20">Submit</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                        </div>
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
