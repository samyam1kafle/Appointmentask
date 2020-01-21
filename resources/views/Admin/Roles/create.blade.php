@extends('Admin.layouts.master')
@section('main_content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Role</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                               href="{{route('admin-dashboard')}}">Home</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="">Roles</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Create roles</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card card-box">
                        <div class="card-head">
                            <header>Add New Role</header>

                        </div>
                        @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                                {{Session::flash('Error',$error)}}
                            @endforeach
                        @endif
                        <div class="card-body" id="bar-parent2">
                            <form action="{{route('roles.store')}}" id="form_sample_2" class="form-horizontal"
                                  method="post"
                                  autocomplete="on">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="form-group row  margin-top-20">
                                        <label class="control-label col-md-3">Role name
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" class="form-control" name="name"/></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Role Description
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <textarea class="form-control" name="description" id="editor"
                                                          cols="auto" rows="auto"></textarea>
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