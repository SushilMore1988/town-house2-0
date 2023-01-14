<div class="tab-pane show active" id="coWorkerTab">
	<div class="mb-3">
		<h6 class="r-boldItalic f-9 text-light"><strong>Browsing as</strong></h6>
		<p class="r-lightItalic f-9 text-light">An Individual</p>
		<div class="list-browsing">
		  	<div class="row  ">
		  		<div class="col-lg-4 col-sm-6 mx-lg-auto ">
					<label for="co-living" class="mx-auto">
						<input class="" type="radio" name="service" id="co-living" value="option5">
						<div class="box share-opinion d-flex flex-column justify-content-center">
							<img class="rounded mx-auto align-self-center" src="{{url('/img/co-living/browse/Group.svg')}}" alt="co-living.svg">
							<h6 class="mt-3 n-bold f-9 text-center">Individual</h6>
						</div>
					</label>
				</div>
				<div class="col-lg-4  col-sm-6 mx-lg-auto ">
					<label for="co-working" class="mx-auto">
						<input class="" type="radio" name="service" id="co-working" value="option6">
						<div class="box share-opinion d-flex flex-column justify-content-center">
							<img class="rounded mx-auto align-self-center" src="{{url('/img/co-living/browse/individual.svg')}}" alt="co-living.svg">
							<h6 class="mt-3 n-bold f-9 text-center">Group</h6>
						</div>
					</label>
				</div>
				
			</div>
		</div>
	</div>
	<div class="no-of-people mb-5">
		<h6 class="mb-3 r-boldItalic f-9 text-light"><strong>Group Size</strong></h6>
		<p class="r-lightItalic f-9 text-light">2 People</p>
		<div class="d-flex">
			<span class="circle minus nop_click"><img src="{{url('/img/add-filter-list/minus.jpg')}}" alt="" class="w-100"></span>
			<h4 class="px-4 n-bold f-16 mb-0 mt-1" id="no-of-people">0</h4>
			<span class="circle plus nop_click"><img src="{{url('/img/add-filter-list/plus.jpg')}}" alt="" class="w-100"></span>
			<input type="hidden" id="s_number_of_people" value="0">
		</div>
	</div>
	<div class="mb-3">
		<h6 class="r-boldItalic f-9 text-light"><strong>Duration</strong></h6>
		
		<div class="d-flex mb-4 justify-content-between w-50">
			<table class="table">
				<thead>
					<tr>
						<th class="start-date w-50">
							<div class="d-flex justify-content-between W-50">
								<input id="start-date-val" required="" name="start_date" type="hidden">	
								<h6 class="r-boldItalic f-9 text-light">Starting Date: </h6>
								<a href="#" class="button tiny" id="start-date" data-date-format="yyyy-mm-dd" data-date="2012-02-20">
									<img src="{{url('/img/SVG_Cowork/calendor-icon.svg')}}" alt="calender">
								</a>
							</div>
							<div id="startDate"></div>
								<h5 class="n-bold f-24 text-dark" id="start-day"></h5>
								<p class="r-lightItalic f-9 text-light" id="start-month-year"> </p>
								<h5 class="n-bold f-24 text-dark" id="day">9</h5>
								<p class="r-lightItalic f-9 text-light" id="month-year">March 2021</p>
						</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
	<div class="no-of-people mb-3">
		<h6 class="mb-3 r-boldItalic f-9 text-light"><strong>Location Preference</strong></h6>
		<div class="d-block">
            <input type="text" name="Area" id="Area" class="form-control r-lightItalic f-9" value="" placeholder="Area" required="">
            <input type="text" name="City" id="City" class="form-control r-lightItalic f-9" value="" placeholder="City" required="">
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
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45.34 45.34" class="category-value category-active" data-category_value="gold"><defs><style>.cls-11{fill:#dbbe7c;}.cls-11,.cls-12{stroke:#010101;stroke-miterlimit:10;stroke-width:0.03px;}.cls-12{fill:#efe1a4;}.cls-13{font-size:24px;fill:#f3ebdb;font-family:nevis-Bold, nevis;font-weight:700;}</style></defs><title>Asset 7</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><circle class="cls-11" cx="22.67" cy="22.67" r="22.66" transform="translate(-0.35 0.35) rotate(-0.89)"></circle><circle class="cls-12" cx="22.63" cy="22.71" r="19.9" transform="translate(-0.35 0.35) rotate(-0.89)"></circle><text class="cls-13" transform="translate(14.11 31.96)">G</text></g></g></svg>
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45.34 45.34" class="category-value" data-category_value="silver"><defs><style>.cls-21{fill:#d1d3d4;}.cls-21,.cls-22{stroke:#010101;stroke-miterlimit:10;stroke-width:0.03px;}.cls-22{fill:#f1f2f2;}.cls-23{font-size:24px;fill:#ddd;font-family:nevis-Bold, nevis;font-weight:700;}</style></defs><title>Asset 6</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><circle class="cls-21" cx="22.67" cy="22.67" r="22.66" transform="translate(-0.35 0.35) rotate(-0.89)"></circle><circle class="cls-22" cx="22.63" cy="22.71" r="19.9" transform="translate(-0.35 0.35) rotate(-0.89)"></circle><text class="cls-23" transform="translate(15.46 31.91)">S</text></g></g></svg>
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45.34 45.34" class="category-value" data-category_value="bronze"><defs><style>.cls-31{fill:#c37748;}.cls-31,.cls-32{stroke:#010101;stroke-miterlimit:10;stroke-width:0.03px;}.cls-32{fill:#ddbe9f;}.cls-33{font-size:24px;fill:#f8e5db;font-family:nevis-Bold, nevis;font-weight:700;}</style></defs><title>Asset 5</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><circle class="cls-31" cx="22.67" cy="22.67" r="22.66" transform="translate(-0.35 0.35) rotate(-0.89)"></circle><circle class="cls-32" cx="22.63" cy="22.71" r="19.9" transform="translate(-0.35 0.35) rotate(-0.89)"></circle><text class="cls-33" transform="translate(14.85 31.61)">B</text></g></g></svg>
			<input type="hidden" id="s_category" value="all">
		</div>
	</div>
	<div class="mb-3">
		<div class="space-preference mb-4 pt-lg-3">
			<h6 class="r-lightItalic f-9 text-light space_reference" data-space_reference="all"><strong class="r-boldItalic ">Space Preference</strong> <a href="javascript:void(0)" class="text-light"><i>(Any)</i></a></h6>
			<ul class="d-flex justify-content-between mb-0 pt-lg-3">
				<li class="text-center space_reference" id="shared-desk-filter" data-space_reference="shared">
					<img src="{{url('/img/SVG_Cowork/shared-desk-img.svg')}}" alt="shared desk" class="desk-img">
					<p class="text-light mb-2 pt-2">Shared Desk  <span>|</span></p>
				</li>
				<li class="text-center space_reference" id="dedicated-desk-filter" data-space_reference="dedicated">
					<img src="{{url('/img/SVG_Cowork/dedicated-desk-img.svg')}}" alt="shared desk" class="desk-img">
					<p class=" text-light mb-2 pt-2">Dedicated Desk  <span>|</span></p>
				</li>
				<li class="text-center space_reference" id="private-office-filter" data-space_reference="private">
					<img src="{{url('/img/SVG_Cowork/private-office-img.svg')}}" alt="shared desk" class="desk-img">
					<p class=" text-light mb-2 pt-2">Private Office</p>
				</li>
			</ul>
			<input type="hidden" id="s_space_reference" value="all">
		</div>
	</div>
	<div class="category mb-5 pt-lg-3">
		<h6 class="r-boldItalic f-9 text-light"><strong>Accomodation Type</strong></h6>
		<div class="row py-2 pr-4 ">
	  		<div class="col-lg-6 col-sm-6 mb-3 mb-lg-0"> 
				<label class="container-2 r-lightItalic f-9 text-light">studio
					<input class="facilities-percent" name="studio" type="radio" value="1">
					<span class="checkmark"></span>
				</label>
			</div>
			<div class="col-lg-6 col-sm-6 mb-3 mb-lg-0"> 
				<label class="container-2 r-lightItalic f-9 text-light">4 BHK
					<input class="facilities-percent" name="studio" type="radio" value="1">
					<span class="checkmark"></span>
				</label>
			</div>
			<div class="col-lg-6 col-sm-6 mb-3 mb-lg-0"> 
				<label class="container-2 r-lightItalic f-9 text-light">3 BHK
					<input class="facilities-percent" name="studio" type="radio" value="1">
					<span class="checkmark"></span>
				</label>
			</div>
			<div class="col-lg-6 col-sm-6 mb-3 mb-lg-0"> 
				<label class="container-2 r-lightItalic f-9 text-light">2 BHK
					<input class="facilities-percent" name="studio" type="radio" value="1">
					<span class="checkmark"></span>
				</label>
			</div>
			<div class="col-lg-6 col-sm-6 mb-3 mb-lg-0"> 
				<label class="container-2 r-lightItalic f-9 text-light">1 BHK
					<input class="facilities-percent" name="studio" type="radio" value="1">
					<span class="checkmark"></span>
				</label>
			</div>

		  		
														
			  		
	  	</div>
		
	</div>
	<div class="category mb-5 pt-lg-3">
		<h6 class="r-boldItalic f-9 text-light"><strong>Facilities</strong></h6>
		<div class="row py-2 pr-4 ">
	  		<div class="col-lg-12 col-sm-6 mb-3 mb-lg-0"> 
				<label class="container-2 r-lightItalic f-9 text-light">TH2.0 Essentials(Wifi, Work Desk, Clean Spaces, Hygiene Essentials)
					<input class="facilities-percent" name="Facilities" type="radio" value="1">
					<span class="checkmark"></span>
				</label>
			</div>
			<div class="col-lg-6 col-sm-6 mb-3 mb-lg-0"> 
				<label class="container-2 r-lightItalic f-9 text-light">Air Conditioner
					<input class="facilities-percent" name="Facilities" type="radio" value="1">
					<span class="checkmark"></span>
				</label>
			</div>
			<div class="col-lg-6 col-sm-6 mb-3 mb-lg-0"> 
				<label class="container-2 r-lightItalic f-9 text-light">Swimming Pool
					<input class="facilities-percent" name="Facilities" type="radio" value="1">
					<span class="checkmark"></span>
				</label>
			</div>
			<div class="col-lg-6 col-sm-6 mb-3 mb-lg-0"> 
				<label class="container-2 r-lightItalic f-9 text-light">Gym
					<input class="facilities-percent" name="Facilities" type="radio" value="1">
					<span class="checkmark"></span>
				</label>
			</div>
				
	  	</div>
		
	</div>
	
	<div class="price-range ">
		<h6 class="mb-3 r-boldItalic f-9 text-light"><strong>Price Range (Per Person) </strong></h6>
		
		<div id="histogramSlider"></div>
		<div class="container pl-0" id="slider-values">
			<div class="row">
				<div class="col-sm-12">
				      <div id="slider-range" class="noUi-target noUi-ltr noUi-horizontal noUi-background"><div class="noUi-base"><div class="noUi-origin noUi-connect" style="left: 0%;"><div class="noUi-handle noUi-handle-lower"></div></div><div class="noUi-origin noUi-background" style="left: 100%;"><div class="noUi-handle noUi-handle-upper"></div></div></div></div>
				</div>
				
			</div>
			<div class="row slider-labels">
				<div class="col-sm-6 caption">
				       <span id="slider-range-value1" class="r-lightItalic f-9 text-light" data-value1="500">₹500</span>
				</div>
				<div class="col-sm-6 text-right caption">
				      <span id="slider-range-value2" class="r-lightItalic f-9 text-light" data-value2="50000">₹50,000</span>+
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
				    <input type="hidden" id="s_min_value" name="min-value" value="1000">
				    <input type="hidden" id="s_max_value" name="max-value" value="50000">
				</div>
			</div>
		</div>

	    <table style="display: none;">
	      <tbody><tr id="data">
	        <th>Value</th>
	        <th>Running Count</th>
	      </tr>
	    </tbody></table>
	</div>
</div>