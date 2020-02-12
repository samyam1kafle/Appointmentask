@extends('Admin.layouts.master')
@section('main_content')
    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Your Profile</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                               href="{{route('admin-dashboard')}}">Home</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>

                        <li class="active">User Profile</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PROFILE SIDEBAR -->
                    <div class="profile-sidebar">
                        <div class="card card-topline-aqua">
                            <div class="card-body no-padding height-9">
                                <div class="row">
                                    <div class="profile-userpic">
                                        <img src="{{asset('Uploads/users/thumbnails/'.Auth::user()->image )}}"
                                             class="img-responsive" alt=""></div>
                                </div>
                                <div class="profile-usertitle">
                                    <div class="profile-usertitle-name">{{Auth::user()->name}}</div>
                                    <div class="profile-usertitle-job"> {{strtoupper(Auth::user()->roles->name)}}</div>
                                    <div class="profile-usertitle-job">Joined Date/Time
                                        : {{strtoupper(Auth::user()->created_at)}}</div>

                                </div>
                                <ul class="list-group list-group-unbordered">
                                    @if(Auth::user()->roles->name == 'super_admin')
                                    <li class="list-group-item">
                                        <b>Total Providers</b> <a class="pull-right"></a>
                                    </li>
                                    @endif
                                    <li class="list-group-item">
                                        <b>Following</b> <a class="pull-right">750</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Friends</b> <a class="pull-right">11,172</a>
                                    </li>
                                </ul>
                                <!-- END SIDEBAR USER TITLE -->
                                <!-- SIDEBAR BUTTONS -->
                                <div class="profile-userbuttons">
                                    <button type="button" class="btn btn-circle green btn-sm">Follow</button>
                                    <button type="button" class="btn btn-circle red btn-sm">Message</button>
                                </div>
                                <!-- END SIDEBAR BUTTONS -->
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-head card-topline-aqua">
                                <header>About Me</header>
                            </div>
                            <div class="card-body no-padding height-9">
                                <div class="profile-desc">
                                    Hello I am Dave Gomache a web and user interface designer. I love to work
                                    with the application interface and
                                    the web elements.
                                </div>
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <b>Gender </b>
                                        <div class="profile-desc-item pull-right">Male</div>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Project Done </b>
                                        <div class="profile-desc-item pull-right">30+</div>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Skills</b>
                                        <div class="profile-desc-item pull-right">Java,Spring</div>
                                    </li>
                                </ul>
                                <div class="row list-separated profile-stat">
                                    <div class="col-md-4 col-sm-4 col-6">
                                        <div class="uppercase profile-stat-title"> 37</div>
                                        <div class="uppercase profile-stat-text"> Projects</div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-6">
                                        <div class="uppercase profile-stat-title"> 51</div>
                                        <div class="uppercase profile-stat-text"> Tasks</div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-6">
                                        <div class="uppercase profile-stat-title"> 61</div>
                                        <div class="uppercase profile-stat-text"> Uploads</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-head card-topline-aqua">
                                <header>Performance</header>
                            </div>
                            <div class="card-body no-padding height-9">
                                <ul class="performance-list">
                                    <li>
                                        <a href="user_profile.html#">
                                            <i class="fa fa-circle-o" style="color:#F39C12;"></i> Total Product
                                            Sales <span class="pull-right">23456</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="user_profile.html#">
                                            <i class="fa fa-circle-o" style="color:#DD4B39;"></i> Total Product
                                            Refer <span class="pull-right">$234</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="user_profile.html#">
                                            <i class="fa fa-circle-o" style="color:#00A65A;"></i> Total Earn
                                            <span class="pull-right"> $345000</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-head card-topline-aqua">
                                <header>Work Progress</header>
                            </div>
                            <div class="card-body no-padding height-9">
                                <div class="work-monitor work-progress">
                                    <div class="states">
                                        <div class="info">
                                            <div class="desc pull-left">Operations</div>
                                            <div class="percent pull-right">80%</div>
                                        </div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-danger progress-bar-striped active"
                                                 role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                 aria-valuemax="100" style="width: 70%">
                                                <span class="sr-only">80% </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="states">
                                        <div class="info">
                                            <div class="desc pull-left">Consultation</div>
                                            <div class="percent pull-right">55%</div>
                                        </div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-success progress-bar-striped active"
                                                 role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                 aria-valuemax="100" style="width: 45%">
                                                <span class="sr-only">55% </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="states">
                                        <div class="info">
                                            <div class="desc pull-left">Support</div>
                                            <div class="percent pull-right">20%</div>
                                        </div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-warning progress-bar-striped active"
                                                 role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                 aria-valuemax="100" style="width: 35%">
                                                <span class="sr-only">20% </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END BEGIN PROFILE SIDEBAR -->
                    <!-- BEGIN PROFILE CONTENT -->
                    <div class="profile-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-head card-topline-aqua">
                                        <header>User Activity</header>
                                    </div>
                                    <div class="card-body no-padding height-9">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel">
                                                        <form>
																	<textarea class="form-control p-text-area" rows="4"
                                                                              placeholder="Whats in your mind today?"></textarea>
                                                        </form>
                                                        <footer class="panel-footer">
                                                            <button
                                                                    class="btn btn-post pull-right">Post
                                                            </button>
                                                            <ul class="nav nav-pills p-option">
                                                                <li>
                                                                    <a href="user_profile.html#"><i
                                                                                class="fa fa-user"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="user_profile.html#"><i
                                                                                class="fa fa-camera"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="user_profile.html#"><i
                                                                                class="fa  fa-location-arrow"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="user_profile.html#"><i
                                                                                class="fa fa-meh-o"></i></a>
                                                                </li>
                                                            </ul>
                                                        </footer>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <ul class="activity-list">
                                                        <li>
                                                            <div class="avatar">
                                                                <img src="../assets/img/std/std1.jpg" alt=""/>
                                                            </div>
                                                            <div class="activity-desk">
                                                                <h5><a href="user_profile.html#">Rajesh</a> <span>Uploaded 5 new
																				photos</span></h5>
                                                                <p class="text-muted">7 minutes ago near Alaska,
                                                                    USA</p>
                                                                <div class="album">
                                                                    <a href="user_profile.html#">
                                                                        <img alt=""
                                                                             src="../assets/img/mega-img1.jpg">
                                                                    </a>
                                                                    <a href="user_profile.html#">
                                                                        <img alt=""
                                                                             src="../assets/img/mega-img2.jpg">
                                                                    </a>
                                                                    <a href="user_profile.html#">
                                                                        <img alt=""
                                                                             src="../assets/img/mega-img3.jpg">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="post-box"> <span
                                                                        class="text-muted text-small"><i
                                                                            class="fa fa-clock-o"
                                                                            aria-hidden="true"></i>
																			13 minutes ago</span>
                                                                <div class="post-img"><img
                                                                            src="../assets/img/slider/fullimage1.jpg"
                                                                            class="img-responsive" alt=""></div>
                                                                <div>
                                                                    <h4 class="">Lorem Ipsum is simply dummy
                                                                        text of the printing</h4>
                                                                    <p>Lorem Ipsum is simply dummy text of the
                                                                        printing and typesetting industry. Lorem
                                                                        Ipsum has been
                                                                        the industry's standard dummy text ever
                                                                        since the 1500s, </p>
                                                                    <p><a href=""
                                                                          class="btn btn-raised btn-info btn-sm"><i
                                                                                    class="fa fa-heart-o"
                                                                                    aria-hidden="true"></i>
                                                                            Like (5) </a> <a href=""
                                                                                             class="btn btn-raised bg-soundcloud btn-sm"><i
                                                                                    class="zmdi zmdi-long-arrow-return"></i>
                                                                            Reply</a></p>
                                                                </div>
                                                            </div>
                                                            <div class="post-box"> <span
                                                                        class="text-muted text-small"><i
                                                                            class="fa fa-clock-o"
                                                                            aria-hidden="true"></i>
																			37 minutes ago</span>
                                                                <div class="post-img"><img
                                                                            src="http://radixtouch.in/templates/admin/smart/source/assets/img/slider/fullimage2.jpg"
                                                                            class="img-responsive" alt=""></div>
                                                                <div>
                                                                    <h4 class="">Lorem Ipsum is simply dummy
                                                                        text of the printing</h4>
                                                                    <p>Lorem Ipsum is simply dummy text of the
                                                                        printing and typesetting industry. Lorem
                                                                        Ipsum has been
                                                                        the industry's standard dummy text ever
                                                                        since the 1500s, </p>
                                                                    <p><a href=""
                                                                          class="btn btn-raised btn-info btn-sm"><i
                                                                                    class="fa fa-heart-o"
                                                                                    aria-hidden="true"></i>
                                                                            Like (5) </a> <a href=""
                                                                                             class="btn btn-raised bg-soundcloud btn-sm"><i
                                                                                    class="zmdi zmdi-long-arrow-return"></i>
                                                                            Reply</a></p>
                                                                </div>
                                                            </div>
                                                            <div class="post-box"> <span
                                                                        class="text-muted text-small"><i
                                                                            class="fa fa-clock-o"
                                                                            aria-hidden="true"></i>
																			53 minutes ago</span>
                                                                <div class="post-img"><img
                                                                            src="../assets/img/slider/fullimage3.jpg"
                                                                            class="img-responsive" alt=""></div>
                                                                <div>
                                                                    <h4 class="">Lorem Ipsum is simply dummy
                                                                        text of the printing</h4>
                                                                    <p>Lorem Ipsum is simply dummy text of the
                                                                        printing and typesetting industry. Lorem
                                                                        Ipsum has been
                                                                        the industry's standard dummy text ever
                                                                        since the 1500s, </p>
                                                                    <p><a href=""
                                                                          class="btn btn-raised btn-info btn-sm"><i
                                                                                    class="fa fa-heart-o"
                                                                                    aria-hidden="true"></i>
                                                                            Like (5) </a> <a href=""
                                                                                             class="btn btn-raised bg-soundcloud btn-sm"><i
                                                                                    class="zmdi zmdi-long-arrow-return"></i>
                                                                            Reply</a></p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="avatar">
                                                                <img src="../assets/img/std/std3.jpg" alt=""/>
                                                            </div>
                                                            <div class="activity-desk">
                                                                <h5><a href="user_profile.html#">John Doe</a> <span>attended a
																				meeting with</span>
                                                                    <a href="user_profile.html#">Lina Smith.</a></h5>
                                                                <p class="text-muted">2 days ago near Alaska,
                                                                    USA</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="avatar">
                                                                <img src="../assets/img/std/std4.jpg" alt=""/>
                                                            </div>
                                                            <div class="activity-desk">
                                                                <h5><a href="user_profile.html#">Kehn Anderson</a>
                                                                    <span>completed the task “wireframe design”
																				within the dead line</span></h5>
                                                                <p class="text-muted">4 days ago near Alaska,
                                                                    USA</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="avatar">
                                                                <img src="../assets/img/std/std5.jpg" alt=""/>
                                                            </div>
                                                            <div class="activity-desk">
                                                                <h5><a href="user_profile.html#">Jacob Ryan</a> <span>was absent
																				office due to sickness</span></h5>
                                                                <p class="text-muted">4 days ago near Alaska,
                                                                    USA</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PROFILE CONTENT -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content -->
        <!-- start chat sidebar -->
        <div class="chat-sidebar-container" data-close-on-body-click="false">
            <div class="chat-sidebar">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="user_profile.html#quick_sidebar_tab_1" class="nav-link active tab-icon"
                           data-toggle="tab"> <i
                                    class="material-icons">chat</i>Chat
                            <span class="badge badge-danger">4</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="user_profile.html#quick_sidebar_tab_3" class="nav-link tab-icon" data-toggle="tab"> <i
                                    class="material-icons">settings</i>
                            Settings
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <!-- Start User Chat -->
                    <div class="tab-pane active chat-sidebar-chat in active show" role="tabpanel"
                         id="quick_sidebar_tab_1">
                        <div class="chat-sidebar-list">
                            <div class="chat-sidebar-chat-users slimscroll-style" data-rail-color="#ddd"
                                 data-wrapper-class="chat-sidebar-list">
                                <div class="chat-header">
                                    <h5 class="list-heading">Online</h5>
                                </div>
                                <ul class="media-list list-items">
                                    <li class="media"><img class="media-object"
                                                           src="../assets/img/prof/prof3.jpg" width="35" height="35"
                                                           alt="...">
                                        <i class="online dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">John Deo</h5>
                                            <div class="media-heading-sub">Spine Surgeon</div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-success">5</span>
                                        </div>
                                        <img class="media-object" src="../assets/img/prof/prof1.jpg"
                                             width="35" height="35" alt="...">
                                        <i class="busy dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Rajesh</h5>
                                            <div class="media-heading-sub">Director</div>
                                        </div>
                                    </li>
                                    <li class="media"><img class="media-object"
                                                           src="../assets/img/prof/prof5.jpg" width="35" height="35"
                                                           alt="...">
                                        <i class="away dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Jacob Ryan</h5>
                                            <div class="media-heading-sub">Ortho Surgeon</div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-danger">8</span>
                                        </div>
                                        <img class="media-object" src="../assets/img/prof/prof4.jpg"
                                             width="35" height="35" alt="...">
                                        <i class="online dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Kehn Anderson</h5>
                                            <div class="media-heading-sub">CEO</div>
                                        </div>
                                    </li>
                                    <li class="media"><img class="media-object"
                                                           src="../assets/img/prof/prof2.jpg" width="35" height="35"
                                                           alt="...">
                                        <i class="busy dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Sarah Smith</h5>
                                            <div class="media-heading-sub">Anaesthetics</div>
                                        </div>
                                    </li>
                                    <li class="media"><img class="media-object"
                                                           src="../assets/img/prof/prof7.jpg" width="35" height="35"
                                                           alt="...">
                                        <i class="online dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Vlad Cardella</h5>
                                            <div class="media-heading-sub">Cardiologist</div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="chat-header">
                                    <h5 class="list-heading">Offline</h5>
                                </div>
                                <ul class="media-list list-items">
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-warning">4</span>
                                        </div>
                                        <img class="media-object" src="../assets/img/prof/prof6.jpg"
                                             width="35" height="35" alt="...">
                                        <i class="offline dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Jennifer Maklen</h5>
                                            <div class="media-heading-sub">Nurse</div>
                                            <div class="media-heading-small">Last seen 01:20 AM</div>
                                        </div>
                                    </li>
                                    <li class="media"><img class="media-object"
                                                           src="../assets/img/prof/prof8.jpg" width="35" height="35"
                                                           alt="...">
                                        <i class="offline dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Lina Smith</h5>
                                            <div class="media-heading-sub">Ortho Surgeon</div>
                                            <div class="media-heading-small">Last seen 11:14 PM</div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-success">9</span>
                                        </div>
                                        <img class="media-object" src="../assets/img/prof/prof9.jpg"
                                             width="35" height="35" alt="...">
                                        <i class="offline dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Jeff Adam</h5>
                                            <div class="media-heading-sub">Compounder</div>
                                            <div class="media-heading-small">Last seen 3:31 PM</div>
                                        </div>
                                    </li>
                                    <li class="media"><img class="media-object"
                                                           src="../assets/img/prof/prof10.jpg" width="35" height="35"
                                                           alt="...">
                                        <i class="offline dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Anjelina Cardella</h5>
                                            <div class="media-heading-sub">Physiotherapist</div>
                                            <div class="media-heading-small">Last seen 7:45 PM</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End User Chat -->
                    <!-- Start Setting Panel -->
                    <div class="tab-pane chat-sidebar-settings" role="tabpanel" id="quick_sidebar_tab_3">
                        <div class="chat-sidebar-settings-list slimscroll-style">
                            <div class="chat-header">
                                <h5 class="list-heading">Layout Settings</h5>
                            </div>
                            <div class="chatpane inner-content ">
                                <div class="settings-list">
                                    <div class="setting-item">
                                        <div class="setting-text">Sidebar Position</div>
                                        <div class="setting-set">
                                            <select
                                                    class="sidebar-pos-option form-control input-inline input-sm input-small ">
                                                <option value="left" selected="selected">Left</option>
                                                <option value="right">Right</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="setting-item">
                                        <div class="setting-text">Header</div>
                                        <div class="setting-set">
                                            <select
                                                    class="page-header-option form-control input-inline input-sm input-small ">
                                                <option value="fixed" selected="selected">Fixed</option>
                                                <option value="default">Default</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="setting-item">
                                        <div class="setting-text">Footer</div>
                                        <div class="setting-set">
                                            <select
                                                    class="page-footer-option form-control input-inline input-sm input-small ">
                                                <option value="fixed">Fixed</option>
                                                <option value="default" selected="selected">Default</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-header">
                                    <h5 class="list-heading">Account Settings</h5>
                                </div>
                                <div class="settings-list">
                                    <div class="setting-item">
                                        <div class="setting-text">Notifications</div>
                                        <div class="setting-set">
                                            <div class="switch">
                                                <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                       for="switch-1">
                                                    <input type="checkbox" id="switch-1"
                                                           class="mdl-switch__input" checked>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="setting-item">
                                        <div class="setting-text">Show Online</div>
                                        <div class="setting-set">
                                            <div class="switch">
                                                <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                       for="switch-7">
                                                    <input type="checkbox" id="switch-7"
                                                           class="mdl-switch__input" checked>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="setting-item">
                                        <div class="setting-text">Status</div>
                                        <div class="setting-set">
                                            <div class="switch">
                                                <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                       for="switch-2">
                                                    <input type="checkbox" id="switch-2"
                                                           class="mdl-switch__input" checked>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="setting-item">
                                        <div class="setting-text">2 Steps Verification</div>
                                        <div class="setting-set">
                                            <div class="switch">
                                                <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                       for="switch-3">
                                                    <input type="checkbox" id="switch-3"
                                                           class="mdl-switch__input" checked>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-header">
                                    <h5 class="list-heading">General Settings</h5>
                                </div>
                                <div class="settings-list">
                                    <div class="setting-item">
                                        <div class="setting-text">Location</div>
                                        <div class="setting-set">
                                            <div class="switch">
                                                <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                       for="switch-4">
                                                    <input type="checkbox" id="switch-4"
                                                           class="mdl-switch__input" checked>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="setting-item">
                                        <div class="setting-text">Save Histry</div>
                                        <div class="setting-set">
                                            <div class="switch">
                                                <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                       for="switch-5">
                                                    <input type="checkbox" id="switch-5"
                                                           class="mdl-switch__input" checked>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="setting-item">
                                        <div class="setting-text">Auto Updates</div>
                                        <div class="setting-set">
                                            <div class="switch">
                                                <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                       for="switch-6">
                                                    <input type="checkbox" id="switch-6"
                                                           class="mdl-switch__input" checked>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end chat sidebar -->
    </div>
    <!-- end page container -->
@endsection