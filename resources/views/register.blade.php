@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex"><img src="{{ asset('/img/42f531221ce4f5d4614036c9f0021cd5.jpg') }}" style="width: 506px;"></div>
                    <div class="col-lg-7" style="height: 643px;">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Create an Account!</h4>
                            </div>
                            <form class="user" action="{{ route('register.store') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input class="form-control form-control-user 
                                                @error('first_name')
                                                    border border-danger
                                                @enderror
                                                " type="text" id="exampleFirstName" placeholder="First Name" name="first_name" style="width: 538.484px;" value="{{ old('first_name') }}">
                                                
                                        @error('first_name')
                                            <small>{{ $message }}</small>
                                        @enderror
                                                
                                        <input class="form-control form-control-user 
                                                @error('last_name')
                                                    border border-danger
                                                @enderror
                                                " type="text" id="exampleFirstName-1" placeholder="Last Name" name="last_name" style="margin-top: 18px;width: 538.484px;" value="{{ old('last_name') }}">

                                        @error('last_name')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                                
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-user
                                                @error('email')
                                                    border border-danger
                                                @enderror
                                            " type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email Address" name="email" style="width: 538.484px;" value="{{ old('email') }}">

                                    @error('email')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                                
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input class="form-control form-control-user
                                                @error('password')
                                                    border border-danger
                                                @enderror
                                            " type="password" id="examplePasswordInput" placeholder="Password" name="password" style="padding: 1px 12px;width: 538.484px;">
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror

                                        <input class="form-control form-control-user
                                                @error('password')
                                                    border border-danger
                                                @enderror
                                            " type="password" id="exampleRepeatPasswordInput" placeholder="Repeat Password" name="password_confirmation" style="margin-top: 14px;width: 538.484px;">
                                    </div>

                                </div><button class="btn btn-primary btn-block text-white btn-user" type="submit">Register Account</button>
                                <hr><a class="btn btn-primary btn-block text-white btn-google btn-user" role="button"><i class="fab fa-google"></i>&nbsp; Register with Google</a><a class="btn btn-primary btn-block text-white btn-facebook btn-user" role="button"><i class="fab fa-facebook-f"></i>&nbsp; Register with Facebook</a>
                                <hr>
                            </form>
                            <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
                            <div class="text-center"><a class="small" href="login.html">Already have an account? Login!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
