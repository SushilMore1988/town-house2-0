<div>
    <form wire:submit.prevent="store">	
        <div class="d-flex flex-column term-condition-wrapper">
            <div class="align-self-start w-100">
                <h6 class="pb-2 r-boldItalic f-9 check-label mb-0">Select your Business Model</h6>
                <p class="label r-lightItalic f-9 check-label">TH2.0 offers several Business models which could suit your business</p>
    
                <div id="accordion" class="formAccordian-list-space">
                    <div class="card">
                        <button href="#collapseTwo" class="form-group mb-0 main-anch collapsed card-header rounded-0 border-0" data-toggle="collapse" data-target="#collapseTwo" id="headingTwo">
                              <label class="container-2  r-boldItalic f-9 check-label mb-0 d-flex">Standard Model
                              <input type="radio" name="customizedRadio" id="customizedRadio" value="Yes">
                              <span class="checkmark"></span>
                            </label>
                          </button>
                        
                        <div id="collapseTwo" class="collapse collapse-tab" aria-labelledby="headingTwo" data-parent="#accordion">
                              <div class="card-body  pt-0 pb-5">
                                   <ul class="px-3">
                                    <li class="pb-1 r-Italic f-9 check-label mb-0">Select this option for a customised business model.Our team would reach you in 24 Hours.A custom agreement would be formed for our assicaition and a copy of signed documents would be uploaded below:</li>
                                </ul>
                                <div class="d-flex">
                                    <img src="{{url('/img/pdf-logo.svg')}}" class="img-fluid dpf-image" alt="">
                                    <h6 class="pb-1 r-Italic f-9 check-label mb-0 pl-4 align-self-center">TH2.0 Custom Agreement : The Third Space _Pune_India_2020_01_07.</h6>
                                </div>
                          </div>
                        </div>
                    </div>
                    <div class="card">
                        <button href="#collapseThree" class="form-group mb-0 main-anch collapsed card-header rounded-0 border-0" data-toggle="collapse" data-target="#collapseThree" id="headingThree">
                              <label class="container-2  r-boldItalic f-9 check-label mb-0 d-flex">Customised Model
                              <input type="radio" name="customizedRadio" id="customizedRadio" value="Yes">
                              <span class="checkmark"></span>
                            </label>
                          </button>
                        
                        <div id="collapseThree" class="collapse collapse-tab" aria-labelledby="headingThree" data-parent="#accordion">
                              <div class="card-body  pt-0 pb-5">
                                   <ul class="px-3">
                                    <li class="pb-1 r-Italic f-9 check-label mb-0">Select this option for a customised business model.Our team would reach you in 24 Hours.A custom agreement would be formed for our assicaition and a copy of signed documents would be uploaded below:</li>
                                </ul>
                                <div class="d-flex">
                                    <img src="{{url('/img/pdf-logo.svg')}}" class="img-fluid dpf-image" alt="">
                                    <h6 class="pb-1 r-Italic f-9 check-label mb-0 pl-4 align-self-center">TH2.0 Custom Agreement : The Third Space _Pune_India_2020_01_07.</h6>
                                </div>
                          </div>
                        </div>
                    </div>
                </div>
                <h6 class="r-boldItalic f-9 check-label mb-4 pt-5">Terms and Conditions</h6>
                <div class="terms-wrapper mx-3 px-3 py-4 border ">
                    <div class="content longEnough terms-condition-scroll mCustomScrollbar r-italic f-9 check-label _mCS_1" data-mcs-theme="dark">
                        9.1	Authority: The client herewith gives an authority to Service provider to use client’s logo, Images of premises and information with respect to the bookings, and authorizes Service provider to publish the entire above said information on the digital platforms of the services provider like Mobile App/ web portal etc. for promoting Client’s business and to get potential business leads.  
                        9.2	Consent: The Client gives their consent to list their business on a digital platform developed by the service provider.
                        9.3	Role of Service provider: The service provider shall act as a mediator platform for connecting businesses to the Client (Being Hotels/Co-working spaces/meeting rooms, Conference rooms etc.) for promoting and marketing the business of Client on the digital platform owned and developed by Service provider
    
                    </div>
                    
                </div>
            </div>
            <div class="align-items-end justify-content-center d-flex list-space-button term-condition-responsive">
                    
                <div class="d-flex mt-xl-0 mt-lg-5 pt-xl-5 pt-5 w-100">			
                    <button type="submit" wire:click="setSubmitValue('saveAndNext')" name="save" value="1" class="btn btn-success n-bold f-9 rounded-0 mr-2 w-100 submit-btn">AGREE & SUBMIT</button>
                </div>
            </div>
        </div>
    </form>
</div>
