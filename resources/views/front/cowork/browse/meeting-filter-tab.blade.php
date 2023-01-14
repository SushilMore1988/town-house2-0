<div class="tab-pane" id="meetingTab">
    <input type="hidden" id="s_mspace_reference" value="meeting">
    <h6 class="r-boldItalic f-9 text-light"><strong>Location</strong></h6>
	<div class="mb-3">
		<div class="space-preference mb-4 pt-lg-3 d-flex">
			<div class="w-50 mr-2">
				<label class="text-light mb-2 pt-2">Country</label>
				{{-- {!! Form::select('country', $countries, null, ['class' => 'form-control p-0', 'id' => 'country']) !!} --}}
				<select class="form-control p-0" id="filter_m_country" name="country">
					<option value="">Select Country</option>
					@foreach($countries as $index => $country)
						<option value="{{$index}}"> {{$country}} </option>
					@endforeach
				</select>
			</div>
			<div class="w-50">
				<label class="text-light mb-2 pt-2">City</label>
				<select class="form-control p-0" id="select_m_city" name="city">
					<option value="">Select City</option>
				</select>
			</div>
		</div>
	</div>
    <div class="mb-3">
        <h6 class="r-boldItalic f-9 text-light"><strong>Duration</strong></h6>
        {{-- <p class="r-lightItalic f-9 text-light mb-2">26.04.2019 | 26.05.2019</p> --}}
        <div class="d-flex mb-4 justify-content-between w-100">
            <table class="table w-50 mb-0">
                <thead>
                    <tr>
                        <th class="start-date w-50">
                            <div class="d-flex justify-content-between">
                                {!! Form::hidden('start_date', null, [ 'id' => 'me-start-date-val', 'required' =>'']) !!}	
                                <h6 class="r-boldItalic f-9 text-light">Starting Date: </h6>
                                <a href="#" class="button tiny" id="me-start-date" data-date-format="yyyy-mm-dd" data-date="2012-02-20">
                                    <img src="{{url('/img/SVG_Cowork/calendor-icon.svg')}}" alt="calender" />
                                </a>
                            </div>
                            <div id="meStartDate"></div>
                                <h5 class="n-bold f-24 text-dark" id="me-start-day"></h5>
                                <p class="r-lightItalic f-9 text-light" id="me-start-month-year"> </p>
                                <h5 class="n-bold f-24 text-dark" id="b-day"></h5>
                                <p class="r-lightItalic f-9 text-light" id="b-month-year"> </p>
                        </th>
                    </tr>
                </thead>
            </table>
            <div class="end-date w-50" >
                <div class="d-flex justify-content-between">
                    <h6 class="r-boldItalic f-9 text-light">Time: </h6>
                    <!-- <img src="./img/add-filter-list/calender.jpg" alt="calender" /> -->
                </div>
                {{-- <h5 class="n-bold f-16 text-dark pt-2" >00:00</h5> --}}
                <div class='input-group date'>
                    <div class="d-flex">
                        {!! Form::text('meeting_booking_time', '00:00', [ 'class' => 'n-bold text-dark common-field-input from-time-picker from-mark number meeting-booking-time', 'style' => 'border: 0px; width: 70px; display: inline-block; font-size: 14px; padding: 0px']) !!} <span class="n-bold text-dark align-self-center"> - </span>
                        {!! Form::text('meeting_booking_time', '00:00', [ 'class' => 'text-dark n-bold common-field-input from-time-picker from-mark number meeting-booking-time', 'style' => 'border: 0px; width: 70px; display: inline-block; font-size: 14px; padding: 0px']) !!}
                    </div>
                </div>
                <p class="r-lightItalic f-9 text-light mb-0">Hrs</p>
            </div>
        </div>
    </div>

    <div class="space-preference mb-4 pt-lg-3">
        <h6 class="r-lightItalic f-9 text-light"><strong class="r-boldItalic">Meeting Room Occupancy</strong> <span class="cursor-pointer meeting-no-people" data-mnumber_of_people="0">(Any)</span></h6>
        <ul class="d-flex justify-content-between mb-0 Room-occupancy">
            <li class="active text-center meeting-no-people" data-mnumber_of_people="five_to_ten">
                <img src="{{url('/img/SVG_Cowork/5-10-peolple.svg')}}" alt="5-10-peolple" class="my-2"/>
                <p class=" text-light mb-2 " >05 - 10 People  <span>|</span></p>
            </li>
            <li class="text-center  meeting-no-people"  data-mnumber_of_people="ten_to_twenty">
                <img src="{{url('/img/SVG_Cowork/10-20-people.svg')}}" alt="shared desk" class="my-2"/>
                <p class=" text-light mb-2" >10 - 20 People  <span>|</span></p>
            </li>
            <li class="text-center meeting-no-people"  data-mnumber_of_people="twenty_and_above">
                <img src="{{url('/img/SVG_Cowork/20-plus-people.svg')}}" alt="shared desk" class="mt-2 mb-1"/>
                <p class=" text-light mb-2 ">20 (+) People</p>
            </li>
        </ul>
        <input type="hidden" id=s_m_number_of_people value=0>
    </div>
    <div class="category mb-4 m_category pt-lg-3">
        <h6 class="r-boldItalic f-9 text-light"><strong>Category</strong></h6>
        <ul class="d-flex">
            <li>
                <p class="mb-0 m_category-value m_gold" data-category_value="gold">Gold  <span>|</span></p>
            </li>
            <li>
                <p class="mb-0 m_category-value m_silver" data-category_value="silver">Silver  <span>|</span></p>
            </li>
            <li>
                <p class="mb-0 m_category-value m_bronze" data-category_value="bronze">Bronze  <span>|</span></p>
            </li>
            <li class="active">
                <p class="mb-0 m_category-value all" data-category_value="all">All</p>
            </li>
        </ul>
        <div class="img-container d-flex justify-content-around pt-lg-2">
            <!-- <img src="{{url('/img/SVG_Cowork/gold-category.svg')}}" class="m_category-value m_gold" alt="" data-category_value="gold" /> -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45.34 45.34" class="m_category-value m_gold" data-category_value="gold"><defs><style>.cls-11{fill:#dbbe7c;}.cls-11,.cls-12{stroke:#010101;stroke-miterlimit:10;stroke-width:0.03px;}.cls-12{fill:#efe1a4;}.cls-13{font-size:24px;fill:#f3ebdb;font-family:nevis-Bold, nevis;font-weight:700;}</style></defs><title>Asset 7</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><circle class="cls-11" cx="22.67" cy="22.67" r="22.66" transform="translate(-0.35 0.35) rotate(-0.89)"/><circle class="cls-12" cx="22.63" cy="22.71" r="19.9" transform="translate(-0.35 0.35) rotate(-0.89)"/><text class="cls-13" transform="translate(14.11 31.96)">G</text></g></g></svg>
            <!-- <img src="{{url('/img/SVG_Cowork/silver-category.svg')}}" class="m_category-value m_silver" alt="" data-category_value="silver" /> -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45.34 45.34" class="m_category-value m_silver" data-category_value="silver"><defs><style>.cls-21{fill:#d1d3d4;}.cls-21,.cls-22{stroke:#010101;stroke-miterlimit:10;stroke-width:0.03px;}.cls-22{fill:#f1f2f2;}.cls-23{font-size:24px;fill:#ddd;font-family:nevis-Bold, nevis;font-weight:700;}</style></defs><title>Asset 6</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><circle class="cls-21" cx="22.67" cy="22.67" r="22.66" transform="translate(-0.35 0.35) rotate(-0.89)"/><circle class="cls-22" cx="22.63" cy="22.71" r="19.9" transform="translate(-0.35 0.35) rotate(-0.89)"/><text class="cls-23" transform="translate(15.46 31.91)">S</text></g></g></svg>
            <!-- <img src="{{url('/img/SVG_Cowork/bronze-category.svg')}}" class="m_category-value m_bronze" alt="" data-category_value="bronze"/> -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45.34 45.34" class="m_category-value m_bronze" data-category_value="bronze"><defs><style>.cls-31{fill:#c37748;}.cls-31,.cls-32{stroke:#010101;stroke-miterlimit:10;stroke-width:0.03px;}.cls-32{fill:#ddbe9f;}.cls-33{font-size:24px;fill:#f8e5db;font-family:nevis-Bold, nevis;font-weight:700;}</style></defs><title>Asset 5</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><circle class="cls-31" cx="22.67" cy="22.67" r="22.66" transform="translate(-0.35 0.35) rotate(-0.89)"/><circle class="cls-32" cx="22.63" cy="22.71" r="19.9" transform="translate(-0.35 0.35) rotate(-0.89)"/><text class="cls-33" transform="translate(14.85 31.61)">B</text></g></g></svg>
            <input type="hidden" id="s_mcategory" value="all">
        </div>
    </div> 
        <div class="price-range pt-lg-3">
        <h6 class="mb-3 r-boldItalic f-9 text-light"><strong>Price Range </strong></h6>
        {{-- <p class="r-lightItalic f-9 text-light">&#8377; 500 - &#8377; 50000000</p> --}}
        <div id="histogramSlider"></div>
        <div class="container pl-0" id="mslider-values">
            <div class="row">
                <div class="col-sm-12">
                      <div id="meeting-slider-range"></div>
                </div>
            </div>
            <div class="row slider-labels">
                <div class="col-sm-6 caption">
                       <span  id="mslider-range-value1" class="r-lightItalic f-9 text-light" data-value1="1000"></span>
                </div>
                <div class="col-sm-6 text-right caption">
                      <span id="mslider-range-value2" class="r-lightItalic f-9 text-light" data-value2="50000000"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="hidden" id="sm_min_value" name="min-value" value="1000">
                    <input type="hidden" id="sm_max_value" name="max-value" value="50000000">
                </div>
            </div>
        </div>

        <table style="display: none;" >
          <tr id="data">
            <th>Value</th>
            <th>Running Count</th>
          </tr>
        </table>
    </div>
</div>