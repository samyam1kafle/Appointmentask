@extends('frontEnd.layers.master')
@section('body')
    <div class="header">
        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                {{Session::flash('Error',$error)}}
            @endforeach
        @endif
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                </div>

                <div class="col-md-2">
                    <a href="#"><h2>Become Provider?</h2></a>
                </div>
                <div class="col-md-12">
                    <h1>Appointment Booking System</h1>
                </div>

                <div class="col-md-3">
                </div>

                <div class="col-md-3">
                    <a href="{{route('login')}}"><h3>Login</h3></a>
                </div>

                <div class="col-md-3">
                    <a href="{{route('register')}}"><h3>Register</h3></a>
                </div>

                <div class="col-md-3">
                </div>


                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <a href="#"><h4>Guest</h4></a>
                </div>
                <div class="col-md-4">
                </div>


@endsection