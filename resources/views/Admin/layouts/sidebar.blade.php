@section('sidebar')
    <div class="page-container">
        <!-- start sidebar menu -->
        <div class="sidebar-container">
            <div class="sidemenu-container navbar-collapse collapse fixed-menu">
                <div id="remove-scroll" class="left-sidemenu">
                    <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false"
                        data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <li class="sidebar-toggler-wrapper hide">
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                        </li>
                        <li class="sidebar-user-panel">
                            <div class="user-panel">
                                <div class="pull-left image">
                                    <img src="{{@asset('Uploads/users/thumbnails/'.Auth::user()->image)}}"
                                         class="img-circle user-img-circle"
                                         alt="User Image"/>
                                </div>
                                <div class="pull-left info">
                                    <p> {{@Auth::user()->name}}</p>
                                    <a href="#"><i class="fa fa-circle user-online"></i><span
                                                class="txtOnline">
												Online</span></a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item start active open">
                            <a href="{{route('admin-dashboard')}}" class="nav-link nav-toggle">
                                <i class="material-icons">dashboard</i>
                                <span class="title">Dashboard</span>
                                <span class="selected"></span>
                                {{--<span class="arrow open"></span>--}}
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="event.html" class="nav-link nav-toggle"> <i class="material-icons">event</i>
                                <span class="title">Event Management</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">person</i>
                                <span class="title">Users</span> <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{route('user.index')}}" class="nav-link "> <span class="title">
												View All User</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('user.create')}}" class="nav-link "> <span class="title">
												Add New User</span>
                                    </a>
                                </li>
                            </ul>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">school</i>
                                <span class="title">Departments</span> <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{route('department.index')}}" class="nav-link "> <span class="title">All
												Departments</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('department.create')}}" class="nav-link "> <span class="title">Add
												Departments</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">book</i>
                                <span class="title">Bookings</span> <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{route('bookings.index')}}" class="nav-link "> <span class="title">All
												Bookings</span>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('bookings.create')}}" class="nav-link "> <span class="title">Add
												Bookings</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">work</i>
                                <span class="title">Services</span> <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{route('services.index')}}" class="nav-link "> <span class="title">All
												Services</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('services.create')}}" class="nav-link "> <span class="title">Add
												Services</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">

                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">school</i>
                                <span class="title">User Roles</span> <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{route('roles.index')}}" class="nav-link "> <span class="title">View all
												roles</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('roles.create')}}" class="nav-link "> <span class="title">Add new
												role</span>
                                    </a>
                                </li>

                            </ul>
                        </li>


                        <li class="nav-item">
                            <a href="" class="nav-link nav-toggle"> <i class="material-icons">info</i>
                                <span class="title">Service Details</span> <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{route('service_details.index')}}" class="nav-link "> <span class="title">All Details</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('service_booked.index')}}" class="nav-link "> <span class="title">Service Booked</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('service_complete.index')}}" class="nav-link "> <span
                                                class="title">Service Complete</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('service_cancel.index')}}" class="nav-link "> <span
                                                class="title">Service Cancel</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('service_reschedule.index')}}" class="nav-link "> <span
                                                class="title">Service Reschedule</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">person</i>
                                <span class="title">Available Date</span> <span class="arrow"></span>

                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{route('AvailableDate.index')}}" class="nav-link "> <span class="title">
												View All Available Date</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('AvailableDate.create')}}" class="nav-link "> <span class="title">
												Add New Date</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">person</i>
                                <span class="title">Available Time</span> <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{route('AvailableTime.index')}}" class="nav-link "> <span class="title">
												View All Available Time</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('AvailableTime.create')}}" class="nav-link "> <span class="title">
												Add New Time</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">person</i>
                                <span class="title">Date and Time</span> <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{route('Date_Time.index')}}" class="nav-link "> <span class="title">
												View All Date and Time</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('Date_Time.create')}}" class="nav-link "> <span class="title">
												Add New Date and Time</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">person</i>
                                <span class="title">ToDo</span> <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{route('Todo.index')}}" class="nav-link "> <span class="title">
												View All ToDo</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('Todo.create')}}" class="nav-link "> <span class="title">
												Add New ToDo</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- end sidebar menu -->

        <!-- start chat sidebar -->
        <div class="chat-sidebar-container" data-close-on-body-click="false">
            <div class="chat-sidebar">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="index.html#quick_sidebar_tab_1" class="nav-link active tab-icon" data-toggle="tab"> <i
                                    class="material-icons">chat</i>Chat
                            <span class="badge badge-danger">4</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.html#quick_sidebar_tab_3" class="nav-link tab-icon" data-toggle="tab"> <i
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
                                    <li class="media"><img class="media-object" src="../assets/img/prof/prof3.jpg"
                                                           width="35" height="35" alt="...">
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
                                    <li class="media"><img class="media-object" src="../assets/img/prof/prof5.jpg"
                                                           width="35" height="35" alt="...">
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
                                    <li class="media"><img class="media-object" src="../assets/img/prof/prof2.jpg"
                                                           width="35" height="35" alt="...">
                                        <i class="busy dot"></i>
                                        <div class="media-body">
                                            <h5 class="media-heading">Sarah Smith</h5>
                                            <div class="media-heading-sub">Anaesthetics</div>
                                        </div>
                                    </li>
                                    <li class="media"><img class="media-object" src="../assets/img/prof/prof7.jpg"
                                                           width="35" height="35" alt="...">
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
                                    <li class="media"><img class="media-object" src="../assets/img/prof/prof8.jpg"
                                                           width="35" height="35" alt="...">
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
                                    <li class="media"><img class="media-object" src="../assets/img/prof/prof10.jpg"
                                                           width="35" height="35" alt="...">
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
                                                    <input type="checkbox" id="switch-1" class="mdl-switch__input"
                                                           checked>
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
                                                    <input type="checkbox" id="switch-7" class="mdl-switch__input"
                                                           checked>
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
                                                    <input type="checkbox" id="switch-2" class="mdl-switch__input"
                                                           checked>
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
                                                    <input type="checkbox" id="switch-3" class="mdl-switch__input"
                                                           checked>
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
                                                    <input type="checkbox" id="switch-4" class="mdl-switch__input"
                                                           checked>
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
                                                    <input type="checkbox" id="switch-5" class="mdl-switch__input"
                                                           checked>
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
                                                    <input type="checkbox" id="switch-6" class="mdl-switch__input"
                                                           checked>
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
    {{--</div>--}}
    <!-- end page container -->
@endsection