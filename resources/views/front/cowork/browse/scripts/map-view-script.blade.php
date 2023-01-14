<script>
  map = '';
  var markers_list = [];
  var mainArray = [];

<?php 
     $coWorkSpaces = App\Models\Cws::where('status',config('constant.CO_WORK.STATUS.PUBLISED'))->get();

     foreach($coWorkSpaces as $coWorkSpace){ 
        if($coWorkSpace->address){          
          if($coWorkSpace->color_category == 'bronze'){ 
            $icon = url('/img/bronze-map-marker.png');
          }
          else if($coWorkSpace->color_category == 'silver'){ 
            $icon = url('/img/silver-map-marker.png');
          }
          else if($coWorkSpace->color_category == 'gold'){
            $icon = url('/img/gold-map-marker.png');
          }
          $location[] = array('lat' => $coWorkSpace->address['latitude'], 'lng' => $coWorkSpace->address['longitude'], 'coWorkSpaceId' => $coWorkSpace->id, 'icon' => $icon);
        }
      }
  ?>
  //Sushil More
  @if(isset($location))
  var locations = <?php echo json_encode($location, JSON_PRETTY_PRINT); ?>;
  @else
    var locations = [ { 'lat' : 17.689823399999998, 'lng' : 74.0088756 } ];
  @endif
  // console.log(locations);
  mainArray = locations;
  var infowindowContent = '';
 
  let placeSearch;
  let autocomplete;
  let geocoder = '';    

  const componentForm = {
    street_number: "short_name",
    route: "long_name",
    locality: "long_name",
    administrative_area_level_1: "short_name",
    country: "long_name",
    postal_code: "short_name"
  };

  $('#addFilter').click(function(){
    console.log('Map Changed');
		google.maps.event.trigger(map, "resize");
  });

  function initMap() {
     map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: parseFloat(locations[0].lat), lng: parseFloat(locations[0].lng)},
      zoom: 4
    });

    addMarkerToMap(map,locations);

    //for autotrack user location
      geocoder = new google.maps.Geocoder();

      // Create the autocomplete object, restricting the search predictions to
      // geographical location types.
      autocomplete = new google.maps.places.Autocomplete(
        document.getElementById("user-location"),
        { types: ["geocode"] }
      );
      
      // Avoid paying for data that you don't need by restricting the set of
      // place fields that are returned to just the address components.
      autocomplete.setFields(["address_component"]);
      
      // When the user selects an address from the drop-down, populate the
      // address fields in the form.
      autocomplete.addListener("place_changed", fillInAddress);

  }//end of initMap

  function addMarkerToMap(map,locations){
    // console.log(locations);
    var marker;
    var infowindow = new google.maps.InfoWindow({
      //content: infowindowContent
    });

      // console.log(locations);
    for(i = 0; i < locations.length; i++){
      // console.log(locations[i]);
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i].lat, locations[i].lng),
        //label: 'M',
        icon: locations[i].icon,
        animation: google.maps.Animation.DROP,
        map: map
      });

      marker.uniqueID = i;
      // console.log(marker.uniqueID);
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          getCoWorkSpaceDetails(locations[i].coWorkSpaceId).done(function(data){
            console.log(data);
            if(data.success == 'true'){
              $('.single-card').removeClass('d-none');
              $('#co-work-space-name').text(data[0].coWorkSpaceName);
              $('#co-work-space-address').text((data[0].location).substring(0,30));
              $('.currency').text(data[0].currency);

              // $('#private-office').text(data[0].privateOffice);
              // $('#shared-desk').text(data[0].sharedDesk);
              // $('#dedicated-desk').text(data[0].dedicatedDesk);
              // $('#meeting-room').text(data[0].meetingRoom);
              $('#cover_image').attr("src", "{{url('/img/cowork/cover/')}}"+'/'+data[0].coWorkSpaceImage);
              $('#explore').attr("href", "{{url('/explore/')}}"+ '/'+data[0].slug);
              if(data[0].colorCategory=='bronze'){
                $('#colorCategory').addClass('bg-brown border-brown');
                if((parseFloat(data[0].rating) % 1) == 0){
                  $('#colorCategory').find('p').text( data[0].rating+'.0');
                }
                else
                $('#colorCategory').find('p').text( data[0].rating);
              }
              else if(data[0].colorCategory=='silver'){
                $('#colorCategory').addClass('bg-silver border-silver');
                if((parseFloat(data[0].rating) % 1) == 0){
                  $('#colorCategory').find('p').text( data[0].rating+".0");
                }
                else
                  $('#colorCategory').find('p').text( data[0].rating);
              }
              else if(data[0].colorCategory=='gold'){
                $('#colorCategory').addClass('bg-gold border-gold');
                if((parseFloat(data[0].rating) % 1) == 0){
                  $('#colorCategory').find('p').text( data[0].rating+".0");
                }
                else
                  $('#colorCategory').find('p').text( data[0].rating);
              }

              if(data[0].sharedDesk != null){
                   $('#shared-line').removeClass('d-none');
                   $('#shared-desk').text(data[0].sharedDesk);
              }
              else{
                  $('#shared-line').addClass('d-none');
              }

              if(data[0].dedicatedDesk != null){
                   $('#dedicated-line').removeClass('d-none');
                   $('#dedicated-desk').text(data[0].dedicatedDesk);
              }
              else{
                  $('#dedicated-line').addClass('d-none');
              }

              if(data[0].privateOffice != null){
                  $('#private-line').removeClass('d-none');
                  $('#private-office').text(data[0].privateOffice);
              }
              else{
                  $('#private-line').addClass('d-none');
              }

               if(data[0].meetingRoom != null){
                  $('#meeting-line').removeClass('d-none');
                  $('#meeting-room').text(data[0].meetingRoom);
              }
              else{
                  $('#meeting-line').addClass('d-none');
              }


              // if(data[0].dedicatedDesk != null){
              //     $('#dedicated-desk').text(data[0].dedicatedDesk);
              // }
              // if(data[0].sharedDesk != null){
              //   sharedDesk = ` <p class="r-lightItalic f-9 text-light">Shared Desks <span > <strong class="n-bold f-9"> <i>&#8377;</i>`+ data[0].sharedDesk + `</strong> /Mo</span> </p>` ;
              // }
              // else{
              //   sharedDesk=''
              // }
              // if(data[0].dedicatedDesk != null){
              //   dedicatedDesk = `<p class="r-lightItalic f-9 text-light">Dedicated Desks <span > <strong class="n-bold f-9"> <i>&#8377;</i>`+ data[0].dedicatedDesk + `</strong> /Mo</span> </p>`;
              // }
              // else{
              //   dedicatedDesk=''
              // }
              // if(data[0].privateOffice != null){
              //   privateOffice = `<p class="r-lightItalic f-9 text-light">Private Office <span > <strong class="n-bold f-9"> <i>&#8377;</i>`+ data[0].privateOffice + `</strong> /Mo</span> </p>`
              // }
              // else{
              //   privateOffice=''
              // }
              // if(data[0].colorCategory=='bronze'){
              //   colorCategory = `<div class="ratings list-view-rating align-self-center d-flex  bg-brown border-brown pl-2">
              //                       <p class="text-black n-bold f-14 text-center align-self-center mb-0">`+ data[0].rating +`</p>
              //                       </div>`;
              // }
              // else if(data[0].colorCategory=='silver'){

              //   colorCategory = `<div class="ratings list-view-rating align-self-center d-flex  bg-silver border-silver pl-2">
              //                       <p class="text-black n-bold f-14 text-center align-self-center mb-0 ">`+ data[0].rating +`</p>
              //                       </div>`;
              // }
              // else if(data[0].colorCategory=='gold'){

              //   colorCategory = `<div class="ratings list-view-rating align-self-center d-flex  bg-gold border-gold pl-2">
              //                       <p class="text-black n-bold f-14 text-center align-self-center mb-0">`+ data[0].rating +`</p></div>`;
              // }
              // infowindowContent = `<div class="card p-0" style="border: 0px;">
              //     <div class="card-body">
              //       <div class="text-center img-rank">
              //         <img src="`+"{{url('/img/cowork/cover')}}"+ '/' + data[0].coWorkSpaceImage+`" class="img-fluid" alt="" />
              //       </div>
              //       <div class="right-box w-100">
              //         <div class="card-text">
              //           <div class="d-flex justify-content-between  flex-row">
              //             <div class="card-text-left-box d-flex flex-column w-100">
              //               <div class="mb-2">
              //                 <h4 class="n-bold text-dark" style="font-size: 14px;">`+ data[0].coWorkSpaceName +`</h4>
              //                 <i class="r-lightItalic f-9">`+ data[0].location +`</i>
              //               </div>
              //               <div class="card-prices mt-auto">
              //                 <h6 class="r-boldItalic f-9 text-light">Starting prices*</h6>
              //                 `+ sharedDesk + dedicatedDesk + privateOffice+
              //               `</div>
              //             </div>
              //             <div class="card-text-right-box d-flex flex-column justify-content-between align-items-center"> 
              //                <div class="category-type pt-xl-4 text-center pt-lg-4">`+
              //                 colorCategory
              //                +`</div>
              //                <a href={route('front.explore',$coWorkSpace->slug)}} class="btn btn-info n-bold f-6 text-muted rounded-0 ">EXPLORE</a>
              //             </div>
              //           </div>
              //         </div>
              //       </div>
              //     </div>
              //   </div>`;
              // infowindow.setContent(infowindowContent);
              // infowindow.open(map, marker);
              // }
            }else{
              alert('Error in receving data. Please try again.');
            }
          });
        }
      })(marker, i));

      markers_list[locations[i].coWorkSpaceId] = marker;
    }//end of for
  }//end of addMarkerToMap()


  //open infowindow on click of slider images (below google map)
  $(document).on('click', '.infow', function(){
    //console.log('clicked');
    google.maps.event.trigger(markers_list[$(this).data('space-id')], 'click');

  }); 

  // $('#shared-desk-filter').click(function(){
  //   removeMarkers();
  // });
  // function removeMarkers(){
  //   markers_list.forEach(function(marker,index){
  //     marker.setMap(null);
  //   });
  // }

  function getCoWorkSpaceDetails(coWorkSpaceId){
    $('#colorCategory').removeClass('bg-brown border-brown bg-silver border-silver bg-gold border-gold');
    // $('#shared-desk').hide();
    // $('#dedicated-desk').hide();
    // $('#private-office').hide();
    // $('#meeting-room').hide();
    $('#explore').attr("href","");
    return $.ajax({
      url: "{{url('co-work-space/ajax-get-coWorkSpace-detail')}}"+'/'+coWorkSpaceId,
      type: 'GET',       
      success: function(data){
        return data;
      },
      error: function(error){
        // console.log('Ajax Error while fetching data.' + error);
      }
    });
  }
