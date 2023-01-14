<section class="search-working add-filter top-space pt-sm-4 pt-2 pb-3 border-bottom">
	<div class="container">
		<form class="search-table ">
			<div class="row">
				<div class="col-lg-2 col-md-3 col-sm-4 px-md-0 order-md-1 order-2">
					<div class="filter-btn  order-first order-md-0">
						<button type="button" class="btn btn-info n-bold f-9 text-muted rounded-0 w-100 add-filter px-0 " id="addFilter">REMOVE FILTERS</button>
					</div>
				</div>
				<div class="col-lg-6 col-md-5 col-sm-12 pt-sm-0 order-md-2 order-1">
				    <div class="input-group">
					    <div class="input-group-prepend">
					        <span class="input-group-text rounded-0" style="cursor: pointer;" onclick="document.getElementById('user-location').focus();">
					        	<img src="{{url('/img/SVG_Cowork/search-icon.svg')}}" alt="search-icon" class="search-icon">
					        </span>
					    </div>
					    <input type="hidden" id="street_number" name="street_number">
                        <input type="hidden" id="route" name="route">
                        <input type="hidden" id="locality" name="locality">
                        <input type="hidden" id="administrative_area_level_1" name="administrative_area_level_1">
                        <input type="hidden" id="country" name="country">
                        <input type="hidden" id="postal_code" name="postal_code">
					    <input type="text" class="form-control mb-0 rounded-0 border-left-0 border-right-0 r-lightItalic place-search" value="" placeholder="change location" id="user-location" name="username">
					    <div class="input-group-append rounded-0 allow-to-track-location" title="Auto track my location" style="cursor: pointer;">
						    <span class="input-group-text rounded-0">
						    	<img src="{{url('/img/SVG_Cowork/location-icon.svg')}}" alt="" class="search-icon">
						    </span>
						</div>
				    </div>
				</div>
				<div class="col-md-4 col-sm-8 order-md-3 order-3 pt-sm-0 pt-2">
					<div class="row">

						<div class="col-6 px-md-1 text-center ">
							<div class="filter-btn  order-first order-md-0 ">
								
								<a class="btn btn-info n-bold f-9 text-muted rounded-0 w-100  " href="{{route('colive-list')}}" id="list-view">LIST VIEW</a>
							</div>
						</div>
						<div class="col-6 px-md-1 text-center">

							<div class="filter-btn ">
								
								<a class="btn btn-info n-bold f-9 text-muted rounded-0 w-100  bg-white  " href="{{route('colive-map')}}" id="map-view">MAP VIEW</a>

							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>	
</section>