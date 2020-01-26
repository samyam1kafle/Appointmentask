<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta name="description" content="Responsive Admin Template"/>
    <meta name="author" content="RedstarHospital"/>
    <title>Appointment Login</title>
    <!-- google font -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <!-- icons -->
    <link href="{{asset('Admin/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{asset('Admin/assets/plugins/iconic/css/material-design-iconic-font.min.css')}}">
    <!-- bootstrap -->
    <link href="{{asset('Admin/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- style -->
    <link rel="stylesheet" href="{{asset('Admin/assets/css/pages/extra_pages.css')}}">
    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('Admin/assets/img/favicon.ico')}}"/>

    <!--Toastr-->
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">

</head>

<body>

    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            {{Session::flash('Error',$error)}}
        @endforeach
    @endif
<div class="limiter">
    <div class="container-login100 page-background">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="post" action="{{route('register')}}"
                  enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" value="1" name="status">
                <span class="login100-form-logo">
						<img alt="" src="{{asset('Admin/assets/img/logo-2.png')}}">
					</span>
                <span class="login100-form-title p-b-34 p-t-27">
						Registration
					</span>
                <div class="row">
                    <div class="col-lg-6 p-t-20">
                        <div class="wrap-input100 validate-input" data-validate="Enter username">
                            <input class="input100" type="text" name="name" placeholder="Username">
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>
                    </div>
                    <div class="col-lg-6 p-t-20">
                        <div class="wrap-input100 validate-input" data-validate="Enter email">
                            <input class="input100" type="email" name="email" placeholder="Email">
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>
                    </div>
                    <div class="col-lg-6 p-t-20">
                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <input class="input100" type="password" name="password" placeholder="Password">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>
                    </div>
                    <div class="col-lg-6 p-t-20">
                        <div class="wrap-input100 validate-input" data-validate="Enter password again">
                            <input class="input100" type="password" name="password_confirmation"
                                   placeholder="Confirm Password">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="container card-body" id="bar-parent3">
                            <label for="gender"> Gender: &nbsp;

                                <input id="radiobg1" type="radio" name="gender" value="Male" checked="checked"> Male


                                <input id="radiobg1" type="radio" name="gender" value="Female" placeholder="female">
                                Female

                                <input type="radio" id="radiobg1" name="gender" value="Other" placeholder="other"> Other

                            </label>
                        </div>

                        <br>
                    </div>


                    <div class="container-login100-form-btn">
                        <label for="image">Upload Profile picture</label>
                        <button class="login100-form-btn">
                            <input type="file" name="image">
                        </button>
                    </div>
                </div>
                <br>
                <div class="contact100-form-checkbox">
                    <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" value="1">
                    <label class="label-checkbox100" for="ckb1">
                        Remember me
                    </label>
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Register
                    </button>
                </div>
                <div class="text-center p-t-30">
                    <a class="txt1" href="{{route('login')}}">
                        You already have a membership?
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- start js include path -->
<script src="{{asset('Admin/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- bootstrap -->
<script src="{{asset('Admin/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('Admin/assets/js/pages/extra-pages/pages.js')}}"></script>
<!-- end js include path -->
<!-- Toastr -->

<script src="{{asset('js/toastr.min.js')}}"></script>
<script>
    @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}")

    @endif


    @if(Session::has('delete'))
    toastr.info("{{Session::get('delete')}}")
    @endif

    @if(Session::has('Error'))
    toastr.error("{{Session::get('Error')}}")
    @endif

</script>
</body>

</html>