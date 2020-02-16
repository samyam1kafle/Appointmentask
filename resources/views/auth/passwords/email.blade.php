@extends('frontEnd.layers.master')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Your Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="container-fluid">
                                <div class="container">
                                    <div class="col-md-12 pull-right">
                                        <img src="{{asset('Uploads/pwd_image/forgot.gif')}}" alt="Mail Image"
                                             width="100%"
                                             height="270px">
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="col-md-12 pull-right">
                                        <form method="POST" action="{{ route('password.email') }}">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="email"
                                                       class="col-md-6 col-form-label "><strong>{{ __('E-Mail Address') }}</strong></label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           name="email" value="{{ old('email') }}" required
                                                           autocomplete="email" placeholder="aByZ@xyz.com"
                                                           autofocus>

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-outline-info btn-xs">
                                                        {{ __('Send Password Reset Link') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
