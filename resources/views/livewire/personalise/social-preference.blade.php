<div>
    <div class="row pt-4">
        <div class="col-md-6">
            <div class="special-preference px-3 py-2" >
                <h6 class="f-14 r-boldItalic text-colive-dark mb-3">Search and Rate your Interest / Likes / Hobbies</h6>
                <form class="register-form">
                    <div class="form-group">
                        <input type="text" wire:model="social_interest_search" name="social_intrest" class=" w-100 form-control" placeholder="Search your Interest">
                    </div>
                </form>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <h6 class="f-14 r-boldItalic text-colive-dark mb-3">Interest</h6>
                    </div>
                    <div class="col-md-9">
                        <h6 class="f-14 r-boldItalic text-colive-dark mb-3 text-center">Rating</h6>
                    </div>
                </div>
                {{-- {{ dd($social_interests) }} --}}
                @foreach($list_of_social_interests as $pi)
                <div class="row {{ ($user->socialInterests->contains($pi->id)) || (strpos(strtolower($pi->name), $social_interest_search) !== false && !empty($social_interest_search)) ? '' : 'd-none'}}" data-name="{{strtolower($pi->name)}}">
                    <div class="col-md-5">
                        <h6 class="f-14 r-italic text-colive-dark mb-2">{{$pi->name}}</h6>
                    </div>
                    <div class="col-md-7 text-center">
                        <div class="row mx-auto mx-auto rate-div">
							{{-- {!! Form::hidden('rating_value_'.$pi->id, $social_interests[$pi->id], ['class' => 'rating_value']) !!} --}}
                            @for($i = 1; $i <= 10; $i++)
                                <label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
                                    @if($user->socialInterests->contains($pi->id))
                                        @if($user->socialInterests()->where('social_interest_id',$pi->id)->first()->pivot->rating < $i)
                                        <input class="rate-checkbox" type="checkbox" value="{{$i}}" name="adventure" data-no="{{$i}}" wire:click="changeSocialInterests({{$pi->id}}, {{$i}})" />
                                        @else
                                        <input class="rate-checkbox" checked="true" type="checkbox" value="{{$i}}" name="adventure" data-no="{{$i}}" wire:click="changeSocialInterests({{$pi->id}}, {{$i}})" />
                                        @endif
                                    @else
                                        <input class="rate-checkbox" type="checkbox" value="{{$i}}" name="adventure" data-no="{{$i}}" wire:click="changeSocialInterests({{$pi->id}}, {{$i}})" />
                                    @endif
                                    <span class="checkmark checkbox-checkmark"></span>
                                </label>
                            @endfor
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="my-2"></div>
            <div class="special-preference px-3 py-2" >
                <h6 class="f-14 r-boldItalic text-colive-dark mb-3">Search and Rate your Professional Interests</h6>
                <form class="register-form">
                    <div class="form-group">
                        <input type="text" name="intrest" class=" w-100 form-control" placeholder="Search your Interest" wire:model="professional_interest_search">
                    </div>
                </form>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <h6 class="f-14 r-boldItalic text-colive-dark mb-3">Interest</h6>
                    </div>
                    <div class="col-md-9">
                        <h6 class="f-14 r-boldItalic text-colive-dark mb-3 text-center">Rating</h6>
                    </div>
                </div>
                @foreach($list_of_professional_interests as $pi)
                <div class="row {{ ($user->professionalInterests->contains($pi->id)) || (strpos(strtolower($pi->name), $professional_interest_search) !== false && !empty($professional_interest_search)) ? '' : 'd-none'}}" data-name="{{strtolower($pi->name)}}">
                    <div class="col-md-5">
                        <h6 class="f-14 r-italic text-colive-dark mb-2">{{$pi->name}}</h6>
                    </div>
                    <div class="col-md-7 text-center">
                        <div class="row mx-auto mx-auto rate-div">
                            {{-- @if(!empty($professional_interests[$pi->id])) --}}
							    {{-- {!! Form::hidden('rating_value_'.$pi->id, $professional_interests[$pi->id], ['class' => 'rating_value']) !!} --}}
                                @for($i = 1; $i <= 10; $i++)
                                    <label class="container-review r-lightItalic f-9 check-label mb-0 pl-3">
                                        {{-- @if($professional_interests[$pi->id] < $i) --}}
                                        @if($user->professionalInterests->contains($pi->id))
                                            @if($user->professionalInterests()->where('professional_interest_id',$pi->id)->first()->pivot->rating < $i)
                                                <input class="rate-checkbox" type="checkbox" value="{{$i}}" name="adventure" data-no="{{$i}}" wire:click="changeProfessionalInterests({{$pi->id}}, {{$i}})">
                                            @else
                                                <input class="rate-checkbox" checked="true" type="checkbox" value="{{$i}}" name="adventure" data-no="{{$i}}" wire:click="changeProfessionalInterests({{$pi->id}}, {{$i}})">
                                            @endif
                                        @else
                                            <input class="rate-checkbox" type="checkbox" value="{{$i}}" name="adventure" data-no="{{$i}}" wire:click="changeProfessionalInterests({{$pi->id}}, {{$i}})">
                                        @endif
                                        <span class="checkmark checkbox-checkmark"></span>
                                    </label>
                                @endfor
                                {{-- @else
                                    {!! Form::hidden('rating_value_'.$pi->id, null, ['class' => 'rating_value']) !!}
                                    @endif --}}
                        </div>

                        {{-- <label class="container-review r-lightItalic f-9 check-label mb-0 mr-0"><i class="fa fa-trash mr-0"></i></label> --}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-6">
            <h6 class="f-14 r-boldItalic text-colive-dark mb-3">Privacy Level</h6>
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                            <img src="{{url('/img/co-living/social.png')}}" alt="lifestyle" class="mb-2 privacy-level"><br>	
                          <input type="radio" class="form-check-input" name="privacy_level" wire:model="privacy_level" value="Social"><br>
                          <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Social</span>
                      </label>
                  </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                            <img src="{{url('/img/co-living/Fairly-Social.png')}}" alt="lifestyle" class="mb-2 privacy-level"><br>	
                          <input type="radio" class="form-check-input" name="privacy_level" wire:model="privacy_level" value="Fairly Social"><br>
                          <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Fairly Social</span>
                      </label>
                  </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                            <img src="{{url('/img/co-living/Private.png')}}" alt="lifestyle" class="mb-2 privacy-level"><br>	
                          <input type="radio" class="form-check-input" name="privacy_level" wire:model="privacy_level" value="Private"><br>
                          <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Private</span>
                      </label>
                  </div>
                </div>
            </div>
            <h6 class="f-14 r-boldItalic text-colive-dark mb-3 mt-4">Hygeine Level</h6>
            <div class="row">
                <div class="col-md-3 text-center pr-0">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                            <img src="{{url('/img/co-living/Very-Clean.png')}}" alt="lifestyle" class="mb-2 Hygeine-Level"><br>	
                          <input type="radio" class="form-check-input" name="hygine_level" wire:model="hygine_level" value="Very Clean"><br>
                          <span class="r-lightItalic f-13 text-colive-dark text-colive-dark">Very Clean</span>
                      </label>
                  </div>
                </div>
                <div class="col-md-2 text-center pr-0">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                            <img src="{{url('/img/co-living/Clean.png')}}" alt="lifestyle" class="mb-2 Hygeine-Level"><br>	
                          <input type="radio" class="form-check-input" name="hygine_level" wire:model="hygine_level" value="Clean"><br>
                          <span class="r-lightItalic f-13 text-colive-dark text-colive-dark">Clean</span>
                      </label>
                  </div>
                </div>
                <div class="col-md-5 text-center pr-0">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                            <img src="{{url('/img/co-living/Sometimes-Messy.png')}}" alt="lifestyle" class="mb-2 Hygeine-Level"><br>	
                          <input type="radio" class="form-check-input" name="hygine_level" wire:model="hygine_level" value="Sometimes Messy"><br>
                          <span class="r-lightItalic f-13 text-colive-dark  text-colive-dark">Sometimes Messy</span>
                      </label>
                  </div>
                </div>
                <div class="col-md-2 text-center">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                            <img src="{{url('/img/co-living/Messy.png')}}" alt="lifestyle" class="mb-2 Hygeine-Level"><br>	
                          <input type="radio" class="form-check-input" name="hygine_level" wire:model="hygine_level" value="Messy"><br>
                          <span class=" text-colive-dark r-lightItalic f-13 text-colive-dark">Messy</span>
                      </label>
                  </div>
                </div>
            </div>
            <h6 class="f-14 r-boldItalic text-colive-dark mb-3 mt-5">Community Member Type</h6>
            <ul class="pl-0" style="list-style-type: none;">
                <li class="mb-2">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="community_member_type" wire:model="community_member_type" value="Single Men">
                          <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Single Men</span>
                      </label>
                  </div>
                </li>
                <li class="mb-2">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="community_member_type" wire:model="community_member_type" value="Single Women">
                          <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Single Women</span>
                      </label>
                  </div>
                </li>
                <li class="mb-2">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="community_member_type" wire:model="community_member_type" value="Couple (Straight)">
                          <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Couple (Straight)</span>
                      </label>
                  </div>
                </li>
                <li class="mb-2">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="community_member_type" wire:model="community_member_type" value="Couple (Gay, Lesbian)">
                          <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Couple (Gay, Lesbian)</span>
                      </label>
                  </div>
                </li>
                <li class="mb-2">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="community_member_type" wire:model="community_member_type" value="Single Dad">
                          <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Single Dad</span>
                      </label>
                  </div>
                </li>
                <li class="mb-2">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="community_member_type" wire:model="community_member_type" value="Single Mom">
                          <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Single Mom</span>
                      </label>
                  </div>
                </li>
                <li class="mb-2">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="community_member_type" wire:model="community_member_type" value="Senior Citizen">
                          <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Senior Citizen</span>
                      </label>
                  </div>
                </li>
                <li class="mb-2">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="community_member_type" wire:model="community_member_type" value="Family">
                          <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Family</span>
                      </label>
                  </div>
                </li>
            </ul>
            <h6 class="f-14 r-boldItalic text-colive-dark mb-3 mt-5">Acceptance Level</h6>
            <ul class="pl-0" style="list-style-type: none;">
                <li class="mb-2">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="acceptance_level" wire:model="acceptance_level" value="Open to Guests / Friends / People at home">
                          <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Open to Guests / Friends / People at home</span>
                      </label>
                  </div>
                </li>
                <li class="mb-2">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="acceptance_level" wire:model="acceptance_level" value="Open to drinking at home">
                          <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Open to drinking at home</span>
                      </label>
                  </div>
                </li>
                <li class="mb-2">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="acceptance_level" wire:model="acceptance_level" value="Open to have pets at home">
                          <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Open to have pets at home</span>
                      </label>
                  </div>
                </li>
                <li class="mb-2">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="acceptance_level" wire:model="acceptance_level" value="Open to smoking at home">
                          <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Open to smoking at home</span>
                      </label>
                  </div>
                </li>
                <li class="mb-2">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="acceptance_level" wire:model="acceptance_level" value="Open for gathering events at home">
                          <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Open for gathering events at home</span>
                      </label>
                  </div>
                </li>
            </ul>
            <h6 class="f-14 r-boldItalic text-colive-dark mb-3 mt-5">Lifestyle Balance (Priorities and Networks which Matters)</h6>
            <ul class="pl-0" style="list-style-type: none;">
                <li class="mb-2">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="lifestyle_balance" wire:model="lifestyle_balance" value="Only Professional Networks">
                          <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Only Professional Networks</span>
                      </label>
                  </div>
                </li>
                <li class="mb-2">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="lifestyle_balance" wire:model="lifestyle_balance" value="Professional Networks > Social Networks">
                          <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Professional Networks > Social Networks</span>
                      </label>
                  </div>
                </li>
                <li class="mb-2">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="lifestyle_balance" wire:model="lifestyle_balance" value="Social Network = Professional Network">
                          <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Social Network = Professional Network</span>
                      </label>
                  </div>
                </li>
                <li class="mb-2">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="lifestyle_balance" wire:model="lifestyle_balance" value="Social Networks > Professional Networks">
                          <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Social Networks > Professional Networks</span>
                      </label>
                  </div>
                </li>
                <li class="mb-2">
                    <div class="form-check-inline">
                      <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="lifestyle_balance" wire:model="lifestyle_balance" value="Only Social Networks">
                          <span class="r-lightItalic f-9 text-colive-dark r-lightItalic f-9 text-colive-dark">Only Social Networks</span>
                      </label>
                  </div>
                </li>
                
            </ul>
        </div>
    </div>
    <input type="button" class="d-none" id="save-sop-input" wire:click="update">
</div>