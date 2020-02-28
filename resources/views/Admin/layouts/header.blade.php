@section('header')
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            {{Session::flash('Error',$error)}}
        @endforeach
    @endif
    <div class="page-header navbar navbar-fixed-top">
        <div class="page-header-inner ">
            <!-- logo start -->
            <div class="page-logo">
                <a href="{{route('admin-dashboard')}}">
                    <span class="logo-icon material-icons fa-rotate-45">school</span>
                    <span class="logo-default"> Admin</span> </a>
            </div>
            <!-- logo end -->
            <ul class="nav navbar-nav navbar-left in">
                <li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
            </ul>
            <!-- start mobile menu -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
               data-target=".navbar-collapse">
                <span></span>
            </a>
            <!-- end mobile menu -->
            <!-- start header menu -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li><a href="javascript:;" class="fullscreen-btn"><i class="fa fa-arrows-alt"></i></a></li>

                    {{--notification--}}

                        <notification :userid="{{auth()->user()->id}}"
                                      :unreads="{{auth()->user()->unreadNotifications}}" id="app"></notification>


                    <li><a href="{{route('index')}}"><i class="fa fa-home pull-left"
                                                        style="font-size: xx-large"> </i></a></li>

                    <!-- start language menu -->

                    <!-- end language menu -->

                    <!-- start manage user dropdown -->
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <img alt="" class="img-circle "
                                 src="{{@asset('Uploads/users/thumbnails/'.Auth::user()->image)}}"/>
                            <span class="username username-hide-on-mobile"> {{Auth::user()->name}} </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="{{route('user_profile')}}">
                                    <i class="icon-user"></i> Profile </a>
                            </li>
                            <li>
                                <a href="{{route('update_profile')}}">
                                    <i class="icon-settings"></i> Update Details
                                </a>
                            </li>

                            <li class="divider"></li>

                            <li>
                                <a href="{{route('log-out')}}">
                                    <i class="icon-logout"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end manage user dropdown -->

                </ul>
            </div>
        </div>
    </div>

@endsection