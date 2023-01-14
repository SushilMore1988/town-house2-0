<div>
    @php
    $coWorkSpace = $cws;
    if(strtolower(trim($cws->country->name)) == 'india'){
        $currency = "INR";
    }else{
        $currency = "USD";
    }
    @endphp
    <section class="top-space order-review pt-3">
        <div class="container">
            <div class="row pb-4">
                <div class="col-sm-12 col-md-8 pt-md-0 pt-4">
                    <h4 class="r-boldItalic f-14  check-label">Review Your Order</h4>
                    <div class="banner-img-container bg-white" style="min-height: calc(100vh - 70px)">
                        @if(!empty($coWorkSpace->images['cover']))
                            <img src="{{ url('/img/cowork/cover/'.$coWorkSpace->images['cover']) }}" class="img-fluid w-100" alt="" />
                        @endif
                        <div class="text-header-container py-3 bg-white">
                            <div class="text-header d-flex justify-content-between align-items-center mb-2 px-3">
                                <div class="align-self-center">
                                    <h2 class="n-bold f-24 text-muted mb-1 text-uppercase">{{$coWorkSpace->name}}</h2>
                                    <p class="r-lightItalic f-9 text-light">@if(!empty($coWorkSpace->address)){{$coWorkSpace->address['address']}}@endif</p>
                                </div>
                                <div class="category-type mt-0 align-self-center">
                                    {{-- <img src="./img/add-filter-list/gold.png" class="img-fluid" alt="" /> --}}
                                    @if($coWorkSpace->color_category == 'bronze') 
                                        <div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-brown border-brown">
                                            <p class="text-black n-bold f-24 text-center align-self-center mb-0">
                                                {{ number_format((float)$coWorkSpace->admin_rating, 1, '.', '')}}
                                            </p>
                                        </div>
                                    @elseif($coWorkSpace->color_category == 'silver')
                                        <div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-silver border-silver">
                                            <p class="text-black n-bold f-24 text-center align-self-center mb-0">
                                                {{ number_format((float)$coWorkSpace->admin_rating, 1, '.', '')}}
                                            </p>
                                        </div>
                                    @elseif($coWorkSpace->color_category == 'gold')
                                        <div class="ratings list-view-rating align-self-center d-flex justify-content-center bg-gold border-gold">
                                            <p class="text-black n-bold f-24 text-center align-self-center mb-0">
                                                {{ number_format((float)$coWorkSpace->admin_rating, 1, '.', '')}}
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="description">
                                <div class="formAccordian-first-cls" id="formAccordian-second">
                                    <div class="card px-0 border-0 shadow-none pt-0 " id="connect-Mature">
                                        <div class="card-header green-btn p-0 border-bottom ">
                                            <a class="bg-color   mr-2 w-100  r-boldItalic f-9 text-left text-dark border main-anch collapsed px-md-4 px-2 d-flex align-self-center position-relative py-3 booking-tab-pane border-0 text-uppecase" data-toggle='collapse' href='#connect'>
                                                <div class="row w-100">
                                                    <div class="col-12 pr-0">
                                                        <h3 class="r-boldItalic f-14 head-description align-self-center rounded-0 mb-0">Terms and Conditions</h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        
                                        <div class="show" id="connect" data-parent='#formAccordian-second'>
                                            <div class="card-body">
                                                @if(isset($coWorkSpace->address['address']))
                                                    {!! str_replace('[SUBSCRIPTION_FEES]', '<span id="subscription_fees"></span>', str_replace('[SERVICE_CHARGE_PERCENTAGE]', $priceSetting->price, str_replace('[ADDR]', $coWorkSpace->address['address'], str_replace('[PHONE]', $coWorkSpace->user->phone, str_replace('[EMAIL]', $coWorkSpace->user->email, str_replace('[NAME]', $coWorkSpace->user->fname.' '.$coWorkSpace->user->lname, str_replace('[TERMS_CONDITION_LINK]', 'https://th2-0.com/terms-and-conditions', str_replace('[PRIVACY_POLICY_LINK]', 'https://th2-0.com/privacy-policy', $terms->content)))))))) !!}
                                                @endif
                                            </div>
                                        </div>										
                                    </div>
                                    
                                </div>
                            </div>	
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 pl-lg-3 pl-md-0 pt-md-0 pt-4">
                        <div class="order-detail">
                            <p class="r-lightItalic f-14  check-label mb-1" >Order Details</p>
                        </div>
                    <!-- <div class="h-100"> -->
                        <div class="detail-container bg-white">
                        {{-- <div class="detail-container bg-white" style="height: calc(100vh - 70px)"> --}}
                            <div class="px-lg-3 px-2 pt-lg-3 pt-3">
                                <h6 class="mb-2 r-boldItalic f-9 text-light"><strong>Duration</strong></h6>
                                {{-- <p class="r-lightItalic f-9 text-light">26.04.2019 <span class="px-2">|</span> 26.05.2019</p> --}}
                                <div class="d-flex mb-lg-3 mb-4 justify-content-between ">
                                    <div class="start-date border p-2 w-50 mr-2">
                                        <h6 class="r-boldItalic f-9 text-light">Starting Date: </h6>
                                        <h5 class="n-bold f-24 text-dark mb-0">{{date('d')}}</h5>
                                        <p class="r-lightItalic f-9 text-light mb-0">{{date('F Y')}}</p>
                                    </div>
                                    <div class="end-date border p-2 w-50 ml-2">
                                        <h6 class="r-boldItalic f-9 text-light">Ending Date: </h6>

                                        <h5 class="n-bold f-24 text-dark mb-0">{{date('d',strtotime('+1 year'))}}</h5>
                                        <p class="r-lightItalic f-9 text-light mb-0">{{date('F Y',strtotime('+1 year'))}}</p>
                                    </div>
                                </div>
                                {{-- <h6 class="mb-2 r-boldItalic f-9 text-light"><strong>Applied Discounts</strong></h6>
                                <div class="input-group mb-lg-5 mb-3 w-100">
                                    <input type="text" class="form-control border-right-0" placeholder="Discounts Code" />
                                    <div class="input-group-prepend bg-white">
                                        <button class="input-group-text btn bg-white border-left-0 r-lightItalic f-9 text-success">Apply</button>
                                    </div>
                                </div> --}}
                            </div>
                            
                            <div class="formAccordian-first-cls" id="formAccordian-first">
                                <div class="card px-0 border-0 shadow-none pt-0 " id="shared-desk">
                                    <div class="card-header green-btn p-0 border-bottom ">
                                        <a class="bg-color   mr-2 w-100  r-boldItalic f-9 text-left text-dark border main-anch collapsed px-md-4 px-2 d-flex align-self-center position-relative py-3 booking-tab-pane border-0 text-uppecase" data-toggle='collapse' href='#shared'>
                                            
                                            <div class="row w-100">
                                                <div class="col-12 pr-0">
                                                    <span class="align-self-center f-9 rounded-0 r-boldItalic f-9">Choosen Seats/ Packages</span>
                                                </div>
                                                
                                            </div>
                                            <!-- <span class="align-self-center text-uppercase f-9 rounded-0">Shared Desks <i class="fas fa-info-circle pl-2"></i></span> -->
                                        </a>
                                    </div>
                                    <span class="shared_error "></span>
                                    <div class="py-3  show" id="shared" data-parent='#formAccordian-first'>
                                        <div class="card-body">
                                            <ul class="pl-1">
                                                <li>
                                                    {{-- @if($cwsBooking->sharedDeskBooking) --}}
                                                    <div class="d-flex justify-content-between flex-row ">
                                                        <div class="mb-1">
                                                            <h6 class="r-boldItalic f-9 text-light mb-0">Package Information</h6>
                                                            <p class="r-boldItalic f-9 ">Package Name: {{$package->package_name}}</p>
                                                        </div>
                                                        <div>
                                                            @if(strtolower(trim($cws->country->name)) == 'india')	
                                                            <h6 class="r-boldItalic f-9 text-light">{{strtoupper($currency)}} {{$package->packageAmounts()->where('currency', 'inr')->first()->amount}}</h6>
                                                            @else
                                                            <h6 class="r-boldItalic f-9 text-light">{{strtoupper($currency)}} {{$package->packageAmounts()->where('currency', 'usd')->first()->amount}}</h6>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    {{-- @endif --}}
                                                </li>
                                            </ul>
                                            <div class="row ">
                                                <div class="col-sm-8 pr-sm-0">
                                                    <input type="text" name="promo-code" placeholder="Enter promo code" class="w-100 form-control bg-white py-3 px-4 rounded-0">
                                                </div>
                                                <div class="col-sm-4 pt-sm-0 pt-3 pl-2 appliedBtn">
                                                    <button type="button" class="btn btn-success n-bold f-9 rounded-0 mx-auto text-center justify-content-center w-100 apply-code" id="apply-code">Apply</button>
                                                </div>
                                            </div>
                                            <div class="total d-flex justify-content-between pt-lg-4">
                                                <h6 class="r-boldItalic f-16 text-success">Total</h6>
                                                @if(strtolower(trim($cws->country->name)) == 'india')	
                                                <h6 class="r-boldItalic f-16 text-success">{{ $currency }} <span class="total-amount">{{$package->packageAmounts()->where('currency', 'inr')->first()->amount}}</span></h6>
                                                @else
                                                <h6 class="r-boldItalic f-16 text-success">{{ $currency }} <span class="total-amount">{{$package->packageAmounts()->where('currency', 'usd')->first()->amount}}</span></h6>
                                                @endif
                                            </div>
                                            @if(strtolower(trim($cws->country->name)) == 'india')
                                                <div class="pt-lg-3">
                                                    <button type="button" wire:click="makePayment()" class="btn btn-success n-bold f-9 rounded-0 w-100"> Pay Now</button>
                                                </div>
                                            @else
                                            <div class="pt-lg-3">
                                                {!! Form::open(['route' => 'co-work-space.listing-paypal-payment']) !!}
                                                    {!! Form::hidden('cws_id', $cws->id)!!}
                                                    {!! Form::hidden('coWorkSpaceId', $cws->id)!!}
                                                    {!! Form::hidden('name', $cws->user->fname)!!}
                                                    {!! Form::hidden('email',$cws->user->email)!!}
                                                    {!! Form::hidden('phone', $cws->user->phone)!!}
                                                    {!! Form::hidden('selectedPackageId', $package->id, ['class' => 'selected-package-id', 'id' => 'selected-package-id'])!!}
                                                    @if(strtolower(trim($cws->country->name)) == 'india')	
                                                        {!! Form::hidden('currency', 'INR') !!}
                                                        {!! Form::hidden('selectedPackageAmount', $package->packageAmounts()->where('currency', 'inr')->first()->amount, ['class' => 'selected-package-amount', 'id' => 'selected-package-amount']) !!}
                                                    @else
                                                        {!! Form::hidden('currency', 'USD') !!}
                                                        {!! Form::hidden('selectedPackageAmount', $package->packageAmounts()->where('currency', 'usd')->first()->amount, ['class' => 'selected-package-amount', 'id' => 'selected-package-amount']) !!}
                                                    @endif
                                                    {!! Form::hidden('customized', empty($cws->customized) ? null : $cws->customized, ['id' => 'customized'])!!}
                                                    <button type="submit" class="btn btn-success n-bold f-9 rounded-0 w-100"> Pay Now</button>
                                                {!! Form::close() !!}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
        @if(strtolower(trim($cws->country->name)) == 'india')
            {!! Form::open(['route' => 'co-work-space.listing-razor-payment', 'id' => 'razorpay-form']) !!}
                {!! Form::hidden('razorpay_payment_id', null, ['id' => 'razorpay_payment_id']) !!}
                {!! Form::hidden('cwsListingPaymentId', null, ['id' => 'cws_listing_payment_id']) !!}
                {!! Form::hidden('amount', null, ['id' => 'amount']) !!}
                {!! Form::hidden('currency', 'INR') !!}
                {!! Form::hidden('selectedPackageAmount', $package->packageAmounts()->where('currency', 'inr')->first()->amount, ['class' => 'selected-package-amount']) !!}
            {!! Form::close() !!}
        @endif
    </section>
</div>
