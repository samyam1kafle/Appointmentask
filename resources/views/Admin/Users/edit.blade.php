@extends('Admin.layouts.master')
@section('main_content')
    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Users</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                               href="{{route('admin-dashboard')}}">Home</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="{{route('user.index')}}">Users</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Update users</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card card-box">
                        <div class="card-head">
                            <header>Update User</header>

                        </div>
                        <div class="card-body" id="bar-parent2">
                            <form action="{{route('user.update',$user->id)}}" id="form_sample_2" class="form-horizontal"
                                  method="post"
                                  enctype="multipart/form-data" autocomplete="on">
                                {{csrf_field()}}
                                <input type="hidden" name="service_id" value="0">
                                <input type="hidden" name="available_date" value="{{null}}">
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-body">
                                    <div class="form-group row  margin-top-20">
                                        <label class="control-label col-md-3">Name
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" class="form-control" name="name"
                                                       value="{{$user->name}}"/></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Email
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="email" class="form-control" name="email"
                                                       value="{{$user->email}}"/></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">User Role
                                            <span class="required"> * </span>
                                        </label>

                                        <div class="col-lg-4 col-md-8">
                                            <select class="form-control  select2" name="role_id">
                                            <option value="{{$user->role_id}}">{{$user->roles['name']}}</option>
                                                <optgroup label="Roles">
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Image
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <div class="input-icon right">
                                                @if($user->image != null)
                                                    <img src="{{asset('Uploads/users/thumbnails/' .$user->image)}}"
                                                         alt="Profile image" height="100px" width="auto">
                                                @endif
                                                <input type="file" class="form-control bg-dark" name="image"/></div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Gender
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">


                                            <div class="card-body " id="bar-parent3">
                                                <div class="row">
                                                    <div class="radio">
                                                        <input id="radiobg1" name="gender" type="radio"
                                                               checked="checked" value="Male">
                                                        <label for="radiobg1">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <input id="radiobg2" name="gender" type="radio" value="Female">
                                                        <label for="radiobg2">
                                                            Female
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <input id="radiobg3" name="gender" type="radio" value="Other">
                                                        <label for="radiobg3">
                                                            Others
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3">User Department
                                        <span class="required"> * </span>
                                    </label>

                                    <div class="col-lg-4 col-md-8">
                                        <select class="form-control  select2" name="department_id">
                                        <option value="{{$user->department_id}}">{{$user->department['name']}}</option>
                                            <optgroup label="Departments">
                                                @foreach($depart as $dep)
                                                    <option value="{{$dep->id}}">{{$dep->name}}</option>
                                                @endforeach
                                            </optgroup>

                                        </select>
                                    </div>
                                </div>
                                {{csrf_field()}}

                                <div class="form-group">
                                    <div class="offset-md-3 col-md-9">
                                        <button type="submit" class="btn btn-info m-r-20">Submit</button>
                                        <a class="btn btn-default" href="{{route('user.index')}}">Cancel</a>
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