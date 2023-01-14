<div>
    <form wire:submit.prevent="store">	
        <h6 class="pb-3 r-boldItalic f-9 check-label">Let us know your location</h6>
        <p class="label r-lightItalic f-9 check-label"><small>Address</small></p>
        <div class="input-group mt-2">
            <input type="text" class="w-100 form-control" placeholder="Full Address" id="usr" name="username" />
        </div>
        <div class="input-group mt-2">
            <input type="text" class="w-100 form-control" placeholder="Pincode"  name="pinCode" />
        </div>
        <img src="{{url('/img/filter-map.png') }}" class="w-100" />
        <div class="d-flex mt-xl-0 mt-lg-5 pt-xl-5 pt-5">
            <button type="button" wire:click="setSubmitValue('save')" class="btn btn-success n-bold f-9 rounded-0 mr-2 w-100">SAVE</button>
            <button type="button" wire:click="setSubmitValue('saveAndNext')" class="btn btn-success n-bold f-9 rounded-0 ml-2 w-100">SAVE & SUBMIT</button>	
        </div>
    </form>
</div>
