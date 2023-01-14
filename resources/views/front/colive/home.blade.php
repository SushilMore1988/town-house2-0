@extends('front.layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('front/vendor/slick-slider/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('front/vendor/slick-slider/css/slick-theme.css')}}">
@endsection
@section('content')
    <section class="search-working top-space pt-lg-5 pt-4">
        <div class="container">
            <div class="col-lg-10 mx-auto">
                <div class="search-box ">
                    <div class="search-table">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend" style="cursor: pointer;" onclick="document.getElementById('user-location').focus();">
                                <span class="input-group-text rounded-0">
                                    <img src="{{url('/img/SVG_Cowork/search-icon.svg')}}" alt="search-icon" class="search-icon">
                                </span>
                            </div>
                            <input type="hidden" id="street_number" name="street_number">
                            <input type="hidden" id="route" name="route">
                            <input type="hidden" id="locality" name="locality">
                            <input type="hidden" id="administrative_area_level_1" name="administrative_area_level_1">
                            <input type="hidden" id="country" name="country">
                            <input type="hidden" id="postal_code" name="postal_code">

                            <input type="text" class="form-control r-lightItalic f-9 text-secondary rounded-0 border-left-0 border-right-0" placeholder="Change Location" id="user-location" name="username" value="@if(!empty(session('user-location'))){{ session('user-location') }} @endif">
                            <div class="input-group-append allow-to-track-location" title="Auto track my location" style="cursor: pointer;">
                                <span class="input-group-text rounded-0">
                                    <img src="{{url('/img/SVG_Cowork/location-icon.svg')}}" alt="" class="location-icon">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="search-img pt-md-5 pb-md-5 py-5 colive-banner-img">
                    <div class="item">
                        <img src="{{url('/img/co-living/home/colive-banner-1.svg')}}" alt="colive-banner-1" class="w-100">
                    </div>
                    <div class="item">
                        <img src="{{url('/img/co-living/home/colive-banner-2.svg')}}" alt="colive-banner-2" class="w-100">
                    </div>
                    <div class="item">
                        <img src="{{url('/img/co-living/home/colive-banner-3.svg')}}" alt="colive-banner-3" class="w-100">
                    </div>
                    <div class="item">
                        <img src="{{url('/img/co-living/home/colive-banner-4.svg')}}" alt="colive-banner-3" class="w-100">
                    </div>
                </div>
            </div>
        </div>  
    </section>
    <section class="header-strip py-sm-0 py-4">
        <div class="container h-100">
            <div class="d-md-flex align-items-center  justify-content-sm-between ">
                <div>
                    <h2 class="mt-3 n-bold h2 mb-0 text-dark f-28">CO-LIVE EFFICIENTLY</h2>
                    <p class="r-lightItalic p text-secondary f-12 text-justify">List and find the most suited Co-working location near you.Share and learn efficient way to<br> <strong class="r-boldItalic">Co-work.</strong> </p>
                </div>
                <div class="d-flex">
                    <h4 class=" mb-0 pr-3 r-boldItalic f-16"><span>Start Co-living</span></h4>
                    <img src="{{url('front/img/arrow1.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="card-container py-md-0 py-5">
        <div class="container d-flex h-100">
            <div class="row justify-content-center align-content-center align-items-center align-self-center">
                <div class=" mx-auto col-xl-9 col-lg-10">
                    <div class="row py-4">
                        <div class="col-lg-6 col-md-6 mx-auto" onclick="window.location.href='{{route('co-live-space.list',['viewType' => 'list'])}} '">
                            <div class="card d-flex h-100 border-0 rounded-0">
                                <div class="card-body align-self-center align-content-center">
                                    <div class="text-center img-grp">
                                        <img src="{{url('/img/SVG_Cowork/co-work-start-browsing.svg')}}" class="img-fluid py-5 browsing" alt="co-work-start-browsing" />
                                    </div>
                                    <div class="border text-center p-3">
                                        <!-- <div class="d-flex arrow"> -->
                                        <h2 class="n-bold f-24 text-dark pb-2">01</h2>
                                        <!-- <div class=" w-100"> -->
                                        <h4 class="n-bold f-14 text-dark pb-1">START <br/> BROWSING </h4>
                                        <!-- </div> -->
                                        <!-- </div> -->
                                        <p class="text-secondary r-lightItalic f-9 text-center">Browse and compare from the list of co-working spaces and get best recommendations for the place to co-work in the city.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mx-auto mt-md-0 mt-4" onclick="window.location.href='{{route('co-live-space.select-type')}} '">
                            <div class="card d-flex h-100 border-0 rounded-0">
                                <div class="card-body align-self-center align-content-center">
                                    <div class="text-center img-grp">
                                        <img src="{{url('/img/SVG_Cowork/start-listing-your-space.svg')}}" class="img-fluid " alt="start-listing-your-space" />
                                    </div>
                                    <div class="border text-center p-3">
                                        <!-- <div class="d-flex arrow"> -->
                                        <h2 class="n-bold f-24 text-dark pb-2">02</h2>
                                        <!-- <div class="w-100">  -->
                                        <h4 class="n-bold f-14 text-dark pb-1">START LISTING<br /> YOUR SPACE</h4>
                                        <!-- </div> -->
                                        <!-- </div> -->
                                        <p class="text-secondary r-lightItalic f-9 text-center">List your co-working space on our platform and let users, find and book a space at your co-working space with less efforts.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="header-strip py-sm-0 py-4">
        <div class="container h-100">
            <div class="d-md-flex align-items-center  justify-content-sm-between ">
                <div>
                    <h2 class="mt-3 n-bold h2 mb-0 text-dark f-28">TH2.0 RECOMMENDATIONS</h2>
                    <p class="r-lightItalic p text-secondary f-12 text-justify">The best venues and communities you could connect around the world and near your<br> workspace. TH2.0 Recommendations based on various attributes for a customised experience    </p>
                </div>
                <div class="d-flex">
                    <h4 class=" mb-0 pr-3 r-boldItalic f-16"><span>Browse Events</span></h4>
                    <img src="{{url('front/img/arrow1.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="card-listing-filter-wrapper pb-4 co-worker-card home-card py-5 bg-color">
        <div class="container">
            <div>
                <p class="r-lightItalic text-black f-9"><strong class="r-boldItalic">TH2.0</strong> Recommended venues for <strong class="r-boldItalic">Great Experiences </strong></p>
                <div class="row">
                    <div class="mb-3 col-md-4 col-sm-6 card-wrapper pr-sm-0">
                        <div class="card border-success border-0">
                            <div class="card-body">
                                <div class="text-center img-rank" onclick="window.location.replace('{{url('/explore/ripp-studio-private-limited-6')}}');">
                                    <img src="{{ url('/img/co-living/card-banner.png') }}" class="img-fluid card-image-top w-100" alt="card-banner">
                                </div>
                                <div class="right-box w-100">
                                    <div class="card-text">
                                        <div class="d-flex justify-content-between flex-column flex-lg-row">
                                            <div class="card-text-left-box d-flex flex-column w-100 ">
                                                <div class="mb-2">
                                                    <h4 class="n-bold text-dark text-uppercase">Ripp Studio Private Limited</h4>
                                                    <span class="r-boldItalic f-9 text-light" style="display: block">Private Co-Work Space</span>
                                                    <i class="r-lightItalic f-9">Daman, Daman and Diu, India</i>
                                                </div>
                                                <div class="card-prices mt-auto pr-3">
                                                    <h6 class="r-boldItalic f-9 text-light">Starting prices*</h6>
                                                    <p class="r-lightItalic f-9 text-light">Dedicated Desks <span> <strong class="n-bold f-9"> INR </strong>/Mo</span> </p>
                                                </div>
                                            </div>
                                            <div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-items-center"> 
                                                <div class="category-type img-comntainer pt-lg-4">
                                                    <div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver">
                                                        <p class="text-black n-bold f-24 text-center align-self-center mb-0">
                                                            3.0
                                                        </p>
                                                    </div>
                                                </div>
                                                <a class="btn btn-info n-bold f-6 text-muted rounded-0 mt-3" href="{{url('/explore/ripp-studio-private-limited-6')}}">EXPLORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6 card-wrapper pr-sm-0">
                        <div class="card border-orange border-0">
                            <div class="card-body">
                                <div class="text-center img-rank" onclick="window.location.replace('{{url('/explore/ripp-studio-private-limited-6')}}');">
                                    <img src="{{ url('/img/co-living/card-banner.png') }}" class="img-fluid card-image-top w-100" alt="card-banner">
                                </div>
                                <div class="right-box w-100">
                                    <div class="card-text">
                                        <div class="d-flex justify-content-between flex-column flex-lg-row">
                                            <div class="card-text-left-box d-flex flex-column w-100 ">
                                                <div class="mb-2">
                                                    <h4 class="n-bold text-dark text-uppercase">Ripp Studio Private Limited</h4>
                                                    <span class="r-boldItalic f-9 text-light" style="display: block">Private Co-Work Space</span>
                                                    <i class="r-lightItalic f-9">Daman, Daman and Diu, India</i>
                                                </div>
                                                <div class="card-prices mt-auto pr-3">
                                                    <h6 class="r-boldItalic f-9 text-light">Starting prices*</h6>
                                                    <p class="r-lightItalic f-9 text-light">Dedicated Desks <span> <strong class="n-bold f-9"> INR </strong>/Mo</span> </p>
                                                </div>
                                            </div>
                                            <div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-items-center"> 
                                                <div class="category-type img-comntainer pt-lg-4">
                                                    <div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver">
                                                        <p class="text-black n-bold f-24 text-center align-self-center mb-0">
                                                            3.0
                                                        </p>
                                                    </div>
                                                </div>
                                                <a class="btn btn-info n-bold f-6 text-muted rounded-0 mt-3" href="{{url('/explore/ripp-studio-private-limited-6')}}">EXPLORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6 card-wrapper pr-sm-0">
                        <div class="card border-success border-0">
                            <div class="card-body">
                                <div class="text-center img-rank" onclick="window.location.replace('{{url('/explore/ripp-studio-private-limited-6')}}');">
                                    <img src="{{ url('/img/co-living/card-banner.png') }}" class="img-fluid card-image-top w-100" alt="card-banner">
                                </div>
                                <div class="right-box w-100">
                                    <div class="card-text">
                                        <div class="d-flex justify-content-between flex-column flex-lg-row">
                                            <div class="card-text-left-box d-flex flex-column w-100 ">
                                                <div class="mb-2">
                                                    <h4 class="n-bold text-dark text-uppercase">Ripp Studio Private Limited</h4>
                                                    <span class="r-boldItalic f-9 text-light" style="display: block">Private Co-Work Space</span>
                                                    <i class="r-lightItalic f-9">Daman, Daman and Diu, India</i>
                                                </div>
                                                <div class="card-prices mt-auto pr-3">
                                                    <h6 class="r-boldItalic f-9 text-light">Starting prices*</h6>
                                                    <p class="r-lightItalic f-9 text-light">Dedicated Desks <span> <strong class="n-bold f-9"> INR </strong>/Mo</span> </p>
                                                </div>
                                            </div>
                                            <div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-items-center"> 
                                                <div class="category-type img-comntainer pt-lg-4">
                                                    <div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver">
                                                        <p class="text-black n-bold f-24 text-center align-self-center mb-0">
                                                            3.0
                                                        </p>
                                                    </div>
                                                </div>
                                                <a class="btn btn-info n-bold f-6 text-muted rounded-0 mt-3" href="{{url('/explore/ripp-studio-private-limited-6')}}">EXPLORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-3">
                <p class="r-lightItalic text-black f-9"><strong class="r-boldItalic">TH2.0  </strong>Recommended venues for <strong class="r-boldItalic">Happy Communities</strong></p>
                <div class="row">
                    <div class="mb-3 col-md-4 col-sm-6 card-wrapper pr-sm-0">
                        <div class="card border-success border-0">
                            <div class="card-body">
                                <div class="text-center img-rank" onclick="window.location.replace('{{url('/explore/ripp-studio-private-limited-6')}}');">
                                    <img src="{{ url('/img/co-living/card-banner.png') }}" class="img-fluid card-image-top w-100" alt="card-banner">
                                </div>
                                <div class="right-box w-100">
                                    <div class="card-text">
                                        <div class="d-flex justify-content-between flex-column flex-lg-row">
                                            <div class="card-text-left-box d-flex flex-column w-100 ">
                                                <div class="mb-2">
                                                    <h4 class="n-bold text-dark text-uppercase">Ripp Studio Private Limited</h4>
                                                    <span class="r-boldItalic f-9 text-light" style="display: block">Private Co-Work Space</span>
                                                    <i class="r-lightItalic f-9">Daman, Daman and Diu, India</i>
                                                </div>
                                                <div class="card-prices mt-auto pr-3">
                                                    <h6 class="r-boldItalic f-9 text-light">Starting prices*</h6>
                                                    <p class="r-lightItalic f-9 text-light">Dedicated Desks <span> <strong class="n-bold f-9"> INR </strong>/Mo</span> </p>
                                                </div>
                                            </div>
                                            <div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-items-center"> 
                                                <div class="category-type img-comntainer pt-lg-4">
                                                    <div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver">
                                                        <p class="text-black n-bold f-24 text-center align-self-center mb-0">
                                                            3.0
                                                        </p>
                                                    </div>
                                                </div>
                                                <a class="btn btn-info n-bold f-6 text-muted rounded-0 mt-3" href="{{url('/explore/ripp-studio-private-limited-6')}}">EXPLORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6 card-wrapper pr-sm-0">
                        <div class="card border-orange border-0">
                            <div class="card-body">
                                <div class="text-center img-rank" onclick="window.location.replace('{{url('/explore/ripp-studio-private-limited-6')}}');">
                                    <img src="{{ url('/img/co-living/card-banner.png') }}" class="img-fluid card-image-top w-100" alt="card-banner">
                                </div>
                                <div class="right-box w-100">
                                    <div class="card-text">
                                        <div class="d-flex justify-content-between flex-column flex-lg-row">
                                            <div class="card-text-left-box d-flex flex-column w-100 ">
                                                <div class="mb-2">
                                                    <h4 class="n-bold text-dark text-uppercase">Ripp Studio Private Limited</h4>
                                                    <span class="r-boldItalic f-9 text-light" style="display: block">Private Co-Work Space</span>
                                                    <i class="r-lightItalic f-9">Daman, Daman and Diu, India</i>
                                                </div>
                                                <div class="card-prices mt-auto pr-3">
                                                    <h6 class="r-boldItalic f-9 text-light">Starting prices*</h6>
                                                    <p class="r-lightItalic f-9 text-light">Dedicated Desks <span> <strong class="n-bold f-9"> INR </strong>/Mo</span> </p>
                                                </div>
                                            </div>
                                            <div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-items-center"> 
                                                <div class="category-type img-comntainer pt-lg-4">
                                                    <div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver">
                                                        <p class="text-black n-bold f-24 text-center align-self-center mb-0">
                                                            3.0
                                                        </p>
                                                    </div>
                                                </div>
                                                <a class="btn btn-info n-bold f-6 text-muted rounded-0 mt-3" href="{{url('/explore/ripp-studio-private-limited-6')}}">EXPLORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6 card-wrapper pr-sm-0">
                        <div class="card border-success border-0">
                            <div class="card-body">
                                <div class="text-center img-rank" onclick="window.location.replace('{{url('/explore/ripp-studio-private-limited-6')}}');">
                                    <img src="{{ url('/img/co-living/card-banner.png') }}" class="img-fluid card-image-top w-100" alt="card-banner">
                                </div>
                                <div class="right-box w-100">
                                    <div class="card-text">
                                        <div class="d-flex justify-content-between flex-column flex-lg-row">
                                            <div class="card-text-left-box d-flex flex-column w-100 ">
                                                <div class="mb-2">
                                                    <h4 class="n-bold text-dark text-uppercase">Ripp Studio Private Limited</h4>
                                                    <span class="r-boldItalic f-9 text-light" style="display: block">Private Co-Work Space</span>
                                                    <i class="r-lightItalic f-9">Daman, Daman and Diu, India</i>
                                                </div>
                                                <div class="card-prices mt-auto pr-3">
                                                    <h6 class="r-boldItalic f-9 text-light">Starting prices*</h6>
                                                    <p class="r-lightItalic f-9 text-light">Dedicated Desks <span> <strong class="n-bold f-9"> INR </strong>/Mo</span> </p>
                                                </div>
                                            </div>
                                            <div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-items-center"> 
                                                <div class="category-type img-comntainer pt-lg-4">
                                                    <div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver">
                                                        <p class="text-black n-bold f-24 text-center align-self-center mb-0">
                                                            3.0
                                                        </p>
                                                    </div>
                                                </div>
                                                <a class="btn btn-info n-bold f-6 text-muted rounded-0 mt-3" href="{{url('/explore/ripp-studio-private-limited-6')}}">EXPLORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-3">
                <p class="r-lightItalic text-black f-9"><strong class="r-boldItalic">TH2.0  </strong>Recommended venues for<strong class="r-boldItalic">Unique Designs / Interiors / Architecture </strong></p>
                <div class="row">
                    <div class="mb-3 col-md-4 col-sm-6 card-wrapper pr-sm-0">
                        <div class="card border-success border-0">
                            <div class="card-body">
                                <div class="text-center img-rank" onclick="window.location.replace('{{url('/explore/ripp-studio-private-limited-6')}}');">
                                    <img src="{{ url('/img/co-living/card-banner.png') }}" class="img-fluid card-image-top w-100" alt="card-banner">
                                </div>
                                <div class="right-box w-100">
                                    <div class="card-text">
                                        <div class="d-flex justify-content-between flex-column flex-lg-row">
                                            <div class="card-text-left-box d-flex flex-column w-100 ">
                                                <div class="mb-2">
                                                    <h4 class="n-bold text-dark text-uppercase">Ripp Studio Private Limited</h4>
                                                    <span class="r-boldItalic f-9 text-light" style="display: block">Private Co-Work Space</span>
                                                    <i class="r-lightItalic f-9">Daman, Daman and Diu, India</i>
                                                </div>
                                                <div class="card-prices mt-auto pr-3">
                                                    <h6 class="r-boldItalic f-9 text-light">Starting prices*</h6>
                                                    <p class="r-lightItalic f-9 text-light">Dedicated Desks <span> <strong class="n-bold f-9"> INR </strong>/Mo</span> </p>
                                                </div>
                                            </div>
                                            <div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-items-center"> 
                                                <div class="category-type img-comntainer pt-lg-4">
                                                    <div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver">
                                                        <p class="text-black n-bold f-24 text-center align-self-center mb-0">
                                                            3.0
                                                        </p>
                                                    </div>
                                                </div>
                                                <a class="btn btn-info n-bold f-6 text-muted rounded-0 mt-3" href="{{url('/explore/ripp-studio-private-limited-6')}}">EXPLORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6 card-wrapper pr-sm-0">
                        <div class="card border-orange border-0">
                            <div class="card-body">
                                <div class="text-center img-rank" onclick="window.location.replace('{{url('/explore/ripp-studio-private-limited-6')}}');">
                                    <img src="{{ url('/img/co-living/card-banner.png') }}" class="img-fluid card-image-top w-100" alt="card-banner">
                                </div>
                                <div class="right-box w-100">
                                    <div class="card-text">
                                        <div class="d-flex justify-content-between flex-column flex-lg-row">
                                            <div class="card-text-left-box d-flex flex-column w-100 ">
                                                <div class="mb-2">
                                                    <h4 class="n-bold text-dark text-uppercase">Ripp Studio Private Limited</h4>
                                                    <span class="r-boldItalic f-9 text-light" style="display: block">Private Co-Work Space</span>
                                                    <i class="r-lightItalic f-9">Daman, Daman and Diu, India</i>
                                                </div>
                                                <div class="card-prices mt-auto pr-3">
                                                    <h6 class="r-boldItalic f-9 text-light">Starting prices*</h6>
                                                    <p class="r-lightItalic f-9 text-light">Dedicated Desks <span> <strong class="n-bold f-9"> INR </strong>/Mo</span> </p>
                                                </div>
                                            </div>
                                            <div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-items-center"> 
                                                <div class="category-type img-comntainer pt-lg-4">
                                                    <div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver">
                                                        <p class="text-black n-bold f-24 text-center align-self-center mb-0">
                                                            3.0
                                                        </p>
                                                    </div>
                                                </div>
                                                <a class="btn btn-info n-bold f-6 text-muted rounded-0 mt-3" href="{{url('/explore/ripp-studio-private-limited-6')}}">EXPLORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6 card-wrapper pr-sm-0">
                        <div class="card border-success border-0">
                            <div class="card-body">
                                <div class="text-center img-rank" onclick="window.location.replace('{{url('/explore/ripp-studio-private-limited-6')}}');">
                                    <img src="{{ url('/img/co-living/card-banner.png') }}" class="img-fluid card-image-top w-100" alt="card-banner">
                                </div>
                                <div class="right-box w-100">
                                    <div class="card-text">
                                        <div class="d-flex justify-content-between flex-column flex-lg-row">
                                            <div class="card-text-left-box d-flex flex-column w-100 ">
                                                <div class="mb-2">
                                                    <h4 class="n-bold text-dark text-uppercase">Ripp Studio Private Limited</h4>
                                                    <span class="r-boldItalic f-9 text-light" style="display: block">Private Co-Work Space</span>
                                                    <i class="r-lightItalic f-9">Daman, Daman and Diu, India</i>
                                                </div>
                                                <div class="card-prices mt-auto pr-3">
                                                    <h6 class="r-boldItalic f-9 text-light">Starting prices*</h6>
                                                    <p class="r-lightItalic f-9 text-light">Dedicated Desks <span> <strong class="n-bold f-9"> INR </strong>/Mo</span> </p>
                                                </div>
                                            </div>
                                            <div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-items-center"> 
                                                <div class="category-type img-comntainer pt-lg-4">
                                                    <div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver">
                                                        <p class="text-black n-bold f-24 text-center align-self-center mb-0">
                                                            3.0
                                                        </p>
                                                    </div>
                                                </div>
                                                <a class="btn btn-info n-bold f-6 text-muted rounded-0 mt-3" href="{{url('/explore/ripp-studio-private-limited-6')}}">EXPLORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-3">
                <p class="r-lightItalic text-black f-9"><strong class="r-boldItalic">TH2.0  </strong>Recommended venues for<strong class="r-boldItalic">An Overall Co-Living Experience</strong></p>
                <div class="row">
                    <div class="mb-3 col-md-4 col-sm-6 card-wrapper pr-sm-0">
                        <div class="card border-success border-0">
                            <div class="card-body">
                                <div class="text-center img-rank" onclick="window.location.replace('{{url('/explore/ripp-studio-private-limited-6')}}');">
                                    <img src="{{ url('/img/co-living/card-banner.png') }}" class="img-fluid card-image-top w-100" alt="card-banner">
                                </div>
                                <div class="right-box w-100">
                                    <div class="card-text">
                                        <div class="d-flex justify-content-between flex-column flex-lg-row">
                                            <div class="card-text-left-box d-flex flex-column w-100 ">
                                                <div class="mb-2">
                                                    <h4 class="n-bold text-dark text-uppercase">Ripp Studio Private Limited</h4>
                                                    <span class="r-boldItalic f-9 text-light" style="display: block">Private Co-Work Space</span>
                                                    <i class="r-lightItalic f-9">Daman, Daman and Diu, India</i>
                                                </div>
                                                <div class="card-prices mt-auto pr-3">
                                                    <h6 class="r-boldItalic f-9 text-light">Starting prices*</h6>
                                                    <p class="r-lightItalic f-9 text-light">Dedicated Desks <span> <strong class="n-bold f-9"> INR </strong>/Mo</span> </p>
                                                </div>
                                            </div>
                                            <div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-items-center"> 
                                                <div class="category-type img-comntainer pt-lg-4">
                                                    <div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver">
                                                        <p class="text-black n-bold f-24 text-center align-self-center mb-0">
                                                            3.0
                                                        </p>
                                                    </div>
                                                </div>
                                                <a class="btn btn-info n-bold f-6 text-muted rounded-0 mt-3" href="{{url('/explore/ripp-studio-private-limited-6')}}">EXPLORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6 card-wrapper pr-sm-0">
                        <div class="card border-orange border-0">
                            <div class="card-body">
                                <div class="text-center img-rank" onclick="window.location.replace('{{url('/explore/ripp-studio-private-limited-6')}}');">
                                    <img src="{{ url('/img/co-living/card-banner.png') }}" class="img-fluid card-image-top w-100" alt="card-banner">
                                </div>
                                <div class="right-box w-100">
                                    <div class="card-text">
                                        <div class="d-flex justify-content-between flex-column flex-lg-row">
                                            <div class="card-text-left-box d-flex flex-column w-100 ">
                                                <div class="mb-2">
                                                    <h4 class="n-bold text-dark text-uppercase">Ripp Studio Private Limited</h4>
                                                    <span class="r-boldItalic f-9 text-light" style="display: block">Private Co-Work Space</span>
                                                    <i class="r-lightItalic f-9">Daman, Daman and Diu, India</i>
                                                </div>
                                                <div class="card-prices mt-auto pr-3">
                                                    <h6 class="r-boldItalic f-9 text-light">Starting prices*</h6>
                                                    <p class="r-lightItalic f-9 text-light">Dedicated Desks <span> <strong class="n-bold f-9"> INR </strong>/Mo</span> </p>
                                                </div>
                                            </div>
                                            <div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-items-center"> 
                                                <div class="category-type img-comntainer pt-lg-4">
                                                    <div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver">
                                                        <p class="text-black n-bold f-24 text-center align-self-center mb-0">
                                                            3.0
                                                        </p>
                                                    </div>
                                                </div>
                                                <a class="btn btn-info n-bold f-6 text-muted rounded-0 mt-3" href="{{url('/explore/ripp-studio-private-limited-6')}}">EXPLORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 col-md-4 col-sm-6 card-wrapper pr-sm-0">
                        <div class="card border-success border-0">
                            <div class="card-body">
                                <div class="text-center img-rank" onclick="window.location.replace('{{url('/explore/ripp-studio-private-limited-6')}}');">
                                    <img src="{{ url('/img/co-living/card-banner.png') }}" class="img-fluid card-image-top w-100" alt="card-banner">
                                </div>
                                <div class="right-box w-100">
                                    <div class="card-text">
                                        <div class="d-flex justify-content-between flex-column flex-lg-row">
                                            <div class="card-text-left-box d-flex flex-column w-100 ">
                                                <div class="mb-2">
                                                    <h4 class="n-bold text-dark text-uppercase">Ripp Studio Private Limited</h4>
                                                    <span class="r-boldItalic f-9 text-light" style="display: block">Private Co-Work Space</span>
                                                    <i class="r-lightItalic f-9">Daman, Daman and Diu, India</i>
                                                </div>
                                                <div class="card-prices mt-auto pr-3">
                                                    <h6 class="r-boldItalic f-9 text-light">Starting prices*</h6>
                                                    <p class="r-lightItalic f-9 text-light">Dedicated Desks <span> <strong class="n-bold f-9"> INR </strong>/Mo</span> </p>
                                                </div>
                                            </div>
                                            <div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-items-center"> 
                                                <div class="category-type img-comntainer pt-lg-4">
                                                    <div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver">
                                                        <p class="text-black n-bold f-24 text-center align-self-center mb-0">
                                                            3.0
                                                        </p>
                                                    </div>
                                                </div>
                                                <a class="btn btn-info n-bold f-6 text-muted rounded-0 mt-3" href="{{url('/explore/ripp-studio-private-limited-6')}}">EXPLORE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <section class="header-strip py-sm-0 py-4">
        <div class="container h-100">
            <div class="d-md-flex align-items-center  justify-content-sm-between ">
                <div>
                    <h2 class="mt-3 n-bold h2 mb-0 text-dark f-28">TH 2.0</h2>
                    <p class="r-lightItalic p text-secondary f-12 text-justify">Copyright © 2019 <br> <strong class="r-boldItalic">Townhouse 2.0 Technologies Pvt. Ltd.</strong> All rights reserved.Privacy Policy Terms of Use Sales and Refunds Legal <br class="d-none d-xl-block" /></p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript" src="{{url('front/vendor/slick-slider/js/slick.min.js')}}"></script>
    {{-- <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjDLRNg0HB3jgYjZt3HDTqZ0KFEiobAYc&callback=initAutocomplete&libraries=places"
      defer
    ></script> --}}
    <script
          src="https://maps.googleapis.com/maps/api/js?key={{Config('constant.GMAP_API_KEY')}}&callback=initAutocomplete&libraries=places"
          defer
        ></script>
    @include('front.google-location-tracing-script')
    <script >
        $(document).ready(function() {
            $('.colive-banner-img').slick({
                infinite: true,
                speed: 700,
                slideToShow: 1,
                slideToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                // nextArrow: '<div class="nextArrow"><img src="{{url('front/img/prev-arrow-slider.png')}}" alt=""></div>',
                // prevArrow: '<div class="prevArrow"><img src="{{url('front/img/prev-arrow-slider.png')}}" alt=""></div>'
            });
        });
    </script>
@endsection