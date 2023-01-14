 <script>
 	if (window.google) $(function() {
    	$(document).ready(function(){
    		var componentForm = {
			  street_number: 'short_name',
			  route: 'long_name',
			  locality: 'long_name',
			  administrative_area_level_1: 'long_name',
			  country: 'long_name',
			  postal_code: 'short_name'
			};

			$('.location-percent').each(function(){
				if($(this).val().length == 0){
					//unmark completed
					$('.location-mark').addClass('d-none');
					$('.location-mark-error').removeClass('d-none');
				}else{
					$('.location-mark').removeClass('d-none');
					$('.location-mark-error').addClass('d-none');
				}
			});


    		var mapName = 'map-12';
    		const element = document.getElementById('mapName');
			var input = document.getElementById('address');
			var marker;
    		const options = {
				zoom: 14,
				@if($coWorkSpace->address['latitude'] && $coWorkSpace->address['longitude'])
					center: new google.maps.LatLng({{$coWorkSpace->address['latitude']}},{{$coWorkSpace->address['longitude']}})
				@else
					center: new google.maps.LatLng(18.5204,73.8567)
				@endif
			}

			const map = new google.maps.Map(element, options);

			//this.markerCoordinates.forEach((coord) => {
				@if($coWorkSpace->address['latitude'] && $coWorkSpace->address['longitude'])
				const position = new google.maps.LatLng({{$coWorkSpace->address['latitude']}},{{$coWorkSpace->address['longitude']}})
				@else
					const position = new google.maps.LatLng(18.5204, 73.8567);
				@endif
				marker = new google.maps.Marker({
					 position: position,
    				 map: map,
    				 draggable: true
			//	});
				});

			var autocomplete = new google.maps.places.Autocomplete(input, {types: ['geocode']});
			autocomplete.bindTo('bounds', map);


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
		        //console.log('place.geometry: '+ place.address_components[0]);
		        marker.setPosition(place.geometry.location);
		        document.getElementById('latitude').value= place.geometry.location.lat();
		        document.getElementById('longitude').value= place.geometry.location.lng();

		        marker.setVisible(true);
		        if (place.address_components) {
		            // var address = [
		            //   (place.address_components[0] && place.address_components[0].short_name || ''),
		            //   (place.address_components[1] && place.address_components[1].short_name || ''),
		            //   (place.address_components[2] && place.address_components[2].short_name || ''),
		            //   (place.address_components[3] && place.address_components[3].short_name || '')
		            // ].join(', ');

		            for (var i = 0; i < place.address_components.length; i++) {
					    var addressType = place.address_components[i].types[0];
					    //console.log('address type : ' + addressType);
					    if (componentForm[addressType]) {
					      var val = place.address_components[i][componentForm[addressType]];
					      //console.log('address type : ' + addressType + ':' + val);
					      document.getElementById(addressType).value = val;
					    }
					  }

		            //console.log('model address '+this.location.address);
		            //document.getElementById('address').value = address;
		            //console.log('addres : ' + this.location.address);
	          }
			}.bind(this));

			// This event listener calls addMarker() when the map is clicked.
			google.maps.event.addListener(map, 'click', function(event) {
				addMarker(event.latLng, map);
				// console.log('on map click');
				geocodePosition(event.latLng);

				document.getElementById('latitude').value= event.latLng.lat();
		        document.getElementById('longitude').value= event.latLng.lng()
			});

			// Adds a marker to the map.
			function addMarker(location, map) {
			  // Add the marker at the clicked location, and add the next-available label
			  // from the array of alphabetical characters.
			  marker.setMap(null);
			  marker = new google.maps.Marker({
			    position: location,
			    //label: labels[labelIndex++ % labels.length],
			    map: map,
			    draggable: true
			  });
			}

			function geocodePosition(pos) {
				// console.log('in Geocode Position');
				const geocoder = new google.maps.Geocoder();
				geocoder.geocode({
					latLng: pos
				}, function(responses) {
					if (responses && responses.length > 0) {
						// console.log('Adress: '+responses[0].formatted_address);
						$('#address').val(responses[0].formatted_address);
						for (var i = 0; i < responses[0].address_components.length; i++) {
							var addressType = responses[0].address_components[i].types[0];
							//console.log('address type : ' + addressType);
							if (componentForm[addressType]) {
							var val = responses[0].address_components[i][componentForm[addressType]];
							//console.log('Address: '+val);
							document.getElementById(addressType).value = val;
							}
						}
					// updateMarkerAddress(responses[0].formatted_address);
					} else {
						console.log('Cannot determine address at this location.');
					//updateMarkerAddress('Cannot determine address at this location.');
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