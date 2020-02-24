@extends('Admin.layouts.master')
@section('main_content')
    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Update Profile</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                               href="{{route('admin-dashboard')}}">Dashboard</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>

                        <li class="active">Update Profile</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Education
                                        Details</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Personal
                                        Details</a></li>
                                <li class="nav-item"><a class="nav-link" href="#work" data-toggle="tab">Work
                                        Details</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <div class="card-body" id="bar-parent2">
                                    @if($educ == [])
                                            <form action="{{route('user_education.store')}}" id="form_sample_2"
                                              class="form-horizontal"
                                              method="post" autocomplete="on">
                                            {{csrf_field()}}
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            
                                            <div class="form-body">
                                                <div class="form-group row  margin-top-20">
                                                    <label class="control-label col-md-3">Institution Name
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                          
                                                            <input type="text" class="form-control" name="inst_name" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Institution address
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="inst_address" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Faculty
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="faculty" />
                                                        </div>
                                                        <span>(eg . Science, management, etc.)</span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Board
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="board" />
                                                        </div>
                                                        <span>(eg . NEB, Government of nepal , etc.)</span>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Degree
                                                        <span class="required"> * </span>
                                                    </label>

                                                    <div class="col-lg-4 col-md-8">
                                                        <select class="form-control  select2" name="degree_id">
                                                            <option value=""></option>
                                                            <optgroup label="Degree">
                                                                @foreach($degree as $deg)
                                                                    <option value="{{$deg->id}}">{{$deg->degree_name}}</option>
                                                                @endforeach
                                                            </optgroup>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Division Obtained
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="passed_division" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Passed Year
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <div class="input-append date form_date"
                                                                 data-date-format="yy-m-d H:i:s" data-date="{{now()}}">
                                                                <input size="30" type="text" required="" readonly=""
                                                                       name="passed_year" aria-required="true">
                                                                <span class="add-on"><i
                                                                            class="fa fa-remove icon-remove"></i></span>
                                                                <span class="add-on"><i
                                                                            class="fa fa-calendar"></i></span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>


                                            {{csrf_field()}}

                                            <div class="form-group">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" class="btn btn-info m-r-20">Add</button>
                                                    <button type="reset" class="btn btn-default">Cancel</button>
                                                </div>
                                            </div>
                                         </form>
                                    
                                    
                                    
                                    @endif                                     
                                    @if($educ != null)
                                        <form action="{{route('user_education.update',$educ->id)}}" id="form_sample_2"
                                              class="form-horizontal"
                                              method="post" autocomplete="on"
                                        >
                                            {{csrf_field()}}
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="form-body">
                                                <div class="form-group row  margin-top-20">
                                                    <label class="control-label col-md-3">Institution Name
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                          
                                                            <input type="text" class="form-control" name="inst_name" value="{{$educ->inst_name}}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Institution address
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="inst_address" value="{{$educ->inst_address}}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Faculty
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="faculty" value="{{$educ->faculty}}"/>
                                                        </div>
                                                        <span>(eg . Science, management, etc.)</span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Board
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="board" value="{{$educ->board}}"/>
                                                        </div>
                                                        <span>(eg . NEB, Government of nepal , etc.)</span>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Degree
                                                        <span class="required"> * </span>
                                                    </label>

                                                    <div class="col-lg-4 col-md-8">
                                                        <select class="form-control  select2" name="degree_id">
                                                            <option value="{{$educ->degree_id}}" selected>{{$educ->degree->degree_name}}</option>
                                                            <optgroup label="Degree">
                                                                @foreach($degree as $deg)
                                                                    <option value="{{$deg->id}}">{{$deg->degree_name}}</option>
                                                                @endforeach
                                                            </optgroup>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Division Obtained
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="passed_division" value="{{$educ->passed_division}}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Passed Year
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <div class="input-append date form_date"
                                                                 data-date-format="yy-m-d H:i:s" data-date="{{now()}}">
                                                                <input size="30" type="text" required="" readonly=""
                                                                       name="passed_year" aria-required="true" value="{{$educ->passed_year}}">
                                                                <span class="add-on"><i
                                                                            class="fa fa-remove icon-remove"></i></span>
                                                                <span class="add-on"><i
                                                                            class="fa fa-calendar"></i></span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>


                                            {{csrf_field()}}

                                            <div class="form-group">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" class="btn btn-info m-r-20">Update</button>
                                                    <button type="reset" class="btn btn-default">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                
                                    
                                    @endif
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <div class="card-body" id="bar-parent2">
                                        @if($prsnl == [])
                                        <form action="{{route('personal.store')}}" id="form_sample_2"
                                              class="form-horizontal"
                                              method="post"
                                              enctype="multipart/form-data" autocomplete="on">
                                            {{csrf_field()}}
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <div class="form-body">                                            
                                                                                                
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Current Address
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" name="address1"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Permanent Address
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" name="address2"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Telephone No.
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" name="phone1"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Mobile No.
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" name="phone2"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Date of Birth
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <div class="input-append date form_date"
                                                                 data-date-format="yy-m-d H:i:s" data-date="{{now()}}">
                                                                <input size="30" type="text" required="" readonly=""
                                                                       name="date_of_birth" aria-required="true">
                                                                <span class="add-on"><i
                                                                            class="fa fa-remove icon-remove"></i></span>
                                                                <span class="add-on"><i
                                                                            class="fa fa-calendar"></i></span>
                                                            </div>
                                                        </div>

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
                                                                    <input id="radiobg2" name="gender" type="radio"
                                                                           value="Female">
                                                                    <label for="radiobg2">
                                                                        Female
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <input id="radiobg3" name="gender" type="radio"
                                                                           value="Other">
                                                                    <label for="radiobg3">
                                                                        Others
                                                                    </label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            
                                            {{csrf_field()}}

                                            <div class="form-group">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" class="btn btn-info m-r-20">Add</button>
                                                    <button type="reset" class="btn btn-default">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                        @endif
                                        @if($prsnl != null)
                                        <form action="{{route('personal.update',$prsnl->id)}}" id="form_sample_2"
                                              class="form-horizontal"
                                              method="post"
                                              enctype="multipart/form-data" autocomplete="on">
                                            {{csrf_field()}}
                                            <!-- <input type="hidden" name="service_id" value="0"> -->
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="form-body">                                           
                                                                                                
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Current Address
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" name="address1" value="{{$prsnl->address1}}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Permanent Address
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" name="address2" value="{{$prsnl->address2}}"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Telephone No.
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" name="phone1" value="{{$prsnl->phone1}}"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Mobile No.
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" name="phone2" value="{{$prsnl->phone2}}"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Date of Birth
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <div class="input-append date form_date"
                                                                 data-date-format="yy-m-d H:i:s" data-date="{{now()}}">
                                                                <input size="30" type="text" required="" readonly=""
                                                                       name="date_of_birth" aria-required="true" value="{{$prsnl->date_of_birth}}">
                                                                <span class="add-on"><i
                                                                            class="fa fa-remove icon-remove"></i></span>
                                                                <span class="add-on"><i
                                                                            class="fa fa-calendar"></i></span>
                                                            </div>
                                                        </div>

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
                                                                    <input id="radiobg2" name="gender" type="radio"
                                                                           value="Female">
                                                                    <label for="radiobg2">
                                                                        Female
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <input id="radiobg3" name="gender" type="radio"
                                                                           value="Other">
                                                                    <label for="radiobg3">
                                                                        Others
                                                                    </label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            
                                            {{csrf_field()}}

                                            <div class="form-group">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" class="btn btn-info m-r-20">Update</button>
                                                    <button type="reset" class="btn btn-default">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                        @endif
                                    </div>

                                </div>
                                <!-- /.tab-pane -->
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="work">
                                    <div class="card-body" id="bar-parent2">
                                        @if($wrk == [])
                                        <form action="{{route('work.store')}}" id="form_sample_2"
                                              class="form-horizontal"
                                              method="post"
                                              enctype="multipart/form-data" autocomplete="on">
                                            {{csrf_field()}}
                                            
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <div class="form-body">
                                                <div class="form-group row  margin-top-20">
                                                    <label class="control-label col-md-3">Profession
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" name="profession"/></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Experience
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" name="work_exp"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Organization Name
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="org_name"/></div>                                                      
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Organization Address
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="org_address"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Organization Tel. No.
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="phone_1"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Organization Mobile No.
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="phone_2"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Organization PAN No.
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="org_pan"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Service Fee
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="number" class="form-control"
                                                                   name="fee"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Document
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <input type="file" class="form-control bg-dark"
                                                                   name="document"/></div>
                                                    </div>
                                                </div>

                                                
                                            </div>

                                            {{csrf_field()}}

                                            <div class="form-group">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" class="btn btn-info m-r-20">Add</button>
                                                    <button type="reset" class="btn btn-default">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                        @endif
                                        @if($wrk !=null)
                                        <form action="{{route('work.update',$wrk->id)}}" id="form_sample_2"
                                              class="form-horizontal"
                                              method="post"
                                              enctype="multipart/form-data" autocomplete="on">
                                            {{csrf_field()}}
                                            <!-- <input type="hidden" name="service_id" value="0"> -->
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="form-body">
                                                <div class="form-group row  margin-top-20">
                                                    <label class="control-label col-md-3">Profession
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" name="profession" value="{{$wrk->profession}}"/></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Experience
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" name="work_exp" value="{{$wrk->work_exp}}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Organization Name
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="org_name" value="{{$wrk->org_name}}"/></div>                                                      
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Organization Address
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="org_address" value="{{$wrk->org_address}}"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Organization Tel. No.
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="phone_1" value="{{$wrk->phone_1}}"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Organization Mobile No.
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="phone_2" value="{{$wrk->phone_2}}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Organization PAN No.
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="org_pan" value="{{$wrk->org_pan}}"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Service Fee
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control"
                                                                   name="fee" value="{{$wrk->fee}}"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Document
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <input type="file" class="form-control bg-dark"
                                                                   name="document" value="{{$wrk->document}}"/></div>
                                                    </div>
                                                </div>

                                                
                                            </div>

                                            {{csrf_field()}}

                                            <div class="form-group">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" class="btn btn-info m-r-20">Update</button>
                                                    <button type="reset" class="btn btn-default">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">
                                    <div class="card-body" id="bar-parent2">
                                        <form action="{{route('update-profile',Auth::user()->id)}}" id="form_sample_2"
                                              class="form-horizontal"
                                              method="post"
                                              autocomplete="on" enctype="multipart/form-data">

                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="form-body">
                                                <div class="form-group row">
                                                    <div class="col-md-4"></div>
                                                    <div class="col-md-4">
                                                        <img src="{{asset('Uploads/users/thumbnails/' . Auth::user()->image)}}"
                                                             class="img-circle user-img-circle" width="150px"
                                                             height="150px" alt="User Image">
                                                    </div>
                                                    <div class="col-md-4"></div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Image
                                                        <span class="required"> * </span>
                                                    </label>

                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <input type="file" class="form-control bg-dark"
                                                                   name="image"/></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Current Password
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="password" class="form-control"
                                                                   name="old_password"/></div>
                                                        <span class="help-block"> e.g. xxxxxxx </span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">New Password
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="password" class="form-control"
                                                                   name="password"/></div>
                                                        <span class="help-block"> e.g. xxxxxxx </span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">Confirm Password
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="password" class="form-control"
                                                                   name="password_confirmation"/></div>
                                                        <span class="help-block"> e.g. xxxxxxx </span>
                                                    </div>
                                                </div>



                                            </div>

                                            {{csrf_field()}}

                                            <div class="form-group">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" class="btn btn-info m-r-20">Submit</button>
                                                    <button type="reset" class="btn btn-default">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
            </div>
        </div>
        <!-- end page content -->

    </div>
    <!-- end page container -->


    ​

@endsection