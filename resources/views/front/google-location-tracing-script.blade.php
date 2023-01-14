<script type="text/javascript">
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

    function initAutocomplete() {
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
    }

    // function initMap(){
        
    // }

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

    // This sample uses the Autocomplete widget to help the user select a
    // place, then it retrieves the address components associated with that
    // place, and then it populates the form fields with those details.
    // This sample requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script
    // src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">


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
          setSelectCountry($('#country').val());
        },
        error: function(error){
          console.log(error);
        }
      });
    }

    function setSelectCountry(country){
      var val = $('#filter_country option').filter(function () {
          return $(this).text().trim() == country.trim();
      }).attr("value");
      $('#filter_country').val(val).trigger('change');
      $('#filter_m_country').val(val).trigger('change');
      setTimeout(
        function() 
        {
          setSelectCity($('#locality').val());
        }, 2000);
    }

    function setSelectCity(city){
      var val = $('#select_city option').filter(function () {
          return $(this).text().trim() == city.trim();
      }).attr("value");
      $('#select_city').val(val).trigger('change');
      $('#select_m_city').val(val).trigger('change');
    }
</script>