</script>


<script>
  //$(document).ready(function(){
    var input = document.getElementById('place-autocomplete');
    autocomplete = new google.maps.places.Autocomplete(input);  
    //autocomplete.bindTo('bounds', map);


        autocomplete.addListener('place_changed', function(){
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          
          
          //console.log('place : ' + place.name);
          //this.address = document.getElementById('address').value;
          if(!place.geometry){
            window.alert("No details available for input: '" + place.name + "'");
                  return;
          }
          if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
              } 
              else {
                  map.setCenter(place.geometry.location);               
                  map.setZoom(17);  // Why 17? Because it looks good.
              }
              marker.setPosition(place.geometry.location);
              //document.getElementById('latitude').value= place.geometry.location.lat();
              //document.getElementById('longitude').value= place.geometry.location.lng();

              marker.setVisible(true);
              if (place.address_components) {
                  var address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || ''),
                    (place.address_components[3] && place.address_components[3].short_name || '')
                  ].join(', ');
                  //console.log('model address '+this.location.address);
                  document.getElementById('place-autocomplete').value = address;
                  console.log('addres : ' + this.location.address);
              }
        }.bind(this));
  //});  

  //TRACK USER LOCATION 
  //onload get user browser location
    $(document).ready(function(){
        $('.allow-to-track-location').click(function(){          
          console.log('trackMyLocation called');
          trackMyLocation();
        });

        //TODO - if session has location set the don't call this trackMyLocation function. 
        //add your PHP code condition here
        console.log('Session Location: {{session('user-location')}}');
        @if(empty(session('user-location')))          
          trackMyLocation();
        @endif

        function trackMyLocation(){
          console.log('In Tracking my location');
          if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(getGeoCodeAddress);
          } 
          else { 
              var err = "Geolocation is not supported by this browser.";
              console.log(err)
          }
        }        

        function getGeoCodeAddress(position){
            // var geocoder = new google.maps.Geocoder;
            const latLng = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            }
            //console.log(latLng);
            geocoder.geocode({location: latLng}, (results, status) => {
                if(status == 'OK'){
                    if(results[0]){
                        console.log('address: '+extractFromAdress(results[0].address_components, "country"));

                        $('#postal_code').val(extractFromAdress(results[0].address_components, "postal_code"));
                        $('#country').val(extractFromAdress(results[0].address_components, "country"));
                        $('#administrative_area_level_1').val(extractFromAdress(results[0].address_components, "administrative_area_level_1"));
                        $('#locality').val(extractFromAdress(results[0].address_components, "locality"));
                        $('#route').val(extractFromAdress(results[0].address_components, "route"));
                        $('#street_number').val(extractFromAdress(results[0].address_components, "street_number"));

                        var postCode = extractFromAdress(results[0].address_components, "postal_code");
                        var street = extractFromAdress(results[0].address_components, "route");
                        var town = extractFromAdress(results[0].address_components, "locality");
                        var country = extractFromAdress(results[0].address_components, "country");
                        var administrative_area_level_1 = extractFromAdress(results[0].address_components, "administrative_area_level_1");

                        console.log(results[0].formatted_address);
                        $('#user-location').val(results[0].formatted_address);

                        var  address = '{{ Session::has("user-location") }}';
                        if(address != 1){
                          setMyLocationToSession();
                          filterCard();
                          s_country = country;
                          s_city = town;
                        }
                    }
                }
            });//geocoder
        }

        function extractFromAdress(components, type){
            for (var i=0; i<components.length; i++)
                for (var j=0; j<components[i].types.length; j++)
                    if (components[i].types[j]==type) return components[i].long_name;
            return "";
        }
    }); 


    function fillInAddress() {
      // Get the place details from the autocomplete object.
      const place = autocomplete.getPlace();

      for (const component in componentForm) {
        document.getElementById(component).value = "";
        document.getElementById(component).disabled = false;
      }

      // Get each component of the address from the place details,
      // and then fill-in the corresponding field on the form.
      for (const component of place.address_components) {
        const addressType = component.types[0];

        if (componentForm[addressType]) {
          const val = component[componentForm[addressType]];
          document.getElementById(addressType).value = val;
          console.log('Component value: ' + document.getElementById(addressType).value);
        }
      }

      setMyLocationToSession();
    }

    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(position => {
          const geolocation = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };
          const circle = new google.maps.Circle({
            center: geolocation,
            radius: position.coords.accuracy
          });
          autocomplete.setBounds(circle.getBounds());
        });
      }
    }

    $('#user-location').change(function(){ 
      var  address = '{{ Session::has("user-location") }}';
      //if(address != 1){
        setMyLocationToSession();
      //}
    });

    //TODO - set location to server session
    function setMyLocationToSession(){
      var formData  = new FormData();
      // formData.append('street_number', $('#street_number').val());
      // formData.append('route', $('#route').val());
      // formData.append('locality', $('#locality').val());
      // formData.append('administrative_area_level_1', $('#administrative_area_level_1').val());
      // formData.append('country', $('#country').val());
      // formData.append('postal_code', $('#postal_code').val());
      formData.append('user_location', $('#user-location').val());
      formData.append('_token', '{{ csrf_token() }}');
      $.ajax({
        url : '{{route("set.location")}}',
        data: formData,
        type: 'POST',
        processData: false,
        contentType: false,
        success: function(data){
          // setSelectCountry();
        },
        error: function(error){
          // console.log(error);
        }
      });
    }
    //TRACK USER LOCATION 
</script>


{{-- <script src="https://maps.googleapis.com/maps/api/js?key={{Config('constant.GMAP_API_KEY')}}&callback=initMap"></script> --}}