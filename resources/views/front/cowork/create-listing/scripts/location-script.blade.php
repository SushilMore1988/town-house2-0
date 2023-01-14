 <script>
 	if (window.google) $(function() {
    	$(document).ready(function(){
    		var componentForm = {
			  street_number: 'long_name',
			  route: 'long_name',
			  locality: 'long_name',
			  administrative_area_level_1: 'long_name',
			  country: 'long_name',
			  place_id: 'place_id',
			  postal_code: 'short_name'
			};

    		var mapName = 'map-12';
    		const element = document.getElementById('mapName');
			var input = document.getElementById('address');
			var marker;
    		const options = {
				zoom: 14,
				@if(isset($coWorkSpace->address['latitude']) && $coWorkSpace->address['longitude'])
					center: new google.maps.LatLng({{$coWorkSpace->address['latitude']}},{{$coWorkSpace->address['longitude']}})
				@else
					center: new google.maps.LatLng(18.5204,73.8567)
				@endif
			}

			const map = new google.maps.Map(element, options);

			@if(isset($coWorkSpace->address['latitude']) && $coWorkSpace->address['longitude'])
				const position = new google.maps.LatLng({{$coWorkSpace->address['latitude']}},{{$coWorkSpace->address['longitude']}})
			@else
				const position = new google.maps.LatLng(18.5204, 73.8567);
			@endif
			marker = new google.maps.Marker({
					position: position,
					map: map,
					draggable: true
			});

			var autocomplete = new google.maps.places.Autocomplete(input, {types: ['geocode']});
			autocomplete.bindTo('bounds', map);


			autocomplete.addListener('place_changed', function(){
				marker.setVisible(false);
				var place = autocomplete.getPlace();
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
		        document.getElementById('latitude').value= place.geometry.location.lat();
		        document.getElementById('longitude').value= place.geometry.location.lng();

		        marker.setVisible(true);
		        if (place.address_components) {
		            for (var i = 0; i < place.address_components.length; i++) {
					    var addressType = place.address_components[i].types[0];
					    console.log('address type : ' + addressType);
					    if (componentForm[addressType]) {
					      var val = place.address_components[i][componentForm[addressType]];
					      console.log('address type : ' + addressType + ':' + val);
					    }
					}
	          	}
			}.bind(this));

			// This event listener calls addMarker() when the map is clicked.
			google.maps.event.addListener(map, 'click', function(event) {
				addMarker(event.latLng, map);
				geocodePosition(event.latLng);
			});

			// Adds a marker to the map.
			function addMarker(location, map) {
			  // Add the marker at the clicked location, and add the next-available label
			  // from the array of alphabetical characters.
			  marker.setMap(null);
			  marker = new google.maps.Marker({
			    position: location,
			    map: map,
			    draggable: true
			  });
			}

			function geocodePosition(pos) {
				const geocoder = new google.maps.Geocoder();
				geocoder.geocode({
					latLng: pos
				}, function(responses) {
					if (responses && responses.length > 0) {
						Livewire.emit('updateAddress', responses[0]);
					} else {
						console.log('Cannot determine address at this location.');
					}
				});
				}//geocodePosition End
    	});//end document ready
	});
    	
    	$('#location-form').on('keyup keypress', function(e) {
		  var keyCode = e.keyCode || e.which;
		  if (keyCode === 13) { 
		    e.preventDefault();
		    return false;
		  }
		});
    </script>