@extends('front.layouts.app')
@section('content')
    <section class="top-space">
        <div class="sub-division loginDiv ">
            <div class="container d-flex h-100 justify-content-center">
                <div class="row justify-content-center align-content-center w-100">
                    <div class="responsive-height justify-content-center width pt-lg-0 pt-4">
                        <div class="header-strip  text-center border-0 pb-sm-2 pb-3  h-auto" id="about">
                            <h2 class="n-bold f-24 mb-sm-0 mb-1 pt-md-4 pt-2 text-muted">Reset Password</h2>
                            <i class="r-lightItalic f-9 text-body">Work and Live near your location with TH2.0. Share, Learn and Experience the 2.0 Life. </i>
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">
                            
                            {{-- <div class="form-group row"> --}}
                                {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}

                                <div class="d-block">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" placeholder="Email Address/TH 2.0 ID" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            {{-- </div> --}}

                            {{-- <div class="form-group row"> --}}
                                {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                                <div class="d-block">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            {{-- </div> --}}

                            {{-- <div class="form-group row"> --}}
                                {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> --}}

                                <div class="d-block">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                                </div>
                            {{-- </div> --}}

                            <div class="form-group row mb-0">
                                <div class="col-md-6 mx-auto">
                                    <button type="submit" class="btn btn-success n-bold f-9 rounded-0 ml-md-2 w-100">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection