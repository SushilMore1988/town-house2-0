<div>
    <form wire:submit.prevent="store">
        <div class="d-flex flex-column term-condition-wrapper">
            <div class="align-self-start w-100">
                <h6 class="pb-3 r-boldItalic f-8 check-label ">We accept made by </h6>
                <div class="d-flex flex-wrap payment-card-wrapper ">
                    <a href="#" class="img-wrpper mx-2">
                        <img src="{{url('/img/co-living/cards/visa.svg')}}">
                    </a>
                    <a href="#" class="img-wrpper mx-2">
                        <img src="{{url('/img/co-living/cards/master.svg')}}">
                    </a>
                    <a href="#" class="img-wrpper mx-2">
                        <img src="{{url('/img/co-living/cards/paypal.svg')}}">
                    </a>
                    <a href="#" class="img-wrpper mx-2">
                        <img src="{{url('/img/co-living/cards/maestro.svg')}}">
                    </a>
                    <a href="#" class="img-wrpper mx-2">
                        <img src="{{url('/img/co-living/cards/american.svg')}}">
                    </a>
                    <a href="#" class="img-wrpper mx-2">
                        <img src="{{url('/img/co-living/cards/cirrus.svg')}}">
                    </a>
                    <a href="#" class="img-wrpper mx-2">
                        <img src="{{url('/img/co-living/cards/amazon.svg')}}">
                    </a>
                    <a href="#" class="img-wrpper mx-2">
                        <img src="{{url('/img/co-living/cards/western.svg')}}">
                    </a>
                    
    
                </div>
                <h6 class="pb-2 r-boldItalic f-9 check-label mb-0 mt-5">Payment Method</h6>
                <p class="label r-lightItalic f-9 check-label">Provide your Primary business account for transaction</p>
    
                <div id="accordion" class="formAccordian-list-space">
                    <div class="card">
                        <button href="#collapseTwo" class="form-group mb-0 main-anch collapsed card-header rounded-0 border-0" data-toggle="collapse" data-target="#collapseTwo" id="headingTwo">
                              <label class="container-2  r-boldItalic f-9 check-label mb-0 d-flex">Ripp Studio Private Limited  <span class="r-lightItalic">(Account Number : 149308325945845)</span>
    
                              <input type="radio" name="customizedRadio" id="customizedRadio" value="Yes">
                              <span class="checkmark"></span>
                            </label>
                          </button>
                        
                        <div id="collapseTwo" class="collapse collapse-tab" aria-labelledby="headingTwo" data-parent="#accordion">
                              <div class="card-body  pt-3 pb-5">
                                   <div class="d-block form-group">
                                      <input type="text" name="AccountName" class="w-100 form-control" placeholder= "Account Name" />
                                  </div>
                                  <div class="d-block form-group">
                                      <input type="text" name="AccountNumber" class="w-100 form-control" placeholder= "Account Number" />
                                  </div>
                          </div>
                        </div>
                    </div>
                    <div class="card">
                        <button href="#collapseThree" class="form-group mb-0 main-anch collapsed card-header rounded-0 border-0" data-toggle="collapse" data-target="#collapseThree" id="headingThree">
                              <label class="container-2  r-boldItalic f-9 check-label mb-0 d-flex">Ripp Studio Private Limited  <span class="r-lightItalic">(Account Number : 149308325945845)</span>
                              <input type="radio" name="customizedRadio" id="customizedRadio" value="Yes">
                              <span class="checkmark"></span>
                            </label>
                          </button>
                        
                        <div id="collapseThree" class="collapse collapse-tab" aria-labelledby="headingThree" data-parent="#accordion">
                              <div class="card-body  pt-3 pb-5">
                                   <div class="d-block form-group">
                                      <input type="text" name="AccountName" class="w-100 form-control" placeholder= "Account Name" />
                                  </div>
                                  <div class="d-block form-group">
                                      <input type="text" name="AccountNumber" class="w-100 form-control" placeholder= "Account Number" />
                                  </div>
                          </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="d-flex mt-xl-0 mt-lg-5 pt-xl-5 pt-5">
                <button type="button" wire:click="setSubmitValue('save')" class="btn btn-success n-bold f-9 rounded-0 mr-2 w-100">SAVE</button>
                <button type="button" wire:click="setSubmitValue('saveAndNext')" class="btn btn-success n-bold f-9 rounded-0 ml-2 w-100">SAVE & SUBMIT</button>	
            </div>
        </div>
    </form>
</div>
