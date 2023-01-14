<div>
    <div class="mb-2 mt-4">
        <h4 class="mb-3 r-boldItalic f-9 text-body">Provide your current work location to find TH2.0 Locations near your workspace</h4>
    </div>
    <form class="register-form">
        <div class="form-group">
            {{-- <input type="text" name="currenct_work_location_1" class="w-100 form-control" placeholder="NMIMS , Juhu, Mumbai" wire:model="currenct_work_location_1"> --}}
            <input type="text" class="form-control" name="currenct_work_location_1" placeholder="Search your nearest location..." id="currenct_work_location_1" required autocomplete="off" wire:model="currenct_work_location_1">
            @error('currenct_work_location_1') <span class="error d-block invalid-feedback">{{$message}}</span> @enderror
        </div>
        <div class="mb-2 mt-4 ml-5">
            <h4 class="mb-3 r-boldItalic f-9 text-body">AND / OR</h4>
        </div>
        <div class="form-group">
            <input type="text" name="currenct_work_location_2" id="currenct_work_location_2" class=" w-100 form-control" placeholder="Andheri, Vile Parle, Bandra" wire:model="currenct_work_location_2">
            @error('currenct_work_location_2') <span class="error d-block invalid-feedback">{{$message}}</span> @enderror
        </div>
        <div class="mb-2 mt-5">
            <h4 class="mb-3 r-boldItalic f-9 text-body">Preferred mode of Commute</h4>
        </div>
        <div class="row py-2 pr-4 mb-2 ">
            <div class="col-md-4 text-center">
                <div class="form-check-inline">
                  <label class="form-check-label">
                        <img src="{{url('/img/co-living/car.svg')}}" alt="lifestyle" class="mb-2"><br>	
                        <input type="radio" class="form-check-input" name="mode_of_commute" value="private-car" wire:model="mode_of_commute"><br>
                        <span class="r-lightItalic f-9 text-body r-lightItalic f-9 text-body">Private Car / Motorbike</span>
                  </label>
              </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="form-check-inline">
                  <label class="form-check-label">
                        <img src="{{url('/img/co-living/train.svg')}}" alt="lifestyle" class="mb-2"><br>	
                      <input type="radio" class="form-check-input" name="mode_of_commute" value="public-transport" wire:model="mode_of_commute"><br>
                      <span class="r-lightItalic f-9 text-body r-lightItalic f-9 text-body">Public Transport</span>
                  </label>
              </div>
            </div>
            <div class="col-md-2 text-center">
                <div class="form-check-inline">
                  <label class="form-check-label">
                        <img src="{{url('/img/co-living/bycycle.svg')}}" alt="lifestyle" class="mb-2"><br>	
                      <input type="radio" class="form-check-input" name="mode_of_commute" value="bike" wire:model="mode_of_commute"><br>
                      <span class="r-lightItalic f-9 text-body r-lightItalic f-9 text-body">Bike</span>
                  </label>
              </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="form-check-inline">
                  <label class="form-check-label">
                        <img src="{{url('/img/co-living/walk.svg')}}" alt="lifestyle" class="mb-2"><br>	
                      <input type="radio" class="form-check-input" name="mode_of_commute" value="walk" wire:model="mode_of_commute"><br>
                      <span class="r-lightItalic f-9 text-body r-lightItalic f-9 text-body">Walk</span>
                  </label>
              </div>
            </div>
        </div>
        <div class="no-of-people mb-5 mt-5">
          <h6 class="mb-3 r-boldItalic f-9 text-light"><strong>Preferred Time of daily commute ( One Way )</strong></h6>
          <div class="d-flex">
              <span class="circle minus nop_click"><img src="{{url('/img/add-filter-list/minus.jpg')}}" alt="" wire:click="decreaseDailyCommute" class="w-100"/></span>
              <h4 class="px-4 f-16 mb-0 mt-1" id="no-of-people"><span class="num-text">{{empty($time_of_daily_commute)?0:$time_of_daily_commute}}</span> Minutes</h4>
              <span class="circle plus nop_click"><img src="{{url('/img/add-filter-list/plus.jpg')}}" alt="" wire:click="increaseDailyCommute" class="w-100" /></span>
              <input type="hidden" id="time_of_daily_commute" name="time_of_daily_commute">
          </div>
      </div>
      <input type="button" class="d-none" id="save-lp-input" wire:click="update">
    </form>
</div>