@extends('layouts.app')

@section('content')

  <div id="map" class="mapIndex"></div>


{!! Form::open(['method' => 'post', 'action' => 'MapsController@store', 'files' =>true]) !!}

    <div class="row">
      <div class="col-md-3 col-md-offset-4">
          <div class="form-group {{ $errors->has('title') ? 'has-error': '' }}">
            {!! Form::label('title', 'Title:') !!}
            <div class="input-icon input-icon-sm right">
                {!! Form::text('title', null, ['class' => 'form-control input-sm']) !!}
            </div>
            @if($errors->has('title'))
                <span class="help-block">{{ $errors->first('title') }}</span>
            @endif
          </div>
          <div class="form-group">
              {!! Form::label('searchmap', 'SearchMap:') !!}
              <div class="input-icon input-icon-sm right">
                  {!! Form::text('searchmap', null, ['class' => 'form-control input-sm']) !!}
              </div>
          </div>
          <div class="form-group {{ $errors->has('lat') ? 'has-error': '' }}">
              {!! Form::label('lat', 'Lat:') !!}
              <div class="input-icon input-icon-sm right">
                  {!! Form::text('lat', null, ['class' => 'form-control input-sm']) !!}
              </div>
              @if($errors->has('lat'))
                <span class="help-block">{{ $errors->first('lat') }}</span>
            @endif
          </div>
          <div class="form-group {{ $errors->has('lng') ? 'has-error': '' }}">
              {!! Form::label('lng', 'Lng:') !!}
              <div class="input-icon input-icon-sm right">
                  {!! Form::text('lng', null, ['class' => 'form-control input-sm']) !!}
              </div>
              @if($errors->has('lng'))
                <span class="help-block">{{ $errors->first('lng') }}</span>
            @endif
          </div>
          <div class="form-group ">
                    {!! Form::submit('Add Position', ['class' => 'btn red']) !!}
          </div>
      </div>
    </div>
          
    
     
    

                                    
                          
{!! Form::close() !!}




@endsection




    <script>
      

      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById("map"), {
          center:{
            lat: 52.4970097,
            lng: 13.3306971
          },
          zoom: 15
        });

        var infoWindow = new google.maps.InfoWindow({map: map});

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }

        var marker = new google.maps.Marker({
          position: {
            lat: 52.4970097,
            lng: 13.3306971
          },
          map: map,
          draggable: true
        });

        var input = document.getElementById('searchmap');
        var searchBox = new google.maps.places.SearchBox(input);

        google.maps.event.addListener(searchBox, 'places_changed', function(){

          var places = searchBox.getPlaces();
          var bounds = new google.maps.LatLngBounds();
          var i, place;

          for(i=0; place=places[i]; i++){
            bounds.extend(place.geometry.location);
            marker.setPosition(place.geometry.location);
          }

          map.fitBounds(bounds);
          map.setZoom(15);

        });

        google.maps.event.addListener(marker, 'position_changed', function() {
          var lat = marker.getPosition().lat();
          var lng = marker.getPosition().lng();

          $('#lat').val(lat);
          $('#lng').val(lng);
        });



      //}

      
    
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgpnnyYJWfI52yozhc4DeQsjwIOy0yBs4&libraries=places&callback=initAutocomplete">
    </script>

</script>