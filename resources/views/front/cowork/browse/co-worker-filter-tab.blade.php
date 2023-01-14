<div class="tab-pane show active" id="coWorkerTab">
	<h6 class="r-boldItalic f-9 text-light"><strong>Location</strong></h6>
	<div class="mb-3">
		<div class="space-preference mb-4 pt-lg-3 d-flex">
			<div class="w-50 mr-2">
				<label class="text-light mb-2 pt-2">Country</label>
				{{-- {!! Form::select('country', $countries, null, ['class' => 'form-control p-0', 'id' => 'country']) !!} --}}
				<select class="form-control p-0" id="filter_country" name="country">
					<option value="">Select Country</option>
					@foreach($countries as $index => $country)
						<option value="{{$index}}"> {{$country}} </option>
						{{-- <option {{ $index == $filter->city->country_id ? 'selected' : '' }} value="{{$index}}"> {{$country}} </option> --}}
					@endforeach
				</select>
			</div>
			<div class="w-50">
				<label class="text-light mb-2 pt-2">City</label>
				<select class="form-control p-0" id="select_city" name="city">
					<option value="">Select City</option>
					{{-- <option {{ $index == $filter->city_id ? 'selected' : '' }} value="">Select City</option> --}}
				</select>
			</div>
		</div>
	</div>
	<div class="mb-3">
		<h6 class="r-boldItalic f-9 text-light"><strong>Duration</strong></h6>
		{{-- <p class="r-lightItalic f-9 text-light mb-2">26.04.2019 | 26.05.2019</p> --}}
		<div class="d-flex mb-4 justify-content-between w-50">
			<table class="table">
				<thead>
					<tr>
						<th class="start-date w-50">
							<div class="d-flex justify-content-between W-50">
								{!! Form::hidden('start_date', null, [ 'id' => 'start-date-val', 'required' =>'']) !!}	
								<h6 class="r-boldItalic f-9 text-light">Starting Date: </h6>
								<a href="#" class="button tiny" id="start-date" data-date-format="yyyy-mm-dd" data-date="2012-02-20">
									<img src="{{url('/img/SVG_Cowork/calendor-icon.svg')}}" alt="calender" />
								</a>
							</div>
							<div id="startDate"></div>
								<h5 class="n-bold f-24 text-dark" id="start-day"></h5>
								<p class="r-lightItalic f-9 text-light" id="start-month-year"> </p>
								<h5 class="n-bold f-24 text-dark" id="day"></h5>
								<p class="r-lightItalic f-9 text-light" id="month-year"> </p>
						</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
	<div class="mb-3">
		<div class="space-preference mb-4 pt-lg-3">
			<h6 class="r-lightItalic f-9 text-light space_reference" data-space_reference="all"><strong class="r-boldItalic " >Space Preference</strong> <a href="javascript:void(0)" class="text-light" ><i>(Any)</i></a></h6>
			<ul class="d-flex justify-content-between mb-0 pt-lg-3">
				<li class="text-center space_reference" id="shared-desk-filter" data-space_reference="shared">
					{{-- <a href="{{ route('sharedDeskFilter') }}"> --}}
						<img src="{{url('/img/SVG_Cowork/shared-desk-img.svg')}}" alt="shared desk" class="desk-img"/>
						<p class=" text-light mb-2 pt-2">Shared Desk  <span>|</span></p>
					{{-- </a> --}}
				</li>
				<li class="text-center space_reference" id="dedicated-desk-filter" data-space_reference="dedicated">
					<img src="{{url('/img/SVG_Cowork/dedicated-desk-img.svg')}}" alt="shared desk" class="desk-img"/>
					<p class=" text-light mb-2 pt-2">Dedicated Desk  <span>|</span></p>
				</li>
				<li class="text-center space_reference" id="private-office-filter" data-space_reference="private">
					<img src="{{url('/img/SVG_Cowork/private-office-img.svg')}}" alt="shared desk" class="desk-img"/>
					<p class=" text-light mb-2 pt-2">Private Office</p>
				</li>
			</ul>
			<input type="hidden" id="s_space_reference" value="all">
		</div>
	</div>
	<div class="category mb-5 pt-lg-3">
		<h6 class="r-boldItalic f-9 text-light"><strong>Category</strong></h6>
		<ul class="d-flex">
			<li>
				<p class="mb-0 category-value gold" data-category_value="gold">Gold  <span>|</span></p>
			</li>
			<li>
				<p class="mb-0 category-value silver" data-category_value="silver">Silver  <span>|</span></p>
			</li>
			<li>
				<p class="mb-0 category-value bronze" data-category_value="bronze">Bronze  <span>|</span></p>
			</li>
			<li class="active">
				<p class="mb-0 category-value all" data-category_value="all">All</p>
			</li>
		</ul>
		<div class="img-container d-flex justify-content-around pt-lg-2">
			<!-- <img src="{{url('/img/SVG_Cowork/gold-category.svg')}}" class="category-value category-active" alt="" data-category_value="gold" /> -->
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45.34 45.34" class="category-value category-active" data-category_value="gold"><defs><style>.cls-11{fill:#dbbe7c;}.cls-11,.cls-12{stroke:#010101;stroke-miterlimit:10;stroke-width:0.03px;}.cls-12{fill:#efe1a4;}.cls-13{font-size:24px;fill:#f3ebdb;font-family:nevis-Bold, nevis;font-weight:700;}</style></defs><title>Asset 7</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><circle class="cls-11" cx="22.67" cy="22.67" r="22.66" transform="translate(-0.35 0.35) rotate(-0.89)"/><circle class="cls-12" cx="22.63" cy="22.71" r="19.9" transform="translate(-0.35 0.35) rotate(-0.89)"/><text class="cls-13" transform="translate(14.11 31.96)">G</text></g></g></svg>
			<!-- <img src="{{url('/img/SVG_Cowork/silver-category.svg')}}" class="category-value" alt="" data-category_value="silver" /> -->
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45.34 45.34" class="category-value" data-category_value="silver"><defs><style>.cls-21{fill:#d1d3d4;}.cls-21,.cls-22{stroke:#010101;stroke-miterlimit:10;stroke-width:0.03px;}.cls-22{fill:#f1f2f2;}.cls-23{font-size:24px;fill:#ddd;font-family:nevis-Bold, nevis;font-weight:700;}</style></defs><title>Asset 6</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><circle class="cls-21" cx="22.67" cy="22.67" r="22.66" transform="translate(-0.35 0.35) rotate(-0.89)"/><circle class="cls-22" cx="22.63" cy="22.71" r="19.9" transform="translate(-0.35 0.35) rotate(-0.89)"/><text class="cls-23" transform="translate(15.46 31.91)">S</text></g></g></svg>
			<!-- <img src="{{url('/img/SVG_Cowork/bronze-category.svg')}}" class="category-value" alt="" data-category_value="bronze"/> -->
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45.34 45.34" class="category-value"  data-category_value="bronze"><defs><style>.cls-31{fill:#c37748;}.cls-31,.cls-32{stroke:#010101;stroke-miterlimit:10;stroke-width:0.03px;}.cls-32{fill:#ddbe9f;}.cls-33{font-size:24px;fill:#f8e5db;font-family:nevis-Bold, nevis;font-weight:700;}</style></defs><title>Asset 5</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><circle class="cls-31" cx="22.67" cy="22.67" r="22.66" transform="translate(-0.35 0.35) rotate(-0.89)"/><circle class="cls-32" cx="22.63" cy="22.71" r="19.9" transform="translate(-0.35 0.35) rotate(-0.89)"/><text class="cls-33" transform="translate(14.85 31.61)">B</text></g></g></svg>
			<input type="hidden" id="s_category" value="all">
		</div>
	</div>
	<div class="no-of-people mb-5">
		<h6 class="mb-3 r-boldItalic f-9 text-light"><strong>Number of People</strong></h6>
		<div class="d-flex">
			<span class="circle minus nop_click"><img src="{{url('/img/add-filter-list/minus.jpg')}}" alt="" class="w-100"/></span>
			<h4 class="px-4 n-bold f-16 mb-0 mt-1" id="no-of-people">0</h4>
			<span class="circle plus nop_click"><img src="{{url('/img/add-filter-list/plus.jpg')}}" alt="" class="w-100" /></span>
			<input type="hidden" id="s_number_of_people" value="0">
		</div>
	</div>
	<div class="price-range ">
		<h6 class="mb-3 r-boldItalic f-9 text-light"><strong>Price Range </strong></h6>
		{{-- <p class="r-lightItalic f-9 text-light">&#8377; 500 - &#8377; 50000000</p> --}}
		<div id="histogramSlider"></div>
		<div class="container pl-0" id="slider-values">
			<div class="row">
				<div class="col-sm-12">
						<div id="slider-range"></div>
				</div>
				
			</div>
			<div class="row slider-labels">
				<div class="col-sm-6 caption">
						<span  id="slider-range-value1" class="r-lightItalic f-9 text-light" data-value1="50000"></span>
				</div>
				<div class="col-sm-6 text-right caption">
						<span id="slider-range-value2" class="r-lightItalic f-9 text-light" data-value2="50000"></span>+
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<input type="hidden" id="s_min_value" name="min-value" value="0">
					<input type="hidden" id="s_max_value" name="max-value" value="50000">
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