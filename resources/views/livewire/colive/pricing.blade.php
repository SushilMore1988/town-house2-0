<div>
    <form wire:submit.prevent="store">	
        <div class="row">
            <div class="col-md-7">
                <h6 class=" r-boldItalic f-9 check-label">Currency </h6>
                  <input type="text" name="price" class="form-control w-100" >
              </div>
        </div>	
        <!-- </div>	 -->
        <div class="form-group">
            <h6 class="pb-4 r-boldItalic f-9 check-label">Pricing : Bedroom (1)</h6>
            <div class="row register-form ml-1">
                <div class="col-5 mb-3 pb-2">
                    <label class="r-lightItalic f-9 check-label">Bed / Day :</label>
                </div>
                <div class="col-5 pr-4">
                      <input type="text" name="price" class="form-control w-100" >
                </div>
            </div>
            <div class="row register-form ml-1">
                <div class="col-5 mb-3 pb-2">
                    <i class="r-lightItalic f-9 check-label">Bed / Month :</i>
                </div>
                <div class="col-5 pr-4">
                      <input type="text" name="price" class="form-control w-100" >
                </div>
                
            </div>
            <div class="row register-form ml-1">
                <div class="col-5 mb-3 pb-2">
                    <i class="r-lightItalic f-9 check-label">Bed / Year :</i>
                </div>
                <div class="col-5 pr-4">
                      <input type="text" name="price" class="form-control w-100" >
                </div>
                
            </div>
        </div>
        <div class="form-group">
                <h6 class="py-3 mb-2 r-boldItalic f-9 check-label">Pricing : Bedroom (2)</h6>
            <div class="row register-form ml-1">
                <div class="col-5 mb-3 pb-2">
                    <label class="r-lightItalic f-9 check-label">Bed / Day :</label>
                </div>
                <div class="col-5 pr-4">
                      <input type="text" name="price" class="form-control w-100" >
                </div>
            </div>
            <div class="row register-form ml-1">
                <div class="col-5 mb-3 pb-2">
                    <label class="r-lightItalic f-9 check-label">Bed / Month :</label>
                </div>
                <div class="col-5 pr-4">
                      <input type="text" name="price" class="form-control w-100" >
                </div>
            </div>
            <div class="row register-form ml-1">
                <div class="col-5 mb-3 pb-2">
                    <label class="r-lightItalic f-9 check-label">Bed / Year :</label>
                </div>
                <div class="col-5 pr-4">
                      <input type="text" name="price" class="form-control w-100" >
                </div>
            </div>
        </div>
        <div class="form-group">
            <h6 class="py-3 mb-2 r-boldItalic f-9 check-label">Pricing : Whole Property</h6>
            <div class="row register-form ml-1">
                <div class="col-5 mb-3 pb-2">
                    <label class="r-lightItalic f-9 check-label">Bed / Day :</label>
                </div>
                <div class="col-5 pr-4">
                      <input type="text" name="price" class="form-control w-100" >
                </div>
            </div>
            <div class="row register-form ml-1">
                <div class="col-5 mb-3 pb-2">
                    <label class="r-lightItalic f-9 check-label">Bed / Month :</label>
                </div>
                <div class="col-5 pr-4">
                      <input type="text" name="price" class="form-control w-100" >
                </div>
            </div>
            <div class="row register-form ml-1">
                <div class="col-5 mb-3 pb-2">
                    <label class="r-lightItalic f-9 check-label">Bed / Year :</label>
                </div>
                <div class="col-5 pr-4">
                      <input type="text" name="price" class="form-control w-100" >
                </div>
            </div>
        </div>
        <div class="form-group">
            <h6 class="py-3 mb-2 r-boldItalic f-9 check-label">Other Additional Charges (If any)</h6>
            
            <div class="row register-form ml-1">
                <div class="col-5 mb-3 pb-2">
                    <input type="text" name="price" class="form-control w-100" >
                </div>
                <div class="col-5 pr-4">
                      <input type="text" name="price" class="form-control w-100" >
                </div>
            </div>
        </div>
            <div class="d-flex mt-xl-0 mt-lg-5 pt-xl-5 pt-5">
                <button type="button" wire:click="setSubmitValue('save')" class="btn btn-success n-bold f-9 rounded-0 mr-2 w-100">SAVE</button>
                <button type="button" wire:click="setSubmitValue('saveAndNext')" class="btn btn-success n-bold f-9 rounded-0 ml-2 w-100">SAVE & SUBMIT</button>	
            </div>
        </form>
</div>
