<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="RedstarHospital" />
    <title>Appointment | login</title>
    <!-- google font -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css" />
    <!-- icons -->
    <link href="{{asset('Admin/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('Admin/assets/plugins/iconic/css/material-design-iconic-font.min.css')}}">
    <!-- bootstrap -->
    <link href="{{asset('Admin/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="{{asset('Admin/assets/css/pages/extra_pages.css')}}">
    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('Admin/assets/img/favicon.ico')}}" />

    <!--Toastr-->
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">

</head>

<body>
<div class="limiter">

    <div class="container-login100 page-background">
        <div class="wrap-login100">
            @if(count($errors)>0)
                @foreach($errors->all() as $error)
                    {{Session::flash('Error',$error)}}
                @endforeach
            @endif
            <form class="login100-form validate-form" action="{{route('login')}}" method="post" autocomplete="on">
					<span class="login100-form-logo">
						<img alt="" src="{{asset('Admin/assets/img/logo-2.png')}}">
					</span>
                {{csrf_field()}}
                <span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
                <div class="wrap-input100 validate-input" data-validate="Enter username">
                    <input class="input100" type="email" name="email" placeholder="Email">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>
                <div class="contact100-form-checkbox">
                    <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" value="1">
                    <label class="label-checkbox100" for="ckb1">
                        Remember me
                    </label>
                </div>
                {{csrf_field()}}
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Login
                    </button>
                </div>
                <div class="text-center p-t-30">
                    <a class="txt1" href="#">
                        Forgot Password?
                    </a>
                </div>
                <br>
                <div class="social-auth-links text-center mb-3">
                    <a href="{{url('login/google')}}" class="btn btn-block btn-danger">
                    <i class="fa fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                    <p>- OR -</p>
                    <a href="{{url('login/facebook')}}" class="btn btn-block btn-primary">
                        <i class="fa fa-facebook mr-2"></i> Sign in using Facebook
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
<!-- end js include path -->
</body>

</html>