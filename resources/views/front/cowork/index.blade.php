@extends('front.layouts.app')

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
                <div class="search-img pt-md-5 pb-md-5 py-5">
                    <div class="item">
                        <img src="{{url('/front/img/Asset 4.svg')}}" class="w-100">
                    </div>
                </div>
            </div>
        </div>  
    </section>
    <section class="header-strip py-sm-0 py-4">
        <div class="container h-100">
            <div class="d-md-flex align-items-center  justify-content-sm-between ">
                <div>
                    <h2 class="mt-3 n-bold h2 mb-0 text-dark f-28">CO-WORK EFFICIENTLY</h2>
                    <p class="r-lightItalic p text-secondary f-12 text-justify">List and find the most suited Co-working location near you.Share and learn efficient way to<br> <strong class="r-boldItalic">Co-work.</strong> </p>
                </div>
                <div class="d-flex">
                    <h4 class=" mb-0 pr-3 r-boldItalic f-16"><span>Start Co-Working</span></h4>
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
                        <div class="col-lg-6 col-md-6 mx-auto" onclick="window.location.href='{{route('co-work-space.list',['viewType' => 'list'])}} '">
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
                        <div class="col-lg-6 col-md-6 mx-auto mt-md-0 mt-4" onclick="window.location.href='{{route('co-work-space.select-type')}} '">
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
                    <h2 class="mt-3 n-bold h2 mb-0 text-dark f-28">NEW ON TH2.0</h2>
                    <p class="r-lightItalic p text-secondary f-12 text-justify">Browse the trending co-working spaced around your location and be a part of the growing <br> <strong class="r-boldItalic">Co-Working Community</strong> </p>
                </div>
                <div class="d-flex">
                    <h4 class=" mb-0 pr-3 r-boldItalic f-16"><span>Browse Co-working Spaces</span></h4>
                    <img src="{{url('front/img/arrow1.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
     <section class="card-listing-filter-wrapper pb-4 co-worker-card home-card py-5 bg-white">
        <div class="container">
            <div class="row">
                @foreach($coWorkSpaces as $cws)
                    <x-co-work-space.card :cws="$cws" class="mb-3 col-md-4 col-sm-6 card-wrapper pr-sm-0" />
                @endforeach
            </div>
        </div>
    </section>

    {{-- <section class="header-strip py-sm-0 py-4" style="border-bottom: 0px;">
        <div class="container h-100">
            <div class="d-md-flex align-items-center  justify-content-sm-between ">
                <div>
                    <h2 class="mt-3 n-bold h2 mb-0 text-dark f-28">CO-WORKING EVENTS</h2>
                    <p class="r-lightItalic p text-secondary f-12 text-justify">Browse the trending events around your location and be a part of the growing <br> <strong class="r-boldItalic">Co-Working Community</strong> </p>
                </div>
                <div class="d-flex">
                    <h4 class=" mb-0 pr-3 r-boldItalic f-16"><span>Browse Events</span></h4>
                    <img src="{{url('front/img/arrow1.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section> --}}
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
    <script
          src="https://maps.googleapis.com/maps/api/js?key={{Config('constant.GMAP_API_KEY')}}&callback=initAutocomplete&libraries=places"
          defer
        ></script>
    @include('front.google-location-tracing-script')
@endsection