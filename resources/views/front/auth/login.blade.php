@extends('front.layouts.app')
@section('content')
    <section class="top-space top-space-responsive">
        <div class="sub-division loginDiv sub-division-responsive">
            <div class="container d-flex h-100 justify-content-center">
                <div class="row justify-content-center align-content-center w-100">
                    <div class="responsive-height  width pt-lg-0 pt-4 h-100 ">
                        
                    
                        <form class="register-form pb-3 pt-3 d-flex flex-column justify-content-center h-100" method="POST" action="{{ route('login') }}" class="register-form pb-3">
                            @csrf
                            <div class="align-self-start justify-content-center w-100 h-100 ">
                                <div class="header-strip  text-center border-0 pb-sm-2 pb-3  h-auto" id="about">
                                    <h2 class="n-bold f-24 mb-sm-0 mb-1 pt-md-4 pt-2 text-muted">LOGIN</h2>
                                    <i class="r-lightItalic f-9 text-body">Work and Live near your location with TH2.0. Share, Learn and Experience the 2.0 Life. </i>
                                </div>
                                <div class="d-block">
                                    <input type="text" name="username" id="username" class="form-control r-lightItalic f-9 {{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{ old('username') }}" placeholder="Email Address/TH 2.0 ID" required>
                                        @if ($errors->has('username'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                        {{-- @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif --}}
                                </div>
                                <div class="d-block">
                                    
                                    <input type="password" name="password" id="password" class="form-control r-lightItalic f-9 {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" required autocomplete="password">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                {{-- {{dd($errors)}} --}}
                                <div class="text-center pb-3 pt-sm-2 pt-lg-2 pt-3">
                                    <p class="r-lightItalic f-9 text-body">Forgot Password, <strong class="r-boldItalic text-body"><a href="{{url('/password/reset')}}" class="text-body">Click Here</a></strong></p>
                                </div>
                            </div>
                            {{-- <div class="align-self-center justify-content-center w-100 h-100">
                                <div class="alternate-login text-center pt-sm-5 pt-lg-3 pt-4">
                                    <p class=" n-bold f-24 mb-0 text-muted">OR</p>
                                    <p class="r-lightItalic f-9 text-body">Login Using my Social Networking Website</p>
                                </div>
                                <div class="social-media-login d-flex justify-content-between mx-auto pt-sm-3 pt-4 pb-2">
                                    <div class="social-media-img">
                                        <a href="{{url('/auth/facebook')}}">
                                            <img src="{{url('/img/SVG_Cowork/facebook-logo.svg')}}" class="img-fluid" alt="facebook-logo" />
                                        </a>
                                    </div>
                                    <div class="social-media-img">
                                        <a href="{{url('/auth/google')}}">
                                            <img src="{{url('/img/SVG_Cowork/google-logo.svg')}}" class="img-fluid" alt="google-logo" />
                                        </a>
                                    </div>
                                    <div class="social-media-img">
                                        <a href="{{url('/auth/linkedin')}}">
                                            <img src="{{url('/img/SVG_Cowork/linkedin-logo.svg')}}" class="img-fluid" alt="linkedin-logo" />
                                        </a>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="align-self-end justify-content-center w-100 ">
                                <div class="row pt-sm-5 pt-3 mt-sm-4">
                                    <div class="col-6 ">
                                        {{-- <button href="{{ route('register') }}" type="submit" class="btn btn-success n-bold f-9 rounded-0 ml-md-2 w-100">Register</button> --}}
                                        <a href="{{ route('register') }}" class="btn btn-success n-bold f-9 rounded-0 ml-md-2 w-100">Register</a>
                                    </div>
                                    <div class="col-6 ">
                                        {!! Form::hidden('redirect_url', url()->previous()) !!}
                                        <button type="submit" class="btn btn-success n-bold f-9 rounded-0 ml-md-2 w-100">Sign In</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection