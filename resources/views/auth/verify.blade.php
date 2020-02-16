@extends('frontEnd.layers.master')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Verification code resent successfully.') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="container-fluid">
                                <div class="container">
                                    <div class="col-md-12 pull-right">
                                        <img src="{{asset('Frontend/images/appoin.jpeg')}}" alt="Mail Image" width="100%"
                                             height="270px">
                                    </div>
                                </div>

                                {{ __('You are a few seconds behind for using all the features of our site.
                                        We\'ve sent a verification link to your email address just to make sure that there won\'t be any
                                        inconvenient while serving you in the near future. Before proceeding, please verify your account.') }}
                                <br>
                                <hr>
                                <br>
                                <strong>{{ __('Didn\'t get the code ?') }}</strong><a
                                        href="{{ route('verification.resend') }}">
                                    <button class="bg bg-info"><u>{{ __('Resend Verification code') }}</u></button>
                                </a>.
                            </div>
                            <div class="container col-md-12">
                                <div class="col-md-offset-6 pull-right">
                                    <strong>Regards,</strong>
                                    <hr>
                                    <h5>Appointment Booking System Family</h5>

                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
