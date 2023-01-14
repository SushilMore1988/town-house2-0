<div>
    <div class="row">
        <div class="col-md-4 col-xl-3 mb-4 px-lg-7" >
            <div class="sidebar d-md-block d-none" >
                <ul class="nav nav-tabs w-100 flex-column" id="myTab" role="tablist">
                    <li class="nav-item ">
                        <a class="nav-link n-bold f-9 @if($current_tab == 'about') active @endif clearfix about" data-toggle="tab" href="#about-space" role="tab" aria-controls="home" data-header="ABOUT YOUR SPACE" data-message="Let us know more about your space to get the best TH2.0 reviews and have an attractive page for providing information to the users.">
                            <p class="mb-0 float-left">ABOUT YOUR SPACE </p> 
                            @if(!empty($coWorkSpace->name) && !empty($coWorkSpace->email_verified) && !empty($coWorkSpace->contact_details['phone']))
                                <img src="{{url('/img/SVG_Cowork/list-space-complete.svg')}}" alt="list-space-complete" class="img-fluid list-space-sign float-right about-mark">
                            @else
                                <img src="{{url('/img/SVG_Cowork/list-space-incomplete.svg')}}" alt="list-space-complete" class="img-fluid list-space-sign float-right about-mark-error">
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link n-bold f-9 @if($current_tab == 'facilities') active @endif clearfix facilities" data-toggle="tab" href="#facilities" role="tab" aria-controls="profile" data-header="PROVIDED FACILITIES" data-message="Let us know more about your space to get the best TH2.0 reviews and have an attractive page for providing information to the users.">
                            <p class="mb-0 float-left">FACILITIES</p> 
                            @if(!empty($coWorkSpace->facilities) && count($coWorkSpace->facilities['facilities']) > 2)
                                <img src="{{url('/img/SVG_Cowork/list-space-complete.svg')}}" alt="list-space-complete" class="img-fluid list-space-sign float-right">
                            @else
                                <img src="{{url('/img/SVG_Cowork/list-space-incomplete.svg')}}" alt="list-space-complete" class="img-fluid list-space-sign float-right">
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link n-bold f-9 @if($current_tab == 'location') active @endif location" data-toggle="tab" href="#location" role="tab" aria-controls="messages" data-header="LOCATION" data-message="Where are you located in the city? Help users find your space.">LOCATION
                            @if(!empty($coWorkSpace->address) && !empty($coWorkSpace->address['address']) && !empty($coWorkSpace->address['latitude']) && !empty($coWorkSpace->address['longitude']))
                                <img src="{{url('/img/SVG_Cowork/list-space-complete.svg')}}" alt="list-space-complete" class="img-fluid list-space-sign float-right">
                            @else
                                <img src="{{url('/img/SVG_Cowork/list-space-incomplete.svg')}}" alt="list-space-complete" class="img-fluid list-space-sign float-right"> 
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link n-bold f-9 @if($current_tab == 'opening-hours') active @endif opening-hours" data-toggle="tab" href="#opening-hours" role="tab" aria-controls="settings" data-header="OPENING HOURS" data-message="What are your opening hours?">OPENING HOURS 
                            @if($coWorkSpace->opening_hours['timing']['monday']['checked'] == 'monday' || $coWorkSpace->opening_hours['timing']['tuesday']['checked'] == 'tuesday' || $coWorkSpace->opening_hours['timing']['wednesday']['checked'] == 'wednesday' || $coWorkSpace->opening_hours['timing']['thursday']['checked'] == 'thursday' || $coWorkSpace->opening_hours['timing']['friday']['checked'] == 'friday' || $coWorkSpace->opening_hours['timing']['saturday']['checked'] == 'saturday' || $coWorkSpace->opening_hours['timing']['sunday']['checked'] == 'sunday')
                                <img src="{{url('/img/SVG_Cowork/list-space-complete.svg')}}" alt="list-space-complete" class="img-fluid list-space-sign float-right hours-mark">
                            @else
                                <img src="{{url('/img/SVG_Cowork/list-space-incomplete.svg')}}" alt="list-space-complete" class="img-fluid list-space-sign float-right hours-mark-error">
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link n-bold f-9 @if($current_tab == 'size') active @endif size" data-toggle="tab" href="#size" role="tab" aria-controls="profile" data-header="SIZE AND SEATING TYPES" data-message="Let us know more about your space to get the best TH2.0 reviews and have an attractive page for providing information to the users.">SIZE 
                            @if(!empty($coWorkSpace->size['seating_capacity']) && !empty($coWorkSpace->size['size_in_sqft']) && (!empty($coWorkSpace->size['private_offices']['available']) || !empty($coWorkSpace->size['meeting_rooms']['available'])  || !empty($coWorkSpace->size['shared_desk']['available'])  || !empty($coWorkSpace->size['dedicated_desk']['available'])))
                                <img src="{{url('/img/SVG_Cowork/list-space-complete.svg')}}" alt="list-space-complete" class="img-fluid list-space-sign float-right">
                            @else
                                <img src="{{url('/img/SVG_Cowork/list-space-incomplete.svg')}}" alt="list-space-complete" class="img-fluid list-space-sign float-right">
                            @endif
                        </a>
                    </li>
                    <li class="nav-item pricing-li">
                        <a class="nav-link n-bold f-9 @if($current_tab == 'pricing') active @endif pricing" data-toggle="tab" href="#pricing" role="tab" aria-controls="messages" data-header="PRICES" data-message="Provide the market price of choosen Seating Type." wire:click="$emit('setCurrentTab', 'pricing')">PRICING
                            @if(!empty($coWorkSpace->size['private_offices']['types'][0]['pricing']['1 Day']) || !empty($coWorkSpace->size['meeting_rooms']['types'][0]['pricing']['1 Day'])  || !empty($coWorkSpace->size['shared_desk']['pricing']['1 Day'])  || !empty($coWorkSpace->size['dedicated_desk']['pricing']['1 Day']))
                                <img src="{{url('/img/SVG_Cowork/list-space-complete.svg')}}" alt="list-space-complete" class="img-fluid list-space-sign float-right ">
                            @else
                                <img src="{{url('/img/SVG_Cowork/list-space-incomplete.svg')}}" alt="list-space-complete" class="img-fluid list-space-sign float-right">
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link n-bold f-9 @if($current_tab == 'photo') active @endif photo" data-toggle="tab" href="#photo" role="tab" aria-controls="profile" data-header="UPLOAD PHOTOS OF YOUR SPACE" data-message="Let us know more about your space to get the best TH2.0 reviews and have an attractive page for providing information to the users.">PHOTOS 
                            @if(!empty($coWorkSpace->images['banner']))
                            <img src="{{url('/img/SVG_Cowork/list-space-complete.svg')}}" alt="list-space-complete" class="img-fluid list-space-sign float-right">
                            @else
                            <img src="{{url('/img/SVG_Cowork/list-space-incomplete.svg')}}" alt="list-space-complete" class="img-fluid list-space-sign float-right">
                            @endif
                        </a>
                    </li>
                    <li class="nav-item" onclick="setDefaultPackageSelected()">
                        <a class="nav-link n-bold left-package-tab f-9 @if($current_tab == 'package') active @endif subscription" data-toggle="tab" href="#package" role="tab" data-header="CHOOSE YOUR PACKAGE" data-message="Subscribe to the desired package and get the best web services to improve and enhance your co-working experience for users.">SUBSCRIPTION
                            @if(!empty($coWorkSpace->cwsPackage))
                            <img src="{{url('/img/SVG_Cowork/list-space-complete.svg')}}" alt="list-space-complete" class="img-fluid list-space-sign float-right">
                            @else
                            <img src="{{url('/img/SVG_Cowork/list-space-incomplete.svg')}}" alt="list-space-complete" class="img-fluid list-space-sign float-right">
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="tactab nav-link n-bold left-package-tab f-9 @if($current_tab == 'term-condition') active @endif terms-and-condition" data-toggle="tab" href="#term-condition" role="tab" data-header="TH2-0 TERMS & CONDITIONS" data-message="Please read the offered document and select your business model">T & C  
                            @if(!empty($coWorkSpace->cwsPackage))
                                <img src="{{url('/img/SVG_Cowork/list-space-complete.svg')}}" alt="list-space-complete" class="img-fluid list-space-sign float-right">
                            @else
                                <img src="{{url('/img/SVG_Cowork/list-space-incomplete.svg')}}" alt="list-space-complete" class="img-fluid list-space-sign float-right">
                            @endif
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
                            <a class="nav-link active n-bold f-9 @if($current_tab == 'about') active @endif" data-toggle="tab" href="#about-space" role="tab" aria-controls="home">ABOUT YOUR SPACE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link n-bold f-9 @if($current_tab == 'facilities') active @endif" data-toggle="tab" href="#facilities" role="tab" aria-controls="profile" wire:click="$set('current_tab', 'facilities')">FACILITIES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link n-bold f-9 @if($current_tab == 'location') active @endif" data-toggle="tab" href="#location" role="tab" aria-controls="messages">LOCATION</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link n-bold f-9 @if($current_tab == 'opening-hours') active @endif" data-toggle="tab" href="#opening-hours" role="tab" aria-controls="settings">OPENING HOURS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link n-bold f-9 @if($current_tab == 'size') active @endif" data-toggle="tab" href="#size" role="tab" aria-controls="home">SIZE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link n-bold f-9 @if($current_tab == 'photo') active @endif "data-toggle="tab" href="#photo" role="tab" aria-controls="profile">PHOTOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link n-bold f-9 @if($current_tab == 'pricing') active @endif" data-toggle="tab" href="#pricing" role="tab" aria-controls="messages">PRICING</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link marketing n-bold f-9 @if($current_tab == 'marketing') active @endif" data-toggle="tab" href="#marketing" role="tab" aria-controls="settings">MARKETING</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link left-package-tab n-bold f-9 @if($current_tab == 'package') active @endif" data-toggle="tab" href="#package" role="tab">PACKAGE</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-xl-9 px-lg-5" style="border: 1px solid rgba(1, 2, 1, 0.08) !important;">
            <a href="javascript:void(0)" id="openTab" class="d-md-none d-block clearfix pb-3">
                <div class="menu-icon float-right">
                    <div class="menu-bar bg-dark"></div>
                    <div class="menu-bar bg-dark"></div>
                    <div class="menu-bar bg-dark"></div>
                </div>
            </a>
            <div class="tab-content mb-2 pt-4">
                <div class="tab-pane  @if($current_tab == 'about') active @endif " id="about-space" role="tabpanel">
                    @livewire('co-work.edit.about', ['cws' => $coWorkSpace], key('about-'.$coWorkSpace->id))
                </div>
                <div class="tab-pane pt-3 border-tabs @if($current_tab == 'facilities') active @endif" id="facilities" role="tabpanel">
                    @livewire('co-work.edit.facilities', ['cws' => $coWorkSpace], key('facilities-'.$coWorkSpace->id))
                </div>
                <div class="tab-pane pt-3 border-tabs @if($current_tab == 'location') active @endif" id="location" role="tabpanel">
                    @livewire('co-work.edit.location', ['cws' => $coWorkSpace], key('location-'.$coWorkSpace->id))
                </div>
                <div class="tab-pane pt-3 border-tabs @if($current_tab == 'opening-hours') active @endif" id="opening-hours" role="tabpanel">
                    @livewire('co-work.edit.opening-hours', ['cws' => $coWorkSpace], key('opening-hours-'.$coWorkSpace->id))
                </div>
                <div class="tab-pane pt-3 border-tabs @if($current_tab == 'size') active @endif" id="size" role="tabpanel">
                    @livewire('co-work.edit.size', ['cws' => $coWorkSpace], key('size-'.$coWorkSpace->id))
                </div>
                <div class="tab-pane pt-3 border-tabs @if($current_tab == 'pricing') active @endif" id="pricing" role="tabpanel">
                    @if($current_tab == 'pricing')
                        @livewire('co-work.edit.pricing', ['cws' => $coWorkSpace], key('pricing-'.$coWorkSpace->id))
                    @endif
                </div>
                @include('front.cowork.create-listing.forms.photo')
                @include('front.cowork.create-listing.forms.marketing')
                @include('front.cowork.create-listing.forms.package')
                @include('front.cowork.create-listing.forms.term-condition')
    
            </div>
        </div>
    </div>
</div>
