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
                            <a href="#" class="nav-link nav-toggle"> <i class="material-icons">book</i>
                                <span class="title">Bookings</span> <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{route('bookings.index')}}" class="nav-link "> <span class="title">All
												Bookings</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        @if(Auth::user()->roles->name == 'super_admin')
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

                                    <li class="nav-item">
                                        <a href="{{route('Degree.index')}}" class="nav-link "> <span class="title">
												User Degree</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle"> <i class="material-icons">people</i>
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
                                <a href="#" class="nav-link nav-toggle"> <i class="material-icons">school</i>
                                    <span class="title">Departments</span> <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="{{route('department.index')}}" class="nav-link "> <span class="title">All
												Departments</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-item">

                                <a href="#" class="nav-link nav-toggle"> <i class="material-icons">assignment</i>
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



                        @endif

                        @if(Auth::user()->roles->name == 'admin' || Auth::user()->roles->name == 'super_admin')
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
                                <a href="#" class="nav-link nav-toggle"> <i class="material-icons">date_range</i>
                                    <span class="title"> Date And Time</span> <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="{{route('Date_Time.index')}}" class="nav-link "> <span class="title">

												View Date and Time</span>

                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('Date_Time.create')}}" class="nav-link "> <span class="title">

												Add New Date and Time</span>

                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <!-- end sidebar menu -->


@endsection