@php
    $commanPrice = 0;
@endphp
<div {{ $attributes->merge(['class' => '']) }}
    data-address="{{ $coWorkSpace->address['address'] }}"
    data-country="{{ $coWorkSpace->country_id }}"
    data-city="{{ $coWorkSpace->city_id }}"
    data-category="{{ $coWorkSpace->color_category }}"
    data-rating="{{ number_format($coWorkSpace->admin_rating,1)}}"
    @if( $coWorkSpace->size) 
        data-total_seating="{{ $coWorkSpace->size['seating_capacity'] }}"
        @if( $coWorkSpace->size['shared_desk']['for_listing'] != null || $coWorkSpace->size['shared_desk']['for_listing'] > 0)  
            data-shared= true
            data-shared_capacity="{{ $coWorkSpace->size['shared_desk']['for_listing'] }}"
            data-shared_month_price ="{{empty($coWorkSpace->size['shared_desk']['pricing']) ? 0 : $coWorkSpace->size['shared_desk']['pricing']['1 Month'] }}"
            <?php
                    $commanPrice = empty($coWorkSpace->size['shared_desk']['pricing']) ? 0 : $coWorkSpace->size['shared_desk']['pricing']['1 Month'];  ?>
        @else
            data-shared= false
            data-shared_capacity= 0
        @endif
        @if( $coWorkSpace->size['dedicated_desk']['for_listing'] != null || $coWorkSpace->size['dedicated_desk']['for_listing'] > 0) 
            data-dedicated=true
            data-dedicated_capacity="{{ $coWorkSpace->size['dedicated_desk']['for_listing'] }}"
            data-dedicated_month_price="{{empty($coWorkSpace->size['dedicated_desk']['pricing']) ? 0 : $coWorkSpace->size['dedicated_desk']['pricing']['1 Month'] }}"
            <?php  	
                if($commanPrice == 0){
                    $commanPrice = empty($coWorkSpace->size['dedicated_desk']['pricing']) ? 0 : $coWorkSpace->size['dedicated_desk']['pricing']['1 Month'];
                }
                else{
                    $commanPrice = $commanPrice;
                }
            ?>
        @else
            data-dedicated=false
            data-dedicated_capacity=0
        @endif
        @if($coWorkSpace->size['private_offices']['for_listing'] && !empty($coWorkSpace->size['private_offices']['private_offices'][1]['pricing']['1 Month']))
            @if($coWorkSpace->size['private_offices']['private_offices'][1]['pricing']['1 Month'])
                data-private= true
                data-private_capacity="{{ $coWorkSpace->size['private_offices']['private_offices'][1]['capacity'] }}"
                data-private_month_price="{{ $coWorkSpace->size['private_offices']['private_offices'][1]['pricing']['1 Month'] }}"
                <?php  	
                    if($commanPrice == 0){
                        $commanPrice = $coWorkSpace->size['private_offices']['private_offices'][1]['pricing']['1 Month'];
                    } 
                    else{
                        $commanPrice = $commanPrice;
                    }
                ?>
            @endif
        @else
            data-private= false
            data-private_capacity= 0
            data-private_month_price= 0
        @endif
        @if( $coWorkSpace->size['meeting_rooms']['for_listing'])
            @if($coWorkSpace->size['meeting_rooms']['types'][0]['pricing']['1 Month'])
                data-meeting='true'
                data-meeting_capacity="{{ $coWorkSpace->size['meeting_rooms']['types'][0]['capacity'] }}"
                data-meeting_month_price="{{ $coWorkSpace->size['meeting_rooms']['types'][0]['pricing']['1 Month'] }}"
                <?php  
                    if($commanPrice == 0){	
                        $commanPrice = $coWorkSpace->size['meeting_rooms']['types'][0]['pricing']['1 Month']; 
                    }
                    else{
                        $commanPrice = $commanPrice;
                    }
                ?>
            @endif
        @else
            data-meeting='false'
            data-meeting_capacity= 0
            data-meeting_month_price =0
        @endif
    @endif
    data-comman_price = "{{$commanPrice}}" 
    <?php $commanPrice = 0; ?>>

    <div class="card">
        <div class="card-body">
            @if($coWorkSpace)
                <div class="text-center img-rank" onclick="window.location.replace('{{ route('front.explore', ['slug' => $coWorkSpace->slug]) }}')">
                    @if(!empty($coWorkSpace->images['banner']))
                        <img src="{{url('img/cowork/banner/'.$coWorkSpace->images['banner'])}}" class="img-fluid card-image-top w-100" alt="" />
                    @else
                        <img src="url('img/placeholder-image.png')" class="img-fluid" alt="" />										
                    @endif
                </div>
                <div class="right-box w-100">
                    <div class="card-text">
                        <div class="d-flex justify-content-between flex-column flex-lg-row">
                            <div class="card-text-left-box d-flex flex-column w-100">
                                <div class="mb-2">
                                    <h4 class="n-bold text-dark text-uppercase">{{ $coWorkSpace->name }}</h4>
                                    @if($coWorkSpace->type == 'co-work-space')
                                        <span class="r-boldItalic f-9 text-light" style="display: block">Co-Work Space</span>
                                    @elseif($coWorkSpace->type == 'private-co-work-space')
                                        <span class="r-boldItalic f-9 text-light" style="display: block">Private Co-Work Space</span>
                                    @else
                                    <span class="r-boldItalic f-9 text-light" style="display: block">Hotel/ Meeting Rooms</span>
                                    @endif
                                    
                                    <i class="r-lightItalic f-9">
                                    @if(!empty($coWorkSpace->address['address']))																	
                                        @if(isset($coWorkSpace->address['country']) && isset($coWorkSpace->address['locality']) && isset($coWorkSpace->address['administrative_area_level_1']))
                                            @isset($coWorkSpace->address['route'])
                                                {{$coWorkSpace->address['route']}},
                                            @endisset
                                            {{$coWorkSpace->address['locality']}}, {{$coWorkSpace->address['administrative_area_level_1']}}, {{$coWorkSpace->address['country']}}
                                        @else
                                        @php
                                            if(strlen($coWorkSpace->address['address']) > 70)
                                                $pos = strpos($coWorkSpace->address['address'], ' ', 70); 
                                            else
                                                $pos = 100;
                                        @endphp
                                        {{substr($coWorkSpace->address['address'], 0, $pos)}}
                                        @endif
                                    @endif</i>
                                </div> 
                                @if($coWorkSpace->size)
                                @php
                                    $spaceAvailableType = 0;
                                @endphp
                                <div class="card-prices mt-auto pr-3">
                                    <h6 class="r-boldItalic f-9 text-light">Starting prices*</h6> 
                                    @if( $coWorkSpace->size['shared_desk']['for_listing'] != 0 || $coWorkSpace->size['shared_desk']['for_listing'] > 0) 
                                        @php
                                            $spaceAvailableType++;
                                        @endphp
                                        <p class="r-lightItalic f-9 text-light shared-hide">Shared Desks <span > <strong class="n-bold f-9 ">{{$coWorkSpace->size['currency']}} 
                                        @if(!empty($coWorkSpace->size['shared_desk']['pricing']))
                                            {{$coWorkSpace->size['shared_desk']['pricing']['1 Month']}} 
                                        @endif</strong> /Mo</span> </p>
                                    @endif
                                    @if( $coWorkSpace->size['dedicated_desk']['for_listing'] != 0 || $coWorkSpace->size['dedicated_desk']['for_listing'] > 0 )
                                        @php
                                            $spaceAvailableType++;
                                        @endphp
                                        <p class="r-lightItalic f-9 text-light dedicated-hide">Dedicated Desks <span> <strong class="n-bold f-9"> {{$coWorkSpace->size['currency']}} 
                                        @if(!empty($coWorkSpace->size['dedicated_desk']['pricing']))
                                            {{$coWorkSpace->size['dedicated_desk']['pricing']['1 Month']}} 
                                        @endif</strong>/Mo</span> </p>
                                    @endif
                                    @if($coWorkSpace->size['private_offices']['for_listing'] !=0)
                                        @php
                                            $spaceAvailableType++;
                                        @endphp
                                        @if(!empty($coWorkSpace->size['private_offices']['private_offices'][1]['pricing']['1 Month']))
                                        <p class="r-lightItalic f-9 text-light private-hide {{$spaceAvailableType > 2 ? 'd-none' : ''}}">Private Office <span> <strong class="n-bold f-9">{{$coWorkSpace->size['currency']}} {{$coWorkSpace->size['private_offices']['private_offices'][1]['pricing']['1 Month']}}</strong>/Mo</span> </p>
                                        @endif
                                    @endif
                                    @if($coWorkSpace->size['meeting_rooms']['for_listing'] != 0)
                                        @php
                                            $spaceAvailableType++;
                                        @endphp
                                        @if($coWorkSpace->size['meeting_rooms']['types'][0]['pricing']['1 Month'])
                                        <p class="r-lightItalic f-9 text-light meeting-hide {{$spaceAvailableType > 2 ? 'd-none' : ''}}">Meeting Room <span> <strong class="n-bold f-9">{{$coWorkSpace->size['currency']}} {{$coWorkSpace->size['meeting_rooms']['types'][0]['pricing']['1 Month']}}</strong>/Mo</span> </p>
                                        @endif
                                    @endif
                                </div>
                                @endif
                            </div> 
                            <div class="card-text-right-box d-flex flex-lg-column flex-row justify-content-between align-items-center"> 
                                <div class="category-type img-comntainer pt-xl-4 text-center pt-lg-4" >
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
                                <a class="btn btn-info n-bold f-6 text-muted rounded-0" href={{route('front.explore',['slug'=>$coWorkSpace->slug])}}>EXPLORE</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>