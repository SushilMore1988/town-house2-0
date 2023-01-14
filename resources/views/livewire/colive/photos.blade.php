<div>
    <form wire:submit.prevent="store">
        <h6 class="pb-3 r-boldItalic f-9 check-label">Upload Miscellaneous Photos of your Co-Living Space (Optional)</h6>
        <div class="uploaded-img">
            <ul class="d-flex flex-wrap pl-0">
                <li class="border position-relative">
                    <div class="overlay position-absolute d-flex justify-content-center">
                        <div class="progress w-75 d-flex align-self-center">
                            <div class="progress-bar" style="width:70%"></div>
                        </div>
                    </div>
                    <img src="../img/map-img-5.png" alt="" class="h-100 w-auto">
                </li>
                <li class="border position-relative addDelete-img">
                    <div class="overlay position-absolute d-flex justify-content-center">
                        <!-- <i class="fa fa-trash float-right text-danger" aria-hidden="true"></i> -->
                        <a href="#">
                            <i class="far fa-check-circle float-right text-success"></i>
                        </a>
                    </div>
                    <img src="../img/Asset 8.png" alt="" class="h-100 w-auto">
                </li>
                <li class="border position-relative addDelete-img">
                    <div class="overlay position-absolute d-flex justify-content-center danger-border">
                        <p class="text-danger f-8 d-flex align-self-center mb-0 justify-content-center text-center">Failed Uploading</p>
                        <a href="#" class="minus-border">
                            <!-- <i class="fa fa-minus float-right text-danger" aria-hidden="true"></i> -->
                            <i class="fas fa-minus-circle float-right text-danger"></i>
                        </a>
                    </div>
                    <img src="../img/map-img-6.png" alt="" class="h-100 w-auto">
                </li>	
                <li class="border">
                    
                </li>
                <li class="border">
                    
                </li>
                <li class="border">
                    
                </li>
                <li class="border">
                    
                </li>
                <li class="border">
                    
                </li>
                <li class="border">
                    
                </li>
                <li class="border drag-container">
                    <img src="../img/plus-sign.svg" class="img-fluid w-100" alt="" />
                </li>
                
            </ul>
        </div>
        
        <div class="upload-photo">
            <form action="/" method="post" class="dropzone" id="my-awesome-dropzone">
                <i class="upload-text text-center r-lightItalic f-9 check-label">Drag and Drop images (File Formats: .jpeg, .png, .pdf) (Maximum Image Size: 25mb)</i><br>
            </form>
        </div>
        <div class="d-flex mt-xl-0 mt-lg-5 pt-xl-5 pt-5">
                <button type="button" wire:click="setSubmitValue('save')" class="btn btn-success n-bold f-9 rounded-0 mr-2 w-100">SAVE</button>
                <button type="button" wire:click="setSubmitValue('saveAndNext')" class="btn btn-success n-bold f-9 rounded-0 ml-2 w-100">SAVE & SUBMIT</button>	
            </div>
        </form>
</div>
