<div>
    <form wire:submit.prevent="addAccomodations">
        <div class="px-3">
            <h6 class="pb-3 r-boldItalic f-9 check-label mb-0">Is your Property available for :</h6>
            <!-- <div class="container"> -->
              <div class="row py-2  mb-2">
                  <div class="col-md-6 mx-auto">
                      <div class="row">
                          <div class="col-lg-2 col-4 mb-3 mb-lg-0 text-center d-flex justify-content-center flex-column mx-sm-auto">
                              <label class="container-2 colive-container-2 r-lightItalic f-9 check-label r-lightItalic f-9 check-label "><br>
                                  <p class="mb-3">Private</p> 
                              <input type="radio" checked="checked" name="property-available">
                              <span class="checkmark"></span>
                              <div class="box pink d-flex justify-content-center align-items-center">
                                  <p class="text-white mb-0 n-bold f-16">P</p>
                              </div>
                            </label>
                          </div>
                          <div class="col-lg-2 col-4 mb-3 mb-lg-0 text-center d-flex justify-content-center flex-column mx-sm-auto">
                              <label class="container-2 colive-container-2 r-lightItalic f-9 check-label r-lightItalic f-9 check-label "><br>
                                  <p class="mb-3">Shared</p> 
                              <input type="radio" checked="checked" name="property-available">
                              <span class="checkmark"></span>
                              <div class="box blue d-flex justify-content-center align-items-center">
                                  <p class="text-white mb-0 n-bold f-16">S</p>
                              </div>
                            </label>
                          </div>
                          <div class="col-lg-2 col-4 mb-3 mb-lg-0 text-center d-flex justify-content-center flex-column mx-sm-auto">
                              <label class="container-2 colive-container-2 r-lightItalic f-9 check-label r-lightItalic f-9 check-label "><br>
                                  <p class="mb-3">Both</p> 
                              <input type="radio" checked="checked" name="property-available">
                              <span class="checkmark"></span>
                              <div class="box yellow d-flex justify-content-center align-items-center">
                                  <p class="text-black mb-0 n-bold f-16">B</p>
                              </div>
                            </label>
                          </div>
                      </div>
                  </div>
                </div>
                <h6 class="pb-3 r-boldItalic f-9 check-label mb-0 mt-4">Fundamentals of a house :</h6>
                <div class="row py-2  mb-2">
                  <div class="col-md-10 mx-auto">
                      <div class="row">
                          <div class="col-lg-2 col-4 mb-3 mb-lg-0 text-center d-flex justify-content-center flex-column mx-sm-auto">
                              <label class="container-2 colive-container-2 r-lightItalic f-9 check-label r-lightItalic f-9 check-label "><br>
                                  <p class="mb-3">Living</p> 
                              <input type="radio" checked="checked" name="house">
                              <span class="checkmark"></span>
                              <div class="box blue d-flex justify-content-center align-items-center">
                                  <p class="text-white mb-0 n-bold f-16">L</p>
                              </div>
                            </label>
                          </div>
                          <div class="col-lg-2 col-4 mb-3 mb-lg-0 text-center d-flex justify-content-center flex-column mx-sm-auto">
                              <label class="container-2 colive-container-2 r-lightItalic f-9 check-label r-lightItalic f-9 check-label "><br>
                                  <p class="mb-3">Kitchen</p> 
                              <input type="radio" checked="checked" name="house">
                              <span class="checkmark"></span>
                              <div class="box blue d-flex justify-content-center align-items-center">
                                  <p class="text-white mb-0 n-bold f-16">K</p>
                              </div>
                            </label>
                          </div>
                          
                          <div class="col-lg-2 col-4 mb-3 mb-lg-0 text-center d-flex justify-content-center flex-column mx-sm-auto">
                              <label class="container-2 colive-container-2 r-lightItalic f-9 check-label r-lightItalic f-9 check-label "><br>
                                  <p class="mb-3">Dinning</p> 
                              <input type="radio" checked="checked" name="house">
                              <span class="checkmark"></span>
                              <div class="box blue d-flex justify-content-center align-items-center">
                                  <p class="text-white mb-0 n-bold f-16">D</p>
                              </div>
                            </label>
                          </div>
                          <div class="col-lg-2 col-4 mb-3 mb-lg-0 text-center d-flex justify-content-center flex-column mx-lg-auto">
                              <label class="container-2 colive-container-2 r-lightItalic f-9 check-label r-lightItalic f-9 check-label "><br>
                                  <p class="mb-3">Bedroom</p> 
                              <input type="radio" checked="checked" name="house">
                              <span class="checkmark"></span>
                              <div class="box pink d-flex justify-content-center align-items-center">
                                  <p class="text-white mb-0 n-bold f-16">BR</p>
                              </div>
                            </label>
                          </div>
                          <div class="col-lg-2 col-4 mb-3 mb-lg-0 text-center d-flex justify-content-center flex-column mx-lg-auto">
                              <label class="container-2 colive-container-2 r-lightItalic f-9 check-label r-lightItalic f-9 check-label "><br>
                                  <p class="mb-3">Toilet</p> 
                              <input type="radio" checked="checked" name="house">
                              <span class="checkmark"></span>
                              <div class="box blue d-flex justify-content-center align-items-center">
                                  <p class="text-white mb-0 n-bold f-16">B</p>
                              </div>
                            </label>
                          </div>
                      </div>
                  </div>
                </div>
        </div>
            <!-- <div class="container"> -->
        <div id="accordion" class="accordion">
            <div class="card mb-0 rounded-0 border-0">
                <div class="card-header collapsed rounded-0 d-flex justify-content-between" data-toggle="collapse" href="#collapseOne">
                    <div class="row w-100">
                        <div class="col-md-3 ">
                            <a href="#" class="mb-0 r-boldItalic f-9 check-label"> Living </a>
                        </div>
                        <div class="col-md-4 numberRoom">
                            <p class="mb-0 r-lightItalic f-9 check-label">Number of Rooms : <span>1</span></p>
                        </div>
                        <div class="col-md-4 numberRoom">
                            <p class="mb-0 r-lightItalic f-9 check-label">Room Type : <span>Shared</span></p>
                        </div>
                    </div>
                </div>
                <div id="collapseOne" class="card-body collapse show" data-parent="#accordion">
                    <div class="form-group">
                       <p class="label r-lightItalic f-9 check-label mb-0">Number of Living Rooms </p>
                        <div class="d-flex align-items-center pt-2 pb-4 ml-3">
                            <span class="circle plus"><img src="{{url('/img/add-filter-list/plus.jpg')}}" alt="" /></span>
                            <h4 class="px-5 num n-bold f-22 pt-2"><small>01</small></h4>
                            <span class="circle minus"><img src="{{url('/img/add-filter-list/minus.jpg')}}" alt="" /></span>
                        </div>
                         <p class="label r-boldItalic f-9 check-label">Living Rooms <span> (1)</span> </p>
                    </div>
                    <div class="form-group">
                        <p class="label r-lightItalic f-9 check-label">Living Rooms Type</p>
                        <div class="row py-2">
                              <div class="col-sm-4 col-6" >
                                  <label class="container-2 r-lightItalic f-9 check-label">Shared 
                                  <input type="radio" checked="checked" name="roomsType">
                                  <span class="checkmark"></span>
                                </label>
                              </div>
                              <div class="col-sm-4 col-6">
                                  <label class="container-2 r-lightItalic f-9 check-label">Private
                                  <input type="radio" name="roomsType">
                                  <span class="checkmark"></span>
                                </label>
                              </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <i class="label r-lightItalic f-9 check-label">Approximate Area of the Living Room</i>
                        <div class="register-form ml-3">
                            <div class="d-flex-inline pt-2 pb-4">
                                  <input type="text" name="Twitter URL" class="w-50" />
                              </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="label r-lightItalic f-9 check-label">Furnishing Type</p>
                        <div class="row py-2">
                              <div class="col-sm-4 col-12">
                                  <label class="container-2 r-lightItalic f-9 check-label">Fully Furnished 
                                  <input type="radio" checked="checked" name="furnishingType">
                                  <span class="checkmark"></span>
                                </label>
                              </div>
                              <div class="col-sm-4 col-12">
                                  <label class="container-2 r-lightItalic f-9 check-label">Semi Furnished 
                                  <input type="radio" name="furnishingType">
                                  <span class="checkmark"></span>
                                </label>
                              </div>
                              <div class="col-sm-4 col-12">
                                  <label class="container-2 r-lightItalic f-9 check-label">Unfurnished 
                                  <input type="radio" name="furnishingType">
                                  <span class="checkmark"></span>
                                </label>
                              </div>
                            </div>
                        </div>
                        <div class="form-group">
                        <p class="label r-lightItalic f-9 check-label">Furnishing Detail</p>
                        <div class="row py-2">
                              <div class="col-12">
                                  <select class="w-100 form-control">
                                      <option value="1">option</option>
                                      
                                  </select>
                              </div>
                              
                            </div>
                        </div>
                        <div class="form-group">
                       <p class="label r-lightItalic f-9 check-label mb-0">Sofa </p>
                        <div class="d-flex align-items-center pt-2 pb-4 ml-3">
                            <span class="circle plus"><img src="{{url('/img/add-filter-list/plus.jpg')}}" alt="" /></span>
                            <h4 class="px-5 num n-bold f-22 pt-2"><small>01</small></h4>
                            <span class="circle minus"><img src="{{url('/img/add-filter-list/minus.jpg')}}" alt="" /></span>
                        </div>
                    </div>
                    <div class="form-group">
                       <p class="label r-lightItalic f-9 check-label mb-0">Bean Bag </p>
                        <div class="d-flex align-items-center pt-2 pb-4 ml-3">
                            <span class="circle plus"><img src="{{url('/img/add-filter-list/plus.jpg')}}" alt="" /></span>
                            <h4 class="px-5 num n-bold f-22 pt-2"><small>01</small></h4>
                            <span class="circle minus"><img src="{{url('/img/add-filter-list/minus.jpg')}}" alt="" /></span>
                        </div>
                    </div>
                    <div class="form-group">
                       <p class="label r-lightItalic f-9 check-label mb-0">Upload Pictures </p>
                        <div class="uploaded-img pt-3">
                            <ul class="d-flex flex-wrap pl-0">
                                <li class="border position-relative">
                                    <div class="overlay position-absolute d-flex justify-content-center">
                                        <div class="progress w-75 d-flex align-self-center">
                                            <div class="progress-bar" style="width:70%"></div>
                                        </div>
                                    </div>
                                    <img src="{{url('/img/map-img-5.png')}}" alt="" class="h-100 w-auto">
                                </li>
                                <li class="border position-relative addDelete-img">
                                    <div class="overlay position-absolute d-flex justify-content-center">
                                        <!-- <i class="fa fa-trash float-right text-danger" aria-hidden="true"></i> -->
                                        <a href="#">
                                            <i class="far fa-check-circle float-right text-success"></i>
                                        </a>
                                    </div>
                                    <img src="{{url('/img/Asset 8.png')}}" alt="" class="h-100 w-auto">
                                </li>
                                <li class="border position-relative addDelete-img">
                                    <div class="overlay position-absolute d-flex justify-content-center danger-border">
                                        <p class="text-danger f-8 d-flex align-self-center mb-0 justify-content-center text-center">Failed Uploading</p>
                                        <a href="#" class="minus-border">
                                            <!-- <i class="fa fa-minus float-right text-danger" aria-hidden="true"></i> -->
                                            <i class="fas fa-minus-circle float-right text-danger"></i>
                                        </a>
                                    </div>
                                    <img src="{{url('/img/map-img-6.png')}}" alt="" class="h-100 w-auto">
                                </li>	
                                <li class="border">
                                    
                                </li>
                                <li class="border">
                                    
                                </li>
                                <li class="border">
                                    
                                </li>
                                <li class="border drag-container">
                                    <img src="{{url('/img/plus-sign.svg')}}" class="img-fluid w-100" alt="" />
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-0 rounded-0 border-0">
                <div class="card-header collapsed d-flex justify-content-between" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                    <div class="row w-100">
                        <div class="col-md-3 ">
                            <a href="#" class="mb-0 r-boldItalic f-9 check-label"> Kitchen </a>
                        </div>
                        <div class="col-md-4 numberRoom">
                            <p class="mb-0 r-lightItalic f-9 check-label">Number of Rooms : <span>1</span></p>
                        </div>
                        <div class="col-md-4 numberRoom">
                            <p class="mb-0 r-lightItalic f-9 check-label">Room Type : <span>Shared</span></p>
                        </div>
                    </div>
                </div>
                <div id="collapseTwo" class="card-body collapse" data-parent="#accordion">
                    <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>
                </div>
            </div>
            <div class="card mb-0 rounded-0 border-0">
                <div class="card-header collapsed d-flex justify-content-between" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                    <div class="row w-100">
                        <div class="col-md-3 ">
                            <a href="#" class="mb-0 r-boldItalic f-9 check-label"> Dinning</a>
                        </div>
                        <div class="col-md-4 numberRoom">
                            <p class="mb-0 r-lightItalic f-9 check-label">Number of Rooms : <span>1</span></p>
                        </div>
                        <div class="col-md-4 numberRoom">
                            <p class="mb-0 r-lightItalic f-9 check-label">Room Type : <span>Shared</span></p>
                        </div>
                    </div>
                </div>
                <div id="collapseThree" class="collapse card-body" data-parent="#accordion">
                    <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. samus labore sustainable VHS. </div>
                </div>
            </div>
            <div class="card mb-0 rounded-0 border-0">
                <div class="card-header collapsed d-flex justify-content-between" data-toggle="collapse" data-parent="#accordion" href="#collapsefour">
                    <div class="row w-100">
                        <div class="col-md-3">
                            <a href="#" class="mb-0 r-boldItalic f-9 check-label"> Bedroom</a>
                        </div>
                        <div class="col-md-4 numberRoom">
                            <p class="mb-0 r-lightItalic f-9 check-label">Number of Bedrooms : <span>1</span></p>
                        </div>
                        <div class="col-md-4 numberRoom">
                            <p class="mb-0 r-lightItalic f-9 check-label">Room Type : <span>Shared</span></p>
                        </div>
                    </div>
                </div>
                <div id="collapsefour" class="collapse card-body" data-parent="#accordion">
                    <div class="form-group">
                       <p class="label r-lightItalic f-9 check-label mb-0">Number of Bedrooms </p>
                        <div class="d-flex align-items-center pt-2 pb-4 ml-3">
                            <span class="circle plus"><img src="{{url('/img/add-filter-list/plus.jpg')}}" alt="" /></span>
                            <h4 class="px-5 num n-bold f-22 pt-2"><small>01</small></h4>
                            <span class="circle minus"><img src="{{url('/img/add-filter-list/minus.jpg')}}" alt="" /></span>
                        </div>
                         <p class="label r-boldItalic f-9 check-label">Bedrooms <span> (1)</span> </p>
                    </div>
                    <div class="form-group">
                        <p class="label r-lightItalic f-9 check-label">Bedrooms Type</p>
                        <div class="row py-2">
                              <div class="col-sm-4 col-6">
                                  <label class="container-2 r-lightItalic f-9 check-label">Shared 
                                  <input type="radio" checked="checked" name="bedroomsType">
                                  <span class="checkmark"></span>
                                </label>
                              </div>
                              <div class="col-sm-4 col-6">
                                  <label class="container-2 r-lightItalic f-9 check-label">Private
                                  <input type="radio" name="bedroomsType">
                                  <span class="checkmark"></span>
                                </label>
                              </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <i class="label r-lightItalic f-9 check-label">Approximate Area of the Bedoom</i>
                        <div class="register-form ml-3">
                            <div class="d-flex-inline pt-2 pb-4">
                                  <input type="text" name="Twitter URL" class="w-50" />
                              </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="label r-lightItalic f-9 check-label">Furnishing Type</p>
                        <div class="row py-2">
                              <div class="col-sm-4">
                                  <label class="container-2 r-lightItalic f-9 check-label">Fully Furnished 
                                  <input type="radio" checked="checked" name="bedfurnishingType">
                                  <span class="checkmark"></span>
                                </label>
                              </div>
                              <div class="col-sm-4">
                                  <label class="container-2 r-lightItalic f-9 check-label">Semi Furnished 
                                  <input type="radio" name="bedfurnishingType">
                                  <span class="checkmark"></span>
                                </label>
                              </div>
                              <div class="col-sm-4">
                                  <label class="container-2 r-lightItalic f-9 check-label">Unfurnished 
                                  <input type="radio" name="bedfurnishingType">
                                  <span class="checkmark"></span>
                                </label>
                              </div>
                            </div>
                        </div>
                        <div class="form-group">
                        <p class="label r-lightItalic f-9 check-label">Furnishing Detail</p>
                        <div class="row py-2">
                              <div class="col-12">
                                  <select class="w-100 form-control">
                                      <option value="1">option</option>
                                      
                                  </select>
                              </div>
                              
                            </div>
                        </div>
                        <div class="form-group">
                       <p class="label r-lightItalic f-9 check-label mb-0">Sofa </p>
                        <div class="d-flex align-items-center pt-2 pb-4 ml-3">
                            <span class="circle plus"><img src="{{url('/img/add-filter-list/plus.jpg')}}" alt="" /></span>
                            <h4 class="px-5 num n-bold f-22 pt-2"><small>01</small></h4>
                            <span class="circle minus"><img src="{{url('/img/add-filter-list/minus.jpg')}}" alt="" /></span>
                        </div>
                    </div>
                    <div class="form-group">
                       <p class="label r-lightItalic f-9 check-label mb-0">Bean Bag </p>
                        <div class="d-flex align-items-center pt-2 pb-4 ml-3">
                            <span class="circle plus"><img src="{{url('/img/add-filter-list/plus.jpg')}}" alt="" /></span>
                            <h4 class="px-5 num n-bold f-22 pt-2"><small>01</small></h4>
                            <span class="circle minus"><img src="{{url('/img/add-filter-list/minus.jpg')}}" alt="" /></span>
                        </div>
                    </div>
                    <div class="form-group">
                       <p class="label r-lightItalic f-9 check-label mb-0">Upload Pictures </p>
                        <div class="uploaded-img pt-3">
                            <ul class="d-flex flex-wrap pl-0">
                                <li class="border position-relative">
                                    <div class="overlay position-absolute d-flex justify-content-center">
                                        <div class="progress w-75 d-flex align-self-center">
                                            <div class="progress-bar" style="width:70%"></div>
                                        </div>
                                    </div>
                                    <img src="{{url('/img/map-img-5.png')}}" alt="" class="h-100 w-auto">
                                </li>
                                <li class="border position-relative addDelete-img">
                                    <div class="overlay position-absolute d-flex justify-content-center">
                                        <!-- <i class="fa fa-trash float-right text-danger" aria-hidden="true"></i> -->
                                        <a href="#">
                                            <i class="far fa-check-circle float-right text-success"></i>
                                        </a>
                                    </div>
                                    <img src="{{url('/img/Asset 8.png')}}" alt="" class="h-100 w-auto">
                                </li>
                                <li class="border position-relative addDelete-img">
                                    <div class="overlay position-absolute d-flex justify-content-center danger-border">
                                        <p class="text-danger f-8 d-flex align-self-center mb-0 justify-content-center text-center">Failed Uploading</p>
                                        <a href="#" class="minus-border">
                                            <!-- <i class="fa fa-minus float-right text-danger" aria-hidden="true"></i> -->
                                            <i class="fas fa-minus-circle float-right text-danger"></i>
                                        </a>
                                    </div>
                                    <img src="{{url('/img/map-img-6.png')}}" alt="" class="h-100 w-auto">
                                </li>	
                                <li class="border">
                                    
                                </li>
                                <li class="border">
                                    
                                </li>
                                <li class="border">
                                    
                                </li>
                                <li class="border drag-container">
                                    <img src="{{url('/img/plus-sign.svg')}}" class="img-fluid w-100" alt="" />
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-0 rounded-0 border-0">
                <div class="card-header collapsed d-flex justify-content-between" data-toggle="collapse" data-parent="#accordion" href="#collapsefive">
                    <div class="row w-100">
                        <div class="col-md-3 ">
                            <a href="#" class="mb-0 r-boldItalic f-9 check-label"> Toilet (Informal)</a>
                        </div>
                        <div class="col-md-4 numberRoom">
                            <p class="mb-0 r-lightItalic f-9 check-label">Number of Rooms : <span>1</span></p>
                        </div>
                        <div class="col-md-4 numberRoom">
                            <p class="mb-0 r-lightItalic f-9 check-label">Room Type : <span>Shared</span></p>
                        </div>
                    </div>
                </div>
                <div id="collapsefive" class="collapse card-body" data-parent="#accordion">
                    <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. samus labore sustainable VHS. </div>
                </div>
            </div>
            <div class="card mb-0 rounded-0 border-0">
                <div class="card-header collapsed d-flex justify-content-between" data-toggle="collapse" data-parent="#accordion" href="#collapsesix">
                    <div class="row w-100">
                        <div class="col-md-3 ">
                            <a href="#" class="mb-0 r-boldItalic f-9 check-label"> Other Spaces</a>
                        </div>
                        <div class="col-md-4 numberRoom">
                            <p class="mb-0 r-lightItalic f-9 check-label">Number of Rooms : <span>1</span></p>
                        </div>
                        <div class="col-md-4 numberRoom">
                            <p class="mb-0 r-lightItalic f-9 check-label">Room Type : <span>Shared</span></p>
                        </div>
                    </div>
                </div>
                <div id="collapsesix" class="collapse card-body" data-parent="#accordion">
                    <div class="form-group">
                       <p class="label r-lightItalic f-9 check-label mb-0">Upload Pictures of Surrounding area other Common/Private Spaces and Caption them</p>
                        <div class="uploaded-img pt-3">
                            <ul class="d-flex flex-wrap pl-0">
                                <li class="border position-relative">
                                    <div class="overlay position-absolute d-flex justify-content-center">
                                        <div class="progress w-75 d-flex align-self-center">
                                            <div class="progress-bar" style="width:70%"></div>
                                        </div>
                                    </div>
                                    <img src="{{url('/img/map-img-5.png')}}" alt="" class="h-100 w-auto">
                                </li>
                                <li class="border position-relative addDelete-img">
                                    <div class="overlay position-absolute d-flex justify-content-center">
                                        <!-- <i class="fa fa-trash float-right text-danger" aria-hidden="true"></i> -->
                                        <a href="#">
                                            <i class="far fa-check-circle float-right text-success"></i>
                                        </a>
                                    </div>
                                    <img src="{{url('/img/Asset 8.png')}}" alt="" class="h-100 w-auto">
                                </li>
                                <li class="border position-relative addDelete-img">
                                    <div class="overlay position-absolute d-flex justify-content-center danger-border">
                                        <p class="text-danger f-8 d-flex align-self-center mb-0 justify-content-center text-center">Failed Uploading</p>
                                        <a href="#" class="minus-border">
                                            <!-- <i class="fa fa-minus float-right text-danger" aria-hidden="true"></i> -->
                                            <i class="fas fa-minus-circle float-right text-danger"></i>
                                        </a>
                                    </div>
                                    <img src="{{url('/img/map-img-6.png')}}" alt="" class="h-100 w-auto">
                                </li>	
                                <li class="border">
                                    
                                </li>
                                <li class="border">
                                    
                                </li>
                                <li class="border">
                                    
                                </li>
                                <li class="border drag-container">
                                    <img src="{{url('/img/plus-sign.svg')}}" class="img-fluid w-100" alt="" />
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex mt-xl-0 mt-lg-5 pt-xl-5 pt-5 px-3">
            <button type="button" wire:click="setSubmitValue('save')" class="btn btn-success n-bold f-9 rounded-0 mr-2 w-100">SAVE</button>
            <button type="button" wire:click="setSubmitValue('saveAndNext')" class="btn btn-success n-bold f-9 rounded-0 ml-2 w-100">SAVE & SUBMIT</button>	
        </div>
    </form>
</div>
