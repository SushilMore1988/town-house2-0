@extends('front.layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('/plugins/datetime-picker/css/datetime-picker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('/front/bootstrap3-datepicker/bootstrap-glyphicons.css')}}"> 
    <style type="text/css">
        .bootstrap-datetimepicker-widget table td {
             text-align: left; 
            /*border-radius: 4px;*/
        }
        .bootstrap-datetimepicker-widget table td span {
            text-align: center;
        }
        .bootstrap-datetimepicker-widget table thead tr:first-child th {
           font-family: "nevis-bold", sans-serif;
        }
        .bootstrap-datetimepicker-widget.dropdown-menu {
            padding: 15px 5px;
            display: block;
            margin: 2px 0;
            /*padding: 4px;*/
            width: 20em;
            border-radius: 17px;
        }
        .glyphicon {
            border: 1px solid #ccc;
            padding: 6px 7px 8px 7px;
            border-radius: 50%;
        }
        .bootstrap-datetimepicker-widget table td.day {
            text-align: center;
        }
        .bootstrap-datetimepicker-widget table th {
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <section class="top-space">
        <div class="sub-division loginDiv">
            <div class="container d-flex h-100 justify-content-center">
                <div class="row justify-content-center align-content-center w-100">
                    <div class="responsive-height justify-content-center width pt-lg-0 pt-4">
                        <div class="header-strip  text-center border-0 pb-sm-2 pb-3 " id="about">
                            <h2 class="n-bold f-24 mb-sm-0 mb-1 pt-4 text-muted">REGISTER</h2>
                            <i class="r-lightItalic f-9 text-body">Register with TH2.0 and experience a new culture to live and work in cities.</i>
                        </div>
                        <form class="register-form pb-2 pt-2" method="POST" action="{{ route('register') }}" enctype='multipart/form-data'>
                            @csrf
                            <div class="d-block">
                               <input id="first_name" type="text" class="r-lightItalic f-9 form-control w-100{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="d-block">
                                <input id="last_name" type="text" class="-lightItalic f-9 form-control w-100{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="d-block">
                                <input id="email" type="email" class="r-lightItalic f-9 form-control w-100 {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email Address" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="d-block">
                                <div class="form-group mb-2">
                                    <div class='input-group date mb-1'>
                                        <input type='text' class="form-control w-100 {{ $errors->has('birth_date') ? ' is-invalid' : '' }}" value="{{ old('birth_date') }}" name="birth_date" placeholder="Birth Date"  id="datetimepicker2"/>
                                    </div>
                                </div>
                                @if ($errors->has('birth_date'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('birth_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="d-block">
                                <select name="gender" class="r-lightItalic f-9 form-control w-100 {{ $errors->has('gender') ? ' is-invalid' : '' }}" value="{{ old('gender') }}">
                                    <option value="" selected disabled>Gender</option>
                                    <option value="Male" {{ old('gender') == "Male" ? 'selected' : '' }} >Male</option>
                                    <option value="Female" {{ old('gender') == "Female" ? 'selected' : '' }}>Female</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="d-block">
                                <input id="phone" type="text" class="r-lightItalic f-9 form-control w-100 {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" placeholder="Phone" required autofocus>
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="d-block">
                                <select name="country" class="r-lightItalic f-9 form-control w-100 {{ $errors->has('country') ? ' is-invalid' : '' }}" value="{{ old('country') }}">
                                    <option value="" selected disabled>Country</option>
                                    @foreach($countries as $country)
                                    <option value="{{ $country->id }}" {{ old('country') == $country->id ? 'selected' : '' }} >{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('country'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="d-block">
                                {!! Form::select('currency', ['' => 'Currency', 'USD' => 'USD', 'INR' => 'INR', 'SGD' => 'SGD', 'EUR' => 'EUR', 'GBP' => 'GBP', 'AUD' => 'AUD', 'RUB' => 'RUB', 'JPY' => 'JPY', 'AUD' => 'AUD', 'CAD' => 'CAD'], null, ['class' => 'form-control w-100 currency-percent']) !!}
                                @if ($errors->has('currency'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('currency') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="d-block mb-2">
                                <div class="custom-file rounded-0">
                                    <input type="file" class="custom-file-input r-lightItalic f-9 form-control w-100 rounded-0" id="profile-image" name="profile_image"  value="{{ old('profile_image') }}">
                                    <label class="custom-file-label" for="customFile">Profile Image (Optional)</label>
                                </div>
                            </div>
                            
                            <div class="d-block">
                                <input id="password" type="password" class="r-lightItalic f-9 form-control w-100 {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" autocomplete="password" placeholder="Password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="d-block">
                                <input id="password-confirm" type="password" class="r-lightItalic f-9 form-control w-100" name="password_confirmation" required placeholder="Confirm Password" autocomplete="password_confirmation">
                            </div>
                            <div class="text-center already-login pb-3 pt-sm-2 pt-3">
                                <p class="r-lightItalic f-9 text-body">Already a part of <strong class="r-boldItalic text-body">TH2.0</strong> Community, <strong class="r-boldItalic"><a href="{{route('login')}}" class="text-body">Click Here</a></strong></p>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{route('login')}}" class="btn btn-success n-bold f-9 rounded-0 ml-md-2 w-100">Sign In</a>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-success n-bold f-9 rounded-0 ml-md-2 w-100">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script type="text/javascript" src="{{url('/plugins/datetime-picker/js/moment.js')}}"></script>
    <script type="text/javascript" src="{{url('/plugins/datetime-picker/js/datetime-picker.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#datetimepicker2').datetimepicker({
                format: 'DD-MM-YYYY',
                viewMode: 'years',
                maxDate: new Date('{{ date('Y-m-d', strtotime('- 16 year')) }}'),
            });
            @if(old('birth_date'))
            $('#datetimepicker2').val('{{ old('birth_date') }}');
            @endif
        });
        $(".custom-file-input").on("change", function() {
          var fileName = $(this).val().split("\\").pop();
          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection