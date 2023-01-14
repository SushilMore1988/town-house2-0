<div>
    <form wire:submit.prevent="store">	
        <div class="form-group">
            <i class="label r-boldItalic f-9 check-label">Are guest allowed in the accomodation</i>
              <div class="row p-4">
                  <div class="col-4">
                      <label class="container-2 r-lightItalic f-9 check-label">Yes 
                      <input wire:model="guest_allowed" value="Yes" type="radio" checked="checked" name="accomodation" />
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div class="col-4">
                      <label class="container-2 r-lightItalic f-9 check-label">No
                      <input wire:model="guest_allowed" value="No" type="radio" name="accomodation" />
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div class="col-4">
                      <label class="container-2 r-lightItalic f-9 check-label">On Request
                      <input wire:model="guest_allowed" value="On Request" type="radio" name="accomodation" />
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <i class="label r-boldItalic f-9 check-label">Are pets allowed in the accomodation</i>
              <div class="row p-4">
                  <div class="col-4">
                      <label class="container-2 r-lightItalic f-9 check-label">Yes 
                      <input wire:model="pets_allowed" value="Yes" type="radio" checked="checked" name="pet-accomodation" />
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div class="col-4">
                      <label class="container-2 r-lightItalic f-9 check-label">No
                      <input wire:model="pets_allowed" value="No" type="radio" name="pet-accomodation">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div class="col-4">
                      <label class="container-2 r-lightItalic f-9 check-label">On Request
                      <input wire:model="pets_allowed" value="On Request" type="radio" name="pet-accomodation">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <i class="label r-boldItalic f-9 check-label">Are parties allowed in the accomodation</i>
              <div class="row p-4">
                  <div class="col-4">
                      <label class="container-2 r-lightItalic f-9 check-label">Yes 
                      <input wire:model="parties_allowed" value="Yes" type="radio" checked="checked" name="parties-accomodation" />
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div class="col-4">
                      <label class="container-2 r-lightItalic f-9 check-label">No
                      <input wire:model="parties_allowed" value="No" type="radio" name="parties-accomodation">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div class="col-4">
                      <label class="container-2 r-lightItalic f-9 check-label">On Request
                      <input wire:model="parties_allowed" value="On Request" type="radio" name="parties-accomodation">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
            </div>
            <div class="d-flex mt-xl-0 mt-lg-5 pt-xl-5 pt-5">
                <button type="submit" wire:click="setSubmitValue('save')" class="btn btn-success n-bold f-9 rounded-0 mr-2 w-100">SAVE</button>
                <button type="submit" wire:click="setSubmitValue('saveAndNext')" class="btn btn-success n-bold f-9 rounded-0 ml-2 w-100">SAVE & SUBMIT</button>	
            </div>
        </form>
</div>
