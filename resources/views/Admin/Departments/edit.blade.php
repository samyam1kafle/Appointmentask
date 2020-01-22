@extends('Admin.layouts.master')
@section('main_content')


<div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Departments</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                               href="{{route('admin-dashboard')}}">Home</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="">Department</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Edit Department</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card card-box">
                        <div class="card-head">
                            <header>Edit & Update Department</header>

                        </div>
                        <div class="card-body" id="bar-parent2">
                            <form action="{{route('department.update',$depart_id->id)}}" id="form_sample_2" class="form-horizontal"
                                  method="post"  autocomplete="on">
                                  @csrf
                                  <input type="hidden" name="_method" value="PUT">
                                <div class="form-body">
                                    <div class="form-group row  margin-top-20">
                                        <label class="control-label col-md-3">Name
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" class="form-control" name="name" value="{{$depart_id->name}}"/></div>
                                        </div>
                                    </div>                            
                                    
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Parent ID
                                            <span class="required"> * </span>
                                        </label>

                                        <div class="col-md-8">
                                            <select class="form-control  select2" name="parent_id">
                                                
                                                <optgroup label="Parent">
                                                <option value="0" selected>None</option>
                                                @foreach($department as $dep)
                                                    <option value="{{$dep->id}}">{{$dep->name}}</option>
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
                                                <textarea name="description" class="form-control" id="editor" cols="auto" rows="auto">{!! $depart_id->description !!}</textarea>
                                                </div>
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