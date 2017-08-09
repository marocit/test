@extends('layouts.app')

@section('content')

<div id="map" class="mapAll"></div>



@endsection



@push('scripts')
    <script>



      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById("map"), {
          center:{
            lat: 52.4970097,
            lng: 13.3306971
          },
          zoom: 13,
          mapTypeId: 'terrain'
        });

        var url = '/fetch'
        fetch(url)
        .then((resp) => resp.json())
        .then(function(data) {





        for(i = 0; i < data.length; i++) {
          var latLng = new google.maps.LatLng(data[i].lat,data[i].lng);
          var marker = new google.maps.Marker({
            position: latLng,
            title: data[i].title,
            animation: google.maps.Animation.DROP,
            map: map
          });
        }
        marker.addListener('click', toggleBounce);


        function toggleBounce() {
          if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
          } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
          }
        }




        });




      }



    </script>
@endpush
 <script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgpnnyYJWfI52yozhc4DeQsjwIOy0yBs4&libraries=places&callback=initAutocomplete">
    </script>


