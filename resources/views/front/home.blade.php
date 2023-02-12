<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Welcome to TH 2.0</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{url('/front/home/vendor/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('/front/home/vendor/fontawesome/css/all.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('/front/home/css/main.css')}}">
        <link rel="apple-touch-icon" sizes="57x57" href="{{url('/img/fav/apple-icon-57x57.png')}}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{url('/img/fav/apple-icon-60x60.png')}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{url('/img/fav/apple-icon-72x72.png')}}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{url('/img/fav/apple-icon-76x76.png')}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{url('/img/fav/apple-icon-114x114.png')}}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{url('/img/fav/apple-icon-120x120.png')}}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{url('/img/fav/apple-icon-144x144.png')}}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{url('/img/fav/apple-icon-152x152.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{url('/img/fav/apple-icon-180x180.png')}}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{url('/img/fav/android-icon-192x192.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{url('/img/fav/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{url('/img/fav/favicon-96x96.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{url('/img/fav/favicon-16x16.png')}}">
        <link rel="manifest" href="{{url('/img/fav/manifest.json')}}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{url('/img/fav/ms-icon-144x144.png')}}">
        <meta name="theme-color" content="#ffffff">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
    <body data-spy='scroll' data-target=".navbar" id="home" data-offset="50">
        <section >
            <header id="header" class="header fixed-top bg-white">
                <div class="container">
                    <nav class="navbar navbar-expand px-0" id="myNavbar">
                        <a href="{{url('/')}}" class="navbar-brand">
                            <!-- <img src="{{url('/img/SVG_Cowork/town-house-logo.svg')}}" class="img-fluid" alt="logo image" /> -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 94.24 94.24" class="img-fluid svg"><defs><style>.cls-1{fill:#fff;stroke:#010201;stroke-width:0.25px;}.cls-1,.cls-2{stroke-miterlimit:10;}.cls-2{font-size:33.83px;fill:#b2b2b3;stroke:#010101;stroke-width:0.06px;font-family:nevis-Bold, nevis;font-weight:700;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><rect class="cls-1" x="0.13" y="0.13" width="93.99" height="93.99"/><text class="cls-2" transform="translate(21.75 40.88)">TH <tspan x="-1.56" y="36.9">2.0</tspan></text></g></g></svg>
                        </a>
                        <div class="navbar-nav ml-auto d-none d-lg-flex ">
                            <li class="nav-item ">
                                <a href="{{url('/')}}" class="nav-link text-muted n-bold f-9 active">HOME </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('about') }}" class="nav-link text-muted n-bold f-9 ">ABOUT</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('th2.0')}}" class="nav-link text-muted n-bold f-9 ">TH 2.0</a>
                            </li>
                            <li class="nav-item">
                                {{-- <a href="javascript:void(0)" class="nav-link text-muted n-bold f-9  ">CO-LIVE </a> --}}
                                <a href="{{route('co-live')}}" class="nav-link text-muted n-bold f-9  ">CO-LIVE </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('co-work-space.index')}}" class="nav-link text-muted n-bold f-9 " >CO-Work</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('develop')}}" class="nav-link text-muted n-bold f-9 ">Develop</a>
                            </li>
                            @auth
                            @else
                                <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link text-muted n-bold f-9 ">Login</a>
                            </li>
                            @endauth
                        </div>
                        <div class="mobile-menu d-lg-none d-flex align-items-center ml-auto">
                            <div class="side-nav bg-dark" id="sideNav">
                                <a href="javascript:void(0)" class="closebtn" id="closeMenu">
                                    <i class="far fa-times-circle"></i>
                                </a>
                                <a href="{{url('/')}}" class="n-bold f-9">HOME</a>
                                <a href="{{route('about') }}" class="n-bold f-9">ABOUT</a>
                                <a href="#" class="n-bold f-9">TH 2.0</a>
                                <a href="{{route('co-live')}}" class="n-bold f-9">CO-LIVE</a>
                                <a href="{{route('co-work-space.index')}}" class="n-bold f-9">CO-WORK</a>
                                <a href="{{route('develop') }}" class="n-bold f-9">DEVELOP</a>
                                 @auth
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('mb-logout-form').submit();">
                                        {{ __('LOGOUT') }}
                                    </a>
                                    {!! Form::open(['route' => ['logout'], 'id'=>'mb-logout-form', 'style'=>'display:none;' ]) !!}
                                    {!! Form::close() !!}
                                @else
                                    <a href="{{ route('login') }}" class="n-bold f-9">LOGIN</a>
                                @endauth
                            </div>
                            <div class="menu-icon " id="openMenu">
                                <div class="menu-bar bg-dark"></div>
                                <div class="menu-bar bg-dark"></div>
                                <div class="menu-bar bg-dark"></div>
                            </div>
                        </div>
                        @auth
                        <div class="profile-photo  d-flex pl-md-4 dropdown pl-2">
                            <p class="pr-3 d-md-block d-none r-lightItalic f-9 align-self-end mb-1">{{Auth::user()->fname}}</p>
                            <!-- <a class="nav-link profile-wrapper p-0" href="#" id="navbardrop" data-toggle="dropdown">
                                <img src="{{url('img/user-profile.png')}}" class="w-100 h-100">
                            </a> -->
                            <a class="nav-link profile-wrapper align-self-center d-flex p-0 justify-content-center" href="#" id="navbardrop" data-toggle="dropdown"> 
                                {{-- @if(Auth::user()->images != null && Auth::user()->images['profile_image']['name'] != null)
                                    <img src="{{url('img/user/profile-image/'.Auth::user()->images['profile_image']['name'])}}" class="w-100 h-100">
                                @else --}}
                                @if(Auth::user()->profile_image != null)
                                    <img src="{{url('img/user/profile-image/'.Auth::user()->profile_image)}}" class="w-100 h-100">
                                @else
                                    <i class="fas fa-user-alt text-dark f-24 align-self-center" style="color: #343a40!important;"></i>
                                @endif    
                            </a>
                            <div class="dropdown-menu py-0 dropdown-menu-right">
                                @php
                                    $i = 0;
                                    $coWorkSpaqaces = App\Models\Cws::where('user_id', Auth::id())->get();     
                                @endphp
                                @foreach($coWorkSpaqaces as $coWorkSpace)
                                    @if($coWorkSpace->progress_percent != 100)
                                        @php   
                                            $i++;
                                        @endphp    
                                        @if($i > 3)
                                            @break
                                        @endif      
                                        <a class="dropdown-item" href="{{route('co-work-space.edit',$coWorkSpace->slug)}}">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h6 class="r-boldItalic f-9 mb-0">{{$coWorkSpace->name}}</h6>
                                                    <p class="f-9 r-lightItalic mb-0">Complete your Listing</p>
                                                </div>
                                                <div class="align-self-center">
                                                    <h5 class="n-bold f-9 mb-0 justify-content-center">{{$coWorkSpace->progress_percent}}<span class="text-muted">%</span></h5>
                                                    <div class="progress" >

                                                        <div class="progress-bar bg-success" style="width:{{$coWorkSpace->progress_percent}}%;height:10px"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                                <a class="dropdown-item" href="{{route('front.dashboard.index')}}"><h6 class="r-boldItalic f-9">Dashboard</h6></a>
                                {{-- <a class="dropdown-item" href="#"><h6 class="r-boldItalic f-9">Review</h6></a>
                                <a class="dropdown-item" href="#"><h6 class="r-boldItalic f-9">Booking</h6></a> --}}
                                <a class="dropdown-item" href="{{ route('setting.index') }}"><h6 class="r-boldItalic f-9">Profile</h6></a>
                                <a class="dropdown-item" href="{{ route('personalise.create') }}"><h6 class="r-boldItalic f-9">Personalise</h6></a>
                                <a class="dropdown-item" href="{{ route('th-network.create') }}"><h6 class="r-boldItalic f-9">Learn your Community Index</h6></a>
                                <a class="dropdown-item" href="{{ route('th-network.index') }}"><h6 class="r-boldItalic f-9">TH2.0 Networks</h6></a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                   <h6 class="r-boldItalic f-9"> {{ __('Logout') }}</h6>
                                </a>
                                {!! Form::open(['route' => ['logout'], 'id'=>'logout-form', 'style'=>'display:none;' ]) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                        @endauth
                    </nav>
                </div>
            </header>
        </section>
        <section class="choose-option">
            <div class="container">
                <div class="row pt-lg-4">
                    <div class="col-md-2 col-6 mx-auto text-center py-3">
                        <!-- <img src="{{url('/img/SVG_Cowork/town-house-logo.svg')}}" alt="town-house-logo" class=" home-page-logo">
                        <img src="{{url('/img/SVG_Cowork/town-house-name.svg')}}" alt="town-house-logo" class="w-100 ml-2"> -->
                        <!-- <img src="{{url('/img/SVG_Cowork/logo-with-name.svg')}}" alt="town-house-logo" class="home-page-logo"> -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60.32 74.34" class="home-page-logo"><defs><style>.cls-61{fill:#fff;stroke:#010201;stroke-width:0.16px;}.cls-61,.cls-65{stroke-miterlimit:10;}.cls-62,.cls-65{fill:none;}.cls-63,.cls-64,.cls-65,.cls-66{isolation:isolate;}.cls-64,.cls-65{font-size:21.65px;}.cls-64{fill:#b2b2b3;}.cls-64,.cls-65,.cls-66{font-family:nevis-Bold, nevis;font-weight:700;}.cls-65{stroke:#010101;stroke-width:0.04px;}.cls-66{font-size:6.4px;fill:#999;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><rect class="cls-61" x="0.08" y="0.08" width="60.16" height="60.16"/><rect class="cls-62" x="12.75" y="10.32" width="34.8" height="39.66"/><g class="cls-63"><text class="cls-64" transform="translate(13.92 26.16)">TH </text><text class="cls-65" transform="translate(13.92 26.16)">TH </text><text class="cls-64" transform="translate(12.93 49.77)">2.0</text><text class="cls-65" transform="translate(12.93 49.77)">2.0</text></g><text class="cls-66" transform="translate(0.08 73) scale(1.04 1)">TOWNHOUSE 2.0</text></g></g></svg>
                        <!-- <h5 class="h5 pt-2">TOWNHOUSE 2.0</h5> -->
                    </div>
                </div>
                <div class="row ">
                    <div class="col-xl-9 col-lg-10 mx-auto">
                        <div class="input-group">
                            <div class="input-group-prepend bg-white" style="cursor: pointer;" onclick="document.getElementById('user-location').focus();">
                                <span class="input-group-text rounded-0 bg-white">
                                    <img src="{{url('/img/SVG_Cowork/search-icon.svg')}}" alt="search-icon" class="search-icon">
                                </span>
                            </div>

                            <input type="hidden" id="street_number" name="street_number">
                            <input type="hidden" id="route" name="route">
                            <input type="hidden" id="locality" name="locality">
                            <input type="hidden" id="administrative_area_level_1" name="administrative_area_level_1">
                            <input type="hidden" id="country" name="country">
                            <input type="hidden" id="postal_code" name="postal_code">

                            <input type="text" class="form-control mb-0 rounded-0 border-left-0 border-right-0 r-lightItalic" value="@if(!empty(session('user-location'))){{ session('user-location') }} @endif" id="user-location" name="username">
                            <div class="input-group-append rounded-0 allow-to-track-location" title="Auto track my location" style="cursor: pointer;">
                                <span class="input-group-text rounded-0 bg-white">
                                    <img src="{{url('/img/SVG_Cowork/location-icon.svg')}}" alt="location-icon" class="location-icon">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                {!!Form::open(['route'=>'select-type'])!!}
                    <div class="row py-4 card-wrapper">
                        <div class="col-lg-9 col-md-10 mx-auto">
                            <div class="row">
                                <div class="col-xl-5 col-sm-6 mx-auto">
                                    <div class="custom-control custom-radio pl-0 text-center">
                                        <input type="radio" value="co-work-space" id="co-work-space" name="spaceType" class="custom-control-input" checked />
                                        <label class="custom-control-label w-100" for="co-work-space">
                                            <div class="card d-flex h-100 rounded-0">
                                                <div class="card-body align-self-center align-content-center text-center">
                                                    <div class="text-center img-grp px-4">
                                                        <img src="{{url('/front/home/img/co-work-banner.svg')}}" class="img-fluid" alt="" />
                                                    </div>
                                                    <h2 class="">CO-WORK</h2>
                                                    <p class="text-secondary r-lightItalic f-9">Find the best locations to share a workspace and connect near you.</p>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-sm-6 mx-auto mt-sm-0 mt-4" >
                                    <div class="custom-control custom-radio pl-0 text-center">
                                        <input type="radio" value="co-live-space" id="co-live-space" name="spaceType" class="custom-control-input" />
                                        <label class="custom-control-label w-100" for="co-live-space">
                                            <div class="card d-flex h-100 rounded-0">
                                                <div class="card-body align-self-center align-content-center text-center">
                                                    <div class="text-center img-grp px-4">
                                                        <img src="{{url('/front/home/img/co-live-banner.svg')}}" class="img-fluid " alt="" />
                                                    </div>
                                                    <h2 class="">CO-LIVE</h2>
                                                    <p class="text-secondary r-lightItalic f-9">Find the best locations to Share a living and connect near you</p>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-10 mx-auto">
                            <div class="row pt-4">
                                <div class="col-6">
                                    <button type="submit" name="search" value="search" class="btn-success w-100 rounded-0">SEARCH</button>
                                </div>
                                <div class="col-6">
                                    <button type="submit" name="list-my-space" value="list-my-space" class="btn-success w-100 rounded-0">LIST MY SPACE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                {!!Form::close()!!}
            </div>
        </section>
        <header class="home-banner">
            <div class="home-banner-bg"></div>
        </header>
        <section class="header-strip py-3" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-9 pb-3 pb-lg-0">
                        <h2 class="mt-3">LIVE NEAR WORK</h2>
                        <p><strong>Live and work</strong> with people having mutual goals and be a part of  a working community who share,<br class="d-lg-block d-none" /> learn and grow together.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="card-container pt-3 pb-2">
            <div class="container">
                <div class="row pt-xl-3">
                    <div class="col-sm-10 mx-auto col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{url('/img/grow-card.png')}}" class="img-fluid h-auto" alt="" />
                                </div>
                                <div class="d-block border text-center">
                                    <div>
                                        <h2>01</h2>
                                    </div>
                                    <div class="right-box">
                                        <h4>Grow Your Network </h4>
                                        <p>Build your network with people having mutual interests.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-10 mx-auto col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{url('/img/live-work.png')}}" class="img-fluid h-auto" alt="" />
                                </div>
                                <div class="d-block border text-center">
                                    <div>
                                        <h2>02</h2>
                                    </div>
                                    <div class="right-box">
                                        <h4>LIVE/ WORK</h4>
                                        <p>Live, work and choose a community of like minded people for a 2.0 Life.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-10 mx-auto col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{url('/img/reduce-card.png')}}" class="img-fluid h-auto" alt="" />
                                </div>
                                <div class="d-block border text-center">
                                    <div>
                                        <h2>03</h2>
                                    </div>
                                    <div class="right-box">
                                        <h4>REDUCE YOUR COMMUTE TIME</h4>
                                        <p>Work efficiently by working near home. Reduce your commute time to work better.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="header-strip py-3" id="th2.0">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-9 pb-lg-0 pb-3">
                        <h2 class="mt-3">2.0 OBJECTIVES</h2>
                        <p><strong>Townhouse 2.0 (TH 2.0)</strong> is an architectural model which aims at  revolutionising the <strong>Co-living</strong> and <strong>Co-Working</strong> culture in cities. <strong>TH2.0</strong>  aims at providing living solutions near working locations and vice-versa.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-town-container">
            <div class="wrapper">
                <div class="home-town" id="home-town">
                    <div>
                        <img src="{{url('img/town-house.png')}}" alt="" width="200" height="200" />
                    </div>
                    <div>
                        <img src="{{url('img/town-house.png')}}" alt="" width="200" height="200" />
                    </div>
                    <div>
                        <img src="{{url('img/town-house.png')}}" alt="" width="200" height="200" />
                    </div>
                    <div>
                        <img src="{{url('img/town-house.png')}}" alt="" width="200" height="200" />
                    </div>
                    <div>
                        <img src="{{url('img/town-house.png')}}" alt="" width="200" height="200" />
                    </div>
                    <div>
                        <img src="{{url('img/town-house.png')}}" alt="" width="200" height="200" />
                    </div>
                    <div>
                        <img src="{{url('img/town-house.png')}}" alt="" width="200" height="200" />
                    </div>
                    <div>
                        <img src="{{url('img/town-house.png')}}" alt="" width="200" height="200" />
                    </div>
                    <div>
                        <img src="{{url('img/town-house.png')}}" alt="" width="200" height="200" />
                    </div>
                    <div>
                        <img src="{{url('img/town-house.png')}}" alt="" width="200" height="200" />
                    </div>
                    <div>
                        <img src="{{url('img/town-house.png')}}" alt="" width="200" height="200" />
                    </div>
                    <div>
                        <img src="{{url('img/town-house.png')}}" alt="" width="200" height="200" />
                    </div>
                    <!-- <div>
                        <img src="{{url('/img/SVG_Cowork/slider-building-home.svg')}}" alt="" width="200" height="200" />
                    </div> -->
                </div>
            </div>
        </section>
        <section class="header-strip py-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-9 pb-lg-0 pb-3">
                        <h2 class="mt-3">TOWNHOUSE 2.0</h2>
                        <p><strong>Townhouse 2.0 (TH 2.0)</strong> is an architectural model which aims at  revolutionising the <strong>Co-living</strong> and <strong>Co-Working</strong> culture <br class="d-none d-lg-block" />in cities. <strong>TH2.0</strong>  aims at providing living solutions near working locations and vice-versa.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="card-container pt-4 pb-3">
            <div class="container">
                <div class="row pt-3">
                    <div class="col-sm-10 mx-auto col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{url('/img/SVG_Cowork/personal-details-card-home.svg')}}" class="img-fluid" alt="personal-details-card-home" />
                                </div>
                                <div class="d-block border text-center">
                                    <div>
                                        <h2>01</h2>
                                    </div>
                                    <div class="right-box w-100">
                                        <h4>PERSONAL DETAILS </h4>
                                        <p>Create your profile with all the personal details.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-10 mx-auto col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{url('/img/SVG_Cowork/personal-preferences-home.svg')}}" class="img-fluid" alt="personal-preferences-home" />
                                </div>
                                <div class="d-block border text-center">
                                    <div>
                                        <h2>02</h2>
                                    </div>
                                    <div class="right-box w-100"> 
                                        <h4>PERSONAL <br /> PREFERENCES</h4>
                                        <p>Interact with our algorithm to provide your personal preferences.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-10 mx-auto col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{url('/img/SVG_Cowork/experience-the_life_card_home.svg')}}" class="img-fluid mx-auto" alt="experience-the_life_card_home" />
                                </div>
                                <div class="d-block border text-center">
                                    <div>
                                        <h2>03</h2>
                                    </div>
                                    <div class="right-box w-100">
                                        <h4>EXPERIENCE THE <br /> 2.0 LIFE</h4>
                                        <p>Be a part of the community to explore, share and live a 2.0 life.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="header-strip py-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-8 pb-3 pb-lg-0">
                        <h2 class="mt-3">3 STEP FOR 2.0 LIFE</h2>
                        <p><strong>Experience the best with less.</strong> Provide your personal details, choose your <br class="d-none d-lg-block" /> spatial and location preferences and experience the <strong>2.0 Life.</strong></p>
                    </div>
                </div>
            </div>
        </section>
        <section class="map-bg" id="co-live">
            <div class="img-top">
                <img src="{{url('img/map12-arrow.svg')}}" class="img-fluid d-none d-md-block" alt="">
            </div>
            <div class="img-top-sm d-block d-md-none">
                <ul>
                    <li class="d-flex">
                        <div class="client-img">
                            <img src="{{url('img/co-living/vale.png')}}" class="" alt="">
                        </div>
                        <div class="info d-flex flex-column justify-content-between">
                            <div>
                                <h4>SHAJAY BHOOSHAN</h4>
                                <p><strong>Director (ZHA Code)</strong></p>
                            </div>
                            <div>
                                <h4>WORK PLACE</h4>
                                <p>Ripple Studio</p>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex">
                        <div class="client-img">
                            <img src="{{url('img/co-living/fei.png')}}" class="" alt="">
                        </div>
                        <div class="info d-flex flex-column justify-content-between">
                            <div>
                                <h4>FEI (29) ARCHITECT</h4>
                                <p><strong>(FAIRLY SOCIAL)</strong></p>
                            </div>
                            <div>
                                <h4>WORK PLACE</h4>
                                <p>Ripple Studio</p>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex">
                        <div class="client-img">
                            <img src="{{url('img/co-living/suji.png')}}" class="" alt="">
                        </div>
                        <div class="info d-flex flex-column justify-content-between">
                            <div>
                                <h4>SUJI (26) DESIGNER</h4>
                                <p><strong>(SOCIAL)</strong></p>
                            </div>
                            <div>
                                <h4>WORK PLACE</h4>
                                <p>Ripple Studio</p>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex">
                        <div class="client-img">
                            <img src="{{url('img/co-living/patric.png')}}" class="" alt="">
                        </div>
                        <div class="info d-flex flex-column justify-content-between">
                            <div>
                                <h4>PATRIC (35) ANGI (32)</h4>
                                <p><strong>ARCHITECT (PRIVATE)</strong></p>
                            </div>
                            <div>
                                <h4>WORK PLACE</h4>
                                <p>Ripple Studio</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <section class="header-strip py-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-8 pb-3 pb-lg-0">
                        <h2 class="mt-3">CO-LIVE <small class="h6">(CONNECTED BY INTERESTS)</small></h2>
                        <p><strong>Connect with people having mutual objectives and interests</strong> for a <br class="d-none d-lg-block" /> reformed live-work community. Share and learn from the  experiences of <br class="d-none d-lg-block" /> various professionals for a better social living. </p>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="right-padding d-flex align-items-center justify-content-end h-100">
                            <a href="{{route('list-colive-space')}}">
                                <h4 class="d-inline-block"><span>Start Co-Living</span></h4>
                                <img src="{{url('img/arrow1.png')}}" class="img-fluid" alt="">   
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="map-bg-1" id="co-worker">
            <div class="img-top">
                <img src="{{url('img/map1-arrow.svg')}}" class="img-fluid d-none d-md-block" alt="">
            </div>
            <div class="img-top-sm d-block d-md-none">
                <ul>
                    <li class="d-flex">
                        <div class="client-img">
                            <img src="{{url('img/co-living/knot.png')}}" class="" alt="">
                        </div>
                        <div class="info d-flex justify-content-between flex-column">
                            <div>
                                <h4 class="mb-0">KNOT (29) ARCHITECH</h4>
                                <p><strong>(SOCIAL)</strong></p>
                            </div>
                            <div class="interest">
                                <h4>INTERESTS</h4>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <img src="{{url('img/co-living/reading.png')}}" alt="">
                                    </div>
                                    <div>
                                        <img src="{{url('img/co-living/network.png')}}" alt="">
                                    </div>
                                    <div>
                                        <img src="{{url('img/co-living/reading.png')}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex">
                        <div class="client-img">
                            <img src="{{url('img/co-living/rohit.png')}}" class="" alt="">
                        </div>
                        <div class="info d-flex justify-content-between flex-column">
                            <div>
                                <h4 class="mb-0">ROHIT(26)</h4>
                                <p><strong>ENTREPRENEUR(SOCIAL)</strong></p>
                            </div>
                            <div class="interest">
                                <h4>INTERESTS</h4>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <img src="{{url('img/co-living/reading.png')}}" alt="">
                                    </div>
                                    <div>
                                        <img src="{{url('img/co-living/network.png')}}" alt="">
                                    </div>
                                    <div>
                                        <img src="{{url('img/co-living/travelling.png')}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex">
                        <div class="client-img">
                            <img src="{{url('img/co-living/cheryl.png')}}" class="" alt="">
                        </div>
                        <div class="info d-flex justify-content-between flex-column">
                            <div>
                                <h4 class="mb-0">CHERLYL (26) FASHION </h4>
                                <p><strong>MODEL (SOCIAL)</strong></p>
                            </div>
                            <div class="interest">
                                <h4>INTERESTS</h4>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <img src="{{url('img/co-living/lifestyle.png')}}" alt="">
                                    </div>
                                    <div>
                                        <img src="{{url('img/co-living/network.png')}}" alt="">
                                    </div>
                                    <div>
                                        <img src="{{url('img/co-living/shopping.png')}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex">
                        <div class="client-img">
                            <img src="{{url('img/co-living/ash.png')}}" class="" alt="">
                        </div>
                        <div class="info d-flex justify-content-between flex-column">
                            <div>
                                <h4 class="mb-0">ASH (19) PROFESSIONAL </h4>
                                <p><strong>PLAYER (SOCIAL)</strong></p>
                            </div>
                            <div class="interest">
                                <h4>INTERESTS</h4>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <img src="{{url('img/co-living/sport.png')}}" alt="">
                                    </div>
                                    <div>
                                        <img src="{{url('img/co-living/network.png')}}" alt="">
                                    </div>
                                    <div>
                                        <img src="{{ url('img/co-living/exercise.png')}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <section class="header-strip py-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-8 pb-lg-0 pb-3">
                        <h2 class="mt-3">CO-WORK <small class="h6">(CONNECTED BY WORK)</small></h2>
                        <p><strong>Work at a place close to you house</strong>, with the best people, who work <br class="d-none d-lg-block" /> and share mutual objectives. Work as per your preferences and grow in <br class="d-none d-lg-block" /> the community of people who share, work and think together.</p>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="right-padding d-flex align-items-center justify-content-end h-100">
                            <a href="{{route('co-work-space.index')}}">
                                <h4 class="d-inline-block"><span>Start Co-Working</span></h4>
                                <img  src="{{url('/img/arrow1.png')}}" class="img-fluid " alt="">   
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="pt-4 team">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 mt-4 mt-md-0 mb-3 pr-4 order-2 order-md-1">
                        <h2 class="mb-lg-4">TEAM TH 2.0</h2>
                        <p>We are a team of <strong>Researchers, Architects, Designers & Engineers</strong> learning and finding new ways to explore the future of housing. Our future aim with <strong>TH2.0</strong> would be to provide <strong>On Demand Housing.</strong></p>
                    </div>
                    <div class="col-sm-12 col-lg-8 left-box order-1 order-md-2">
                        <ul class="d-md-flex d-inline-block">
                            <li>
                                <h4>GENCI SULO</h4>
                                <p><strong>Attributes: </strong> Resourceful, <br />Organised, Responsible, Attentive, <br class="d-none d-xl-block" /> Disciplined, Punctual, Outspoken, <br class="d-none d-xl-block" /> Deligent</p>
                            </li>
                            <li>
                                <h4>RIPPLE</h4>
                                <p><strong>Attributes:</strong> Confident, Ambitious, <br class="d-none d-xl-block" /> Persistent, Critical Thinker, <br class="d-none d-xl-block" /> Competitive, Energetic, Problem <br /> Solver, Meticulous</p>
                            </li>
                            <li>
                                <h4>NEHA KALOKHE</h4>
                                <p><strong>Attributes:</strong> Independent, <br class="d-none d-xl-block" />  Inquisitive, Cheerful, Cooperative, <br class="d-none d-xl-block" /> Procedural, Motivator, <br class="d-none d-xl-block" /> Responsible, Devoted</p>
                            </li>
                        </ul>
                        <div class="team-wrapper">
                            
                            <img src="{{url('/img/SVG_Cowork/town-house-team.svg')}}" class="img-fluid mt-3 team-image" alt="town-house-team" />
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4 team-people order-12 order-md-3">
                        <div>
                            <ul>
                                <li class="d-flex">
                                    <div>
                                        <img src="{{url('/img/SVG_Cowork/shajay-bhooshan-profile-pic.svg')}}" class="img-fluid" alt="shajay-bhooshan-profile-pic">
                                    </div>
                                    <div class="info">
                                        <h4>SHAJAY BHOOSHAN</h4>
                                        <p><strong>Director (ZHA Code)</strong></p>
                                        <p>Zaha Hadid Architects </p>
                                        <p class="post"><strong>Adviser</strong></p>
                                    </div>
                                </li>
                                <li class="d-flex">
                                    <div>
                                        <img src="{{url('/img/SVG_Cowork/alicia-bhooshan-profile-pic.svg')}}" class="img-fluid girl-pic" alt="alicia-bhooshan-profile-pic">
                                    </div>
                                    <div class="info">
                                        <h4>ALICIA NAHMAD BHOOSHAN</h4>
                                        <p><strong>Tutor (AADRL)</strong></p>
                                        <p>Architectural Association  </p>
                                        <p class="post"><strong>Adviser</strong></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="header-strip py-3 mt-lg-0 mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-8">
                        <h2 class="mt-3">TH 2.0</h2>
                        <p>Copyright © 2020 <strong>R-Studio Labs.</strong> All rights reserved.Privacy Policy <br class="d-none d-lg-block" /> Terms of Use Sales and Refunds Legal Site Map</p>
                    </div>
                </div>
            </div>
        </footer>
        <script src="{{url('/front/home/js/main.js')}}" type="text/javascript" ></script>
        <script type="text/javascript" src="{{url('/front/home/js/scrolling-animation-packed.js')}}"></script>
        {{-- 
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjDLRNg0HB3jgYjZt3HDTqZ0KFEiobAYc&libraries=places&callback"></script> --}}

        {{-- <script
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjDLRNg0HB3jgYjZt3HDTqZ0KFEiobAYc&callback=initAutocomplete&libraries=places"
          defer
        ></script> --}}
        <script
          src="https://maps.googleapis.com/maps/api/js?key={{Config('constant.GMAP_API_KEY')}}&callback=initAutocomplete&libraries=places"
          defer
        ></script>
        @include('front.google-location-tracing-script')
        <script type="text/javascript">            
            $(function() {
                var $c = $('#home-town'),
                    $w = $(window);
                $c.carouFredSel({
                    align: false,
                    items: 10,
                    scroll: {
                        items: 1,
                        duration: 10000,
                        timeoutDuration: 0,
                        easing: 'linear',
                        pauseOnHover: 'immediate'
                    }
                });
                $w.bind('resize.example', function() {
                    var nw = $w.width();
                    if (nw < 990) {
                        nw = 990;
                    }
                    $c.width(nw * 3);
                    $c.parent().width(nw);
                }).trigger('resize.example');
            });
        </script>
    </body>
</html>