<form class="register-form" wire:submit.prevent="addAmenities">  		
    <h6 class="pb-3 r-boldItalic f-9 check-label mb-0">What amenities do you offer</h6>
    @foreach($clsAmenityCategories as $category)
    <h6 class="pb-3 r-boldItalic f-9 check-label mb-0 mt-1">{{$category->name}}</h6>
    <div class="row py-2 pr-4 mb-2">
        @foreach($category->clsAmenityValues as $value)
        <div class="col-lg-4 col-sm-6 mb-3">
            <label class="container-2 r-lightItalic f-9 check-label">{{$value->value}}
              <input type="checkbox" wire:model="amenities" value="{{$value->id}}">
              <span class="checkmark"></span>
            </label>
        </div>
        @endforeach
    </div>
    @endforeach
    <div class="d-flex mt-xl-0 mt-lg-5 pt-xl-5 pt-5">
        <button type="submit" wire:click="setSubmitValue('save')" class="btn btn-success n-bold f-9 rounded-0 mr-2 w-100">SAVE</button>
        <button type="submit" wire:click="setSubmitValue('saveAndNext')" class="btn btn-success n-bold f-9 rounded-0 ml-2 w-100">SAVE & SUBMIT</button>	
    </div>
</form>