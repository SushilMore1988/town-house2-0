<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
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
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('css')
        <link rel="stylesheet" href="{{mix('front/css/app.css')}}">
        @livewireStyles
        {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"> --}}
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        
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
                                <a href="{{url('/')}}" class="nav-link text-muted n-bold f-9 @if(Session::get('active_page') == 'home') active @endif">HOME </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('about') }}" class="nav-link text-muted n-bold f-9 @if(Session::get('active_page') == 'about') active @endif">ABOUT</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('th2.0')}}" class="nav-link text-muted n-bold f-9 @if(Session::get('active_page') == 'th2.0') active @endif">TH 2.0</a>
                            </li>
                            <li class="nav-item">
                                {{-- <a href="javascript:void(0)" class="nav-link text-muted n-bold f-9 @if(Session::get('active_page') == 'co-live') active @endif ">CO-LIVE </a> --}}
                                <a href="{{route('co-live')}}" class="nav-link text-muted n-bold f-9 @if(Session::get('active_page') == 'co-live') active @endif ">CO-LIVE </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('co-work-space.index')}}" class="nav-link text-muted n-bold f-9 @if(Session::get('active_page') == 'co-work') active @endif" >CO-Work</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('develop')}}" class="nav-link text-muted n-bold f-9 @if(Session::get('active_page') == 'develop') active @endif">Develop</a>
                            </li>
                            @auth
                            @else
                                <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link text-muted n-bold f-9 @if(Session::get('active_page') == 'login') active @endif">Login</a>
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
        @yield('content')
        <script src="{{mix('front/js/app.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        @livewireScripts
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />
        {{-- <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script> 
        <x-livewire-alert::flash /> --}}
        
        {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
        <script type="text/javascript">toastr.options = {"closeButton":true,"closeClass":"toast-close-button","closeDuration":300,"closeEasing":"swing","closeHtml":"<button><i class=\"icon-off\"><\/i><\/button>","closeMethod":"fadeOut","closeOnHover":true,"containerId":"toast-container","debug":false,"escapeHtml":false,"extendedTimeOut":10000,"hideDuration":1000,"hideEasing":"linear","hideMethod":"fadeOut","iconClass":"toast-info","iconClasses":{"error":"toast-error","info":"toast-info","success":"toast-success","warning":"toast-warning"},"messageClass":"toast-message","newestOnTop":false,"onHidden":null,"onShown":null,"positionClass":"toast-top-right","preventDuplicates":true,"progressBar":true,"progressClass":"toast-progress","rtl":false,"showDuration":300,"showEasing":"swing","showMethod":"fadeIn","tapToDismiss":true,"target":"body","timeOut":5000,"titleClass":"toast-title","toastClass":"toast"};</script> --}}
        <script>
            window.livewire.on('alert', param => {
                if(param['type'] == 'Success'){
                    toastr.success(param['message'],param['type']);
                }
                if(param['type'] == 'Warning'){
                    toastr.warning(param['message'],param['type']);
                }
                if(param['type'] == 'Error'){
                    toastr.error(param['message'],param['type']);
                }
            });
        </script>
        @yield('js')
    </body>
</html>