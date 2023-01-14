<div>
    <form wire:submit.prevent="store">
        <div class="row pb-5 align-items-start">
            <div class="col-md-12">
                <h6 class=" r-boldItalic f-9 check-label">This section is specifically design for events and ads. It would be soon available. Please press save and continue with the next section. </h6>
                  <p class="r-lightItalic f-9 check-label">Please select your package and list your property</p>
              </div>
        </div>
    
        <div class="d-flex align-items-end align-text-bottom">
            <button type="button" wire:click="setSubmitValue('saveAndNext')" class="mt-5 w-100 marketing-btn-next btn btn-success n-bold f-9 rounded-0 ml-2 w-100">Save</button>
        </div>
    </form>
</div>
