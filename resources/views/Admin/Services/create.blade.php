
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
                        <li><a class="parent-item" href="{{route('services.index')}}">Services</a>&nbsp;<i class="fa fa-angle-right"></i>
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
                            <form action="{{route('services.store')}}" id="form_sample_2" class="form-horizontal"
                                  method="post"
                                   autocomplete="on">
                                   {{csrf_field()}}
                                <div class="form-body">
                                    <div class="form-group row  margin-top-20">
                                        <label class="control-label col-md-3">Service Title
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" class="form-control" name="name"/></div>
                                        </div>
                                    </div>                            
                                    
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Service Provider
                                            <span class="required"> * </span>
                                        </label>

                                        <div class="col-md-8">
                                            <select class="form-control  select2" name="User_id">
                                            <option value="0" selected>None</option>
                                                <optgroup label="User">
                                                @foreach($users as $u)
                                                                                                                    
                                                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                                                   
                                                @endforeach
                                                </optgroup>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Department
                                            <span class="required"> * </span>
                                        </label>

                                        <div class="col-md-8">
                                            <select class="form-control  select2" name="Department_id">
                                                <option value="0" selected>None</option>                                        
                                                <optgroup label="Department">
                                                @foreach($department as $dept) 
                                                     <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                                @endforeach
                                                </optgroup>

                                            </select>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group row  margin-top-20">
                                        <label class="control-label col-md-3">Description
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <textarea name="Service_description" class="form-control" id="editor" cols="30" rows="10" ></textarea>
                                                </div>
                                        </div>
                                    </div>  
                                    
                                </div>


                        <div class="form-group">
                            <div class="offset-md-3 col-md-9">
                                <button type="submit" class="btn btn-info m-r-20">Submit</button>
                                <a class="btn btn-default" href="{{route('services.index')}}">Cancel</a>
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