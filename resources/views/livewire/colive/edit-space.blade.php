<div>
    <div class="row">
        <div class="col-md-4 col-xl-3 mb-4 px-lg-7" >
            <div class="sidebar d-md-block d-none" >
                <ul class="nav nav-tabs w-100 flex-column" id="myTab" role="tablist">
                    <li class="nav-item ">
                        <a wire:click="setActiveSection('about')" class="nav-link n-bold f-9 clearfix about {{$activeSection == 'about' ? 'active' : ''}}" data-toggle="tab" href="#about-space" role="tab" aria-controls="home" data-header="ABOUT YOUR SPACE" data-message="Let us know more about your space to get the best TH2.0 reviews and have an attractive page for providing information to the users.">
                            <p class="mb-0 float-left">ABOUT YOUR SPACE </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a wire:click="setActiveSection('amenities')" class="nav-link n-bold f-9 clearfix about {{$activeSection == 'amenities' ? 'active' : ''}}" data-toggle="tab" href="#amenities-space" role="tab" aria-controls="home" data-header="ABOUT YOUR SPACE" data-message="Let us know more about your space to get the best TH2.0 reviews and have an attractive page for providing information to the users.">
                            <p class="mb-0 float-left">AMENITIES</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a wire:click="setActiveSection('accomodation')" class="nav-link n-bold f-9 clearfix about {{$activeSection == 'accomodation' ? 'active' : ''}}" data-toggle="tab" href="#acomodation-space" role="tab" aria-controls="home" data-header="ABOUT YOUR SPACE" data-message="Let us know more about your space to get the best TH2.0 reviews and have an attractive page for providing information to the users.">
                            <p class="mb-0 float-left">ACCOMODATION</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a wire:click="setActiveSection('location')" class="nav-link n-bold f-9 location {{$activeSection == 'location' ? 'active' : ''}}" data-toggle="tab" href="#location" role="tab" aria-controls="messages" data-header="LOCATION" data-message="Where are you located in the city? Help users find your space.">
                            LOCATION
                        </a>
                    </li>
                    <li class="nav-item">
                        <a wire:click="setActiveSection('opening-hours')" class="nav-link n-bold f-9 opening-hours {{$activeSection == 'opening-hours' ? 'active' : ''}}" data-toggle="tab" href="#opening-hours" role="tab" aria-controls="settings" data-header="OPENING HOURS" data-message="What are your opening hours?">
                            CHECK IN - CHECK OUT
                        </a>
                    </li>
                    <li class="nav-item">
                        <a wire:click="setActiveSection('conditions')" class="nav-link n-bold f-9 opening-hours {{$activeSection == 'conditions' ? 'active' : ''}}" data-toggle="tab" href="#condition-space" role="tab" aria-controls="settings" data-header="OPENING HOURS" data-message="What are your opening hours?">
                            CONDITIONS
                        </a>
                    </li>
                    <li class="nav-item">
                        <a wire:click="setActiveSection('photos')" class="nav-link n-bold f-9 photo {{$activeSection == 'photos' ? 'active' : ''}}" data-toggle="tab" href="#photo" role="tab" aria-controls="profile" data-header="UPLOAD PHOTOS OF YOUR SPACE" data-message="Let us know more about your space to get the best TH2.0 reviews and have an attractive page for providing information to the users.">
                            PHOTOS
                        </a>
                    </li>
                    <li class="nav-item">
                        <a wire:click="setActiveSection('pricing')" title="Please fill size details" class="nav-link n-bold f-9 pricing {{$activeSection == 'pricing' ? 'active' : ''}}" data-toggle="tab" href="#pricing" role="tab" aria-controls="messages" data-header="MEMBERSHIP PRICES" data-message="Provide the market price of choosen Seating Type.">
                            PRICING 
                        </a>
                    </li>
                    <li class="nav-item">
                        <a wire:click="setActiveSection('payment')" title="Please fill size details" class="nav-link n-bold f-9 pricing {{$activeSection == 'payment' ? 'active' : ''}}" data-toggle="tab" href="#payment-space" role="tab" aria-controls="messages" data-header="MEMBERSHIP PRICES" data-message="Provide the market price of choosen Seating Type.">
                            PAYMENT
                        </a>
                    </li>
                    <li class="nav-item">
                        <a wire:click="setActiveSection('marketing')" class="nav-link n-bold marketing f-9 marketing {{$activeSection == 'marketing' ? 'active' : ''}}" data-toggle="tab" href="#marketing" role="tab" aria-controls="settings" data-header="MARKETING" data-message="Let us know more about your space to get the best TH2.0 reviews and have an attractive page for providing information to the users.">
                            MARKETING
                        </a>
                    </li> 
                    <li class="nav-item" onclick="setDefaultPackageSelected()">
                        <a wire:click="setActiveSection('subscription')" class="nav-link n-bold left-package-tab f-9 subscription {{$activeSection == 'subscription' ? 'active' : ''}}" data-toggle="tab" href="#package" role="tab" data-header="CHOOSE YOUR PACKAGE" data-message="Subscribe to the desired package and get the best web services to improve and enhance your co-working experience for users.">
                            SUBSCRIPTION{{-- PACKAGE --}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a wire:click="setActiveSection('terms')" class="tactab nav-link n-bold left-package-tab f-9 terms-and-condition {{$activeSection == 'terms' ? 'active' : ''}}" data-toggle="tab" href="#term-condition" role="tab" data-header="TH2-0 TERMS & CONDITIONS" data-message="Please read the offered document and select your business model">
                            T & C
                        </a>
                    </li>
                </ul>
            </div>
            <div class="mobile-menu-list-space d-md-none d-flex align-items-center ml-auto" id="mobileTab">
                <div class="list-space-mobile-menu bg-white h-100 w-100" id="sideNav-list-space" >
                    <a href="javascript:void(0)" class="closebtn" id="closeTab">
                        <i class="far fa-times-circle"></i>
                    </a>
                    <ul class="nav nav-tabs w-100 flex-column border-0 pt-5 " id="myTab" role="tablist">
                        <li class="nav-item ">
                            <a wire:click="setActiveSection('about')" class="nav-link n-bold f-9 {{$activeSection == 'about' ? 'active' : ''}}" data-toggle="tab" href="#about-space" role="tab" aria-controls="home">ABOUT YOUR SPACE</a>
                        </li>
                        <li class="nav-item">
                            <a wire:click="setActiveSection('amenities')" class="nav-link n-bold f-9 {{$activeSection == 'amenities' ? 'active' : ''}} " data-toggle="tab" href="#amenities-space" role="tab" aria-controls="profile">AMENITIES</a>
                        </li>
                        <li class="nav-item">
                            <a wire:click="setActiveSection('accomodation')" class="nav-link n-bold f-9 {{$activeSection == 'accomodation' ? 'active' : ''}} " data-toggle="tab" href="#acomodation-space" role="tab" aria-controls="messages">ACCOMODATION</a>
                        </li>
                        <li class="nav-item">
                            <a wire:click="setActiveSection('location')" class="nav-link n-bold f-9 {{$activeSection == 'location' ? 'active' : ''}} " data-toggle="tab" href="#location" role="tab" aria-controls="messages">LOCATION</a>
                        </li>
                        <li class="nav-item">
                            <a wire:click="setActiveSection('opening-hours')" class="nav-link n-bold f-9 {{$activeSection == 'opening-hours' ? 'active' : ''}}" data-toggle="tab" href="#opening-hours" role="tab" aria-controls="settings">CHECK IN - CHECK OUT</a>
                        </li>
                        <li class="nav-item">
                            <a wire:click="setActiveSection('conditions')" class="nav-link n-bold f-9 {{$activeSection == 'conditions' ? 'active' : ''}} " data-toggle="tab" href="#condition-space" role="tab" aria-controls="home">CONDITIONS</a>
                        </li>
                        <li class="nav-item">
                            <a wire:click="setActiveSection('photos')" class="nav-link n-bold f-9 {{$activeSection == 'photos' ? 'active' : ''}} "data-toggle="tab" href="#photo" role="tab" aria-controls="profile">PHOTOS</a>
                        </li>
                        <li class="nav-item">
                            <a wire:click="setActiveSection('pricing')" class="nav-link n-bold f-9 {{$activeSection == 'pricing' ? 'active' : ''}} " data-toggle="tab" href="#pricing" role="tab" aria-controls="messages">PRICING</a>
                        </li>
                        <li class="nav-item">
                            <a wire:click="setActiveSection('payment')" class="nav-link marketing n-bold f-9 {{$activeSection == 'payment' ? 'active' : ''}}" data-toggle="tab" href="#payment-space" role="tab" aria-controls="settings">PAYMENT</a>
                        </li>
                        <li class="nav-item">
                            <a wire:click="setActiveSection('marketing')" class="nav-link left-package-tab n-bold f-9 {{$activeSection == 'marketing' ? 'active' : ''}} " data-toggle="tab" href="#marketing" role="tab">MARKETING</a>
                        </li>
                        <li class="nav-item">
                            <a wire:click="setActiveSection('subscription')" class="nav-link left-package-tab n-bold f-9 {{$activeSection == 'subscription' ? 'active' : ''}} " data-toggle="tab" href="#package" role="tab">SUBSCRIPTION</a>
                        </li>
                        <li class="nav-item">
                            <a wire:click="setActiveSection('terms')" class="nav-link left-package-tab n-bold f-9 {{$activeSection == 'terms' ? 'active' : ''}} " data-toggle="tab" href="#term-condition" role="tab">T & C</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-xl-9 px-lg-5 mb-2" style="border: 1px solid rgba(1, 2, 1, 0.08) !important;">
            <a href="javascript:void(0)" id="openTab" class="d-md-none d-block clearfix pb-3">
                <div class="menu-icon float-right">
                    <div class="menu-bar bg-dark"></div>
                    <div class="menu-bar bg-dark"></div>
                    <div class="menu-bar bg-dark"></div>
                </div>
            </a>
            <div class="tab-content mb-2  pt-4">
                <div class="tab-pane px-3 {{$activeSection == 'about' ? 'active' : ''}}" id="about-space" role="tabpanel">
                    @livewire('colive.about-your-space', ['cls_id' => $cls->id])
                </div>
                <div class="tab-pane px-3 {{$activeSection == 'amenities' ? 'active' : ''}}" id="amenities-space" role="tabpanel">
                    @livewire('colive.amenities', ['cls' => $cls])
                </div>
                <div class="tab-pane px-3 {{$activeSection == 'accomodation' ? 'active' : ''}}" id="accomodation-space" role="tabpanel">
                    @livewire('colive.accomodation', ['cls' => $cls])
                </div>
                <div class="tab-pane px-3 {{$activeSection == 'location' ? 'active' : ''}}" id="location-space" role="tabpanel">
                    @livewire('colive.location', ['cls' => $cls])
                </div>
                <div class="tab-pane px-3 {{$activeSection == 'opening-hours' ? 'active' : ''}}" id="opening-hours-space" role="tabpanel">
                    @livewire('colive.opening-hours', ['cls' => $cls])
                </div>
                <div class="tab-pane px-3 {{$activeSection == 'conditions' ? 'active' : ''}}" id="conditions-space" role="tabpanel">
                    @livewire('colive.conditions', ['cls' => $cls])
                </div>
                <div class="tab-pane px-3 {{$activeSection == 'photos' ? 'active' : ''}}" id="photos-space" role="tabpanel">
                    @livewire('colive.photos', ['cls' => $cls])
                </div>
                <div class="tab-pane px-3 {{$activeSection == 'pricing' ? 'active' : ''}}" id="pricing-space" role="tabpanel">
                    @livewire('colive.pricing', ['cls' => $cls])
                </div>
                <div class="tab-pane px-3 {{$activeSection == 'payment' ? 'active' : ''}}" id="payment-space" role="tabpanel">
                    @livewire('colive.payment', ['cls' => $cls])
                </div>
                <div class="tab-pane px-3 {{$activeSection == 'marketing' ? 'active' : ''}}" id="marketing-space" role="tabpanel">
                    @livewire('colive.marketing', ['cls' => $cls])
                </div>
                <div class="tab-pane px-3 {{$activeSection == 'subscription' ? 'active' : ''}}" id="subscription-space" role="tabpanel">
                    @livewire('colive.subscription', ['cls' => $cls])
                </div>
                <div class="tab-pane px-3 {{$activeSection == 'terms' ? 'active' : ''}}" id="terms-space" role="tabpanel">
                    @livewire('colive.terms', ['cls' => $cls])
                </div>


                {{-- @include('front.colive.create-listing.forms.location')
                @include('front.colive.create-listing.forms.opening-hours')
                
                @include('front.colive.create-listing.forms.conditions')
                @include('front.colive.create-listing.forms.photo')
                @include('front.colive.create-listing.forms.pricing')
                @include('front.colive.create-listing.forms.payment')
                @include('front.colive.create-listing.forms.marketing')
                @include('front.colive.create-listing.forms.package')
                @include('front.colive.create-listing.forms.term-condition') --}}
            </div>
        </div>
    </div>
</div>
