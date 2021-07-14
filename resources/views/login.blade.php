@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex"><img src="{{ asset('/img/e6b2c1075f52c4d539f9d67e388d8a7c.jpg') }}" style="width: 519px;height: 435px;"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        
                                        <h4 class="text-dark mb-4">Welcome Back!</h4>
                                        @if ($errors->has('email'))
                                            <p class="text-danger text-left">
                                                {{ $errors->get('email')[0] }}
                                            </p>
                                        @endif
                                    </div>
                                    <form class="user" accept="{{ route('login') }}" method="post">
                                        @csrf
                                        <div class="form-group"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" style="margin: 17px;"></div>
                                        <div class="form-group"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password" style="margin: 17px;"></div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1"><label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label></div>
                                            </div>
                                        </div><button class="btn btn-primary btn-block text-white btn-user" type="submit" style="margin: 17px;">Login</button>
                                        <hr><a class="btn btn-primary btn-block text-white btn-google btn-user" role="button" style="margin: 17px;"><i class="fab fa-google"></i>&nbsp; Login with Google</a><a class="btn btn-primary btn-block text-white btn-facebook btn-user" role="button" style="margin: 17px 20px 20px;width: 363.984px;"><i class="fab fa-facebook-f"></i>&nbsp; Login with Facebook</a>
                                        <hr>
                                    </form>
                                    <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
                                    <div class="text-center"><a class="small" href="{{ route('register') }}">Create an Account!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

    
