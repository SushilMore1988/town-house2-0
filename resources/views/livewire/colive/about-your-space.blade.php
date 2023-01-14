<form class="register-form" wire:submit.prevent="saveAboutInfo">
    <div class="mb-2">
        <h4 class="mb-3 r-boldItalic f-9 text-body">General Information</h4>
    </div>
    <div class="form-group">
        <input wire:model.debounce.500ms="name" type="text" name="co-working" class=" w-100 form-control" placeholder="Name of the Co-Living Space/ House/ Apartment/ Hostel/ Paying Guest Accomodation">
        @error('name')
            <span class="invalid-feedback d-block">
                {{$message}}
            </span>
        @enderror
    </div>
    <div class="form-group">
        <textarea wire:model.debounce.500ms="description" rows="4" cols="50" class="w-100 form-control" placeholder="Description"></textarea>
        @error('description')
            <span class="invalid-feedback d-block">
                {{$message}}
            </span>
        @enderror
    </div>
    <div class="mb-2 form-group">
        <h4 class="mb-3 pt-3 r-boldItalic f-9 text-body">Contact Details</h4>
    </div>
    <div class="d-block form-group">
        <input wire:model.debounce.500ms="email" type="text" name="email" class="w-100 form-control" placeholder= "Email" />
        @error('email')
            <span class="invalid-feedback d-block">
                {{$message}}
            </span>
        @enderror
    </div>
    <div class="d-block form-group">
        <input wire:model.debounce.500ms="phone" type="text" name="phone" class=" w-100 form-control" placeholder="Phone">
        @error('phone')
            <span class="invalid-feedback d-block">
                {{$message}}
            </span>
        @enderror
    </div>
    <div class="d-block mb-3">
        <input wire:model.debounce.500ms="website" type="text" name="website" class=" w-100 form-control" placeholder="Website">
        @error('website')
            <span class="invalid-feedback d-block">
                {{$message}}
            </span>
        @enderror
    </div>
    <div class="d-block form-group">
        <input wire:model.debounce.500ms="facebook" type="text" name="facebook URL" class="w-100 form-control" placeholder="Facebook URL">
        @error('facebook')
            <span class="invalid-feedback d-block">
                {{$message}}
            </span>
        @enderror
    </div>
    
  <div class="d-block  form-group">
        <input wire:model.debounce.500ms="twitter" type="text" name="Twitter URL" class="w-100 form-control" placeholder="Twitter URL">
        @error('twitter')
            <span class="invalid-feedback d-block">
                {{$message}}
            </span>
        @enderror
    </div>
    <div class="d-block form-group">
        <input wire:model.debounce.500ms="instagram" type="text" name="insta URL" class=" w-100 form-control" placeholder="Instagram URL">
        @error('instagram')
            <span class="invalid-feedback d-block">
                {{$message}}
            </span>
        @enderror
    </div>
    <h4 class="pt-3 r-boldItalic f-9 text-body">Information</h4>
    <div class="d-block mt-3">
        <input wire:model.debounce.500ms="info" type="text" name="insta URL" class=" w-100 form-control" placeholder="Description stating some special and distinct features of your space ">
        @error('info')
            <span class="invalid-feedback d-block">
                {{$message}}
            </span>
        @enderror
    </div>
    <h4 class="pt-4 mt-2 r-boldItalic f-9 text-body">Notification Center <i><small class="r-lightItalic">(Kindly let us know your email ID where you would like to recieve notification from the members)</small> </i></h4>
    
    <div class="d-block mt-3">
        <input wire:model.debounce.500ms="notify_email" type="text" name="email-2" class="common-field w-100 form-control" placeholder="Email">
        @error('notify_email')
            <span class="invalid-feedback d-block">
                {{$message}}
            </span>
        @enderror
    </div>
    
      
    
    <div class="d-flex mt-xl-0 mt-lg-5 pt-xl-5 pt-5">
      <button type="submit" wire:click="setSubmitValue('save')" value="save" class="btn btn-success n-bold f-9 rounded-0 mr-2 w-100">SAVE</button>
      <button type="submit" wire:click="setSubmitValue('saveAndNext')" value="save & next" class="btn btn-success n-bold f-9 rounded-0 ml-2 w-100">SAVE & SUBMIT</button>	
    </div>
</form>