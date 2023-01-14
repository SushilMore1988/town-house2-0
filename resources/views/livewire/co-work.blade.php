<div>
    @if($step1)
        <section class="top-space pt-lg-5 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2 class="n-bold f-24 text-muted mb-0">LIST YOUR SPACE</h2>
                        <p class="r-lightItalic f-9 text-body">Select the type of space/property you intend to list. </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-md-0 py-3 list-space-card">
            <div class="container d-flex h-100">
                <div class="row justify-content-center align-content-center align-items-center align-self-center w-100">
                    <div class=" mx-auto col-lg-11">
                        <div class="row py-4">
                            <div class="col-lg-4 col-md-6 mx-auto" wire:click="setType('co-work-space')">
                                <div class="card d-flex h-100  rounded-0">
                                    <div class="card-body align-self-center align-content-center">
                                        <div class="text-center img-grp d-flex">
                                            <img src="{{url('/img/SVG_Cowork/co-work-space-listing.svg')}}" class="img-fluid h-auto align-self-center mx-auto" alt="co-work-space-listing" />
                                        </div>
                                        <div class="border text-center p-3">
                                            <h2 class="n-bold f-24 text-dark pb-1">01</h2>
                                            <h4 class="n-bold f-14 text-dark pb-1">CO-WORKING <br class="d-lg-block d-none"/> SPACE </h4>
                                            <p class="text-secondary r-lightItalic f-9 text-center">List your co-working space and more users on board</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mx-auto mt-md-0 mt-4" wire:click="setType('private-co-work-space')">
                                <div class="card d-flex h-100  rounded-0">
                                    <div class="card-body align-self-center align-content-center">
                                        <div class="text-center img-grp d-flex">
                                            <img src="{{url('/img/SVG_Cowork/private-co-worker.svg')}}" class="img-fluid align-self-center mx-auto" alt="private-co-worker" />
                                        </div>
                                        <div class="border text-center py-3 px-2">
                                            <h2 class="n-bold f-24 text-dark pb-1">02</h2>
                                            <h4 class="n-bold f-14 text-dark pb-1">PRIVATE<br class="d-lg-block d-none" /> COWORKER</h4>
                                            <p class="text-secondary r-lightItalic f-9 text-center">List your private property to find co-working mates with mutual objectives</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mx-auto mt-lg-0 mt-4" wire:click="setType('meeting-co-work-space')">
                                <div class="card d-flex h-100  rounded-0">
                                    <div class="card-body align-self-center align-content-center">
                                        <div class="text-center img-grp d-flex">
                                            <img src="{{url('/img/SVG_Cowork/hotel-meeting-rooms-listing.svg')}}" class="img-fluid align-self-center mx-auto" alt="hotel-meeting-rooms-listing" />
                                        </div>
                                        <div class="border text-center p-3">
                                            <h2 class="n-bold f-24 text-dark pb-1">03</h2>
                                            <h4 class="n-bold f-14 text-dark pb-1">HOTEL/ MEETING<br class="d-lg-block d-none"/> ROOM</h4>
                                            <p class="text-secondary r-lightItalic f-9 text-center">List your co-working space and more users on board</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($step2)
        <section class="top-space  detail-list-space">
            <div class="container h-100">
                <div class="row" >
                    <div class="col-md-3 d-flex align-items-end ">
                        <img src="{{url('/img/SVG_Cowork/list-your-space.svg')}}" class="img-fluid list-space-img w-75 list-space-img" alt="list-your-space" />
                    </div>
                    <div class="col-md-9 col-sm-12 conatct-detail">
                        <h2 class="n-bold f-24 text-muted mb-0 pt-md-4 pt-5">LIST YOUR SPACE</h2>
                        <p class="r-lightItalic f-9 text-body">Let us know more about your space to get the best TH2.0 reviews and have an attractive page for providing information to the users.</p>                             
                        <h6 class="mb-3 r-boldItalic f-9 text-body">Contact Details </h6>
                        <form class="register-form " wire:submit.prevent="storeInfo">
                            <div class="d-flex h-100 flex-column">
                                <div class="align-self-start w-100 min-form-ht">
                                    <div class="d-block">
                                        <input type="text" name="coWorkSpaceName" class="common-field w-100 form-control" placeholder="Name of Co-working space" wire:model="coWorkSpaceName">
                                        @if ($errors->has('coWorkSpaceName')) 
                                            <p class="text-danger error">
                                                {{ $errors->first('coWorkSpaceName') }}
                                            </p> 
                                        @endif
                                    </div>
                                    <div class="d-block">
                                        <select name="country" class="common-field w-100 form-control" wire:model="country" wire:change="countryChanged()">
                                            <option value="">--- Select Country ---</option>
                                            @foreach ($countries as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('country')) 
                                            <p class="text-danger error">
                                                {{ $errors->first('country') }}
                                            </p> 
                                        @endif
                                    </div>
                                    <div class="d-block">
                                        <select name="state" class="common-field w-100 form-control" wire:model="state" wire:change="stateChanged()">
                                            <option value="">--- Select State ---</option>
                                            @foreach ($states as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('state')) 
                                            <p class="text-danger error">
                                                {{ $errors->first('state') }}
                                            </p> 
                                        @endif
                                    </div>
                                    <div class="d-block">
                                        <select name="city" class="common-field w-100 form-control" wire:model="city">
                                            <option value="">--- Select City ---</option>
                                            @foreach ($cities as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        
                                        @if ($errors->has('city')) 
                                            <p class="text-danger error">
                                                {{ $errors->first('city') }}
                                            </p> 
                                        @endif
                                    </div>
                                    <h6 class="pt-3 pb-1 r-boldItalic f-9 text-body">Let us Know your Role at this space</h6>
                                    
                                    <ul class="d-flex justify-content-between flex-wrap">
                                        <li>
                                            <label class="container-2 r-lightItalic f-9 text-body">Owner
                                            <input type="radio" name="userRole" value="Owner" wire:model="userRole">
                                            <span class="checkmark"></span>
                                            </label>	
                                        </li>
                                        <li>
                                            <label class="container-2 r-lightItalic f-9 text-body">Official Team
                                            <input type="radio" name="userRole" value="OfficialTeam" wire:model="userRole">
                                            <span class="checkmark"></span>
                                            </label>	
                                        </li>
                                        <li>
                                            <label class="container-2 r-lightItalic f-9 text-body">Members
                                            <input type="radio" name="userRole" value="Members" wire:model="userRole">
                                            <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="container-2 r-lightItalic f-9 text-body">Guest User
                                            <input type="radio" name="userRole" value="Guest" wire:model="userRole">
                                            <span class="checkmark"></span>
                                            </label>	
                                        </li>
                                    </ul>
                                </div>
                                <div class="pt-lg-4 pt-xl-0 align-self-end w-100 align-items-end">
                                    <button  type="submit" class="btn btn-success n-bold f-9 rounded-0 ml-2 w-100" value="save_submit" name="saveSubmit">SAVE & SUBMIT</button>	
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($step3)
        
    @endif
</div>
