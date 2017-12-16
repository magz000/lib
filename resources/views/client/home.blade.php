@extends('layouts.client.app')

@section('content')

    <section>
        <div class="container p-5 h-100">
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <h1 class="text-primary">Stores Near You</h1>

                    <p class="text-secondary" id="address"></p>

                    <div class="row justify-content-center w-100" id="store-container">

                        <input class="form-control col-md-8" placeholder="Search" name="query" id="query"/>

                        <div class="row justify-content-center w-100" id="search-container">


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>

        function initMap(){

            var latitude;
            var longitude;

            var geocoder = new google.maps.Geocoder;

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Geolocation is not supported by this browser.");
            }


            function showPosition(position) {
                latitude = position.coords.latitude;
                longitude = position.coords.longitude;

                var latLng = {lat: latitude, lng: longitude};

                geocoder.geocode({'location': latLng}, function(results, status) {
                    if (status === 'OK') {
                        if (results[0]) {
                            $('#address').html(results[0].formatted_address);
                        } else {
                            window.alert('No results found');
                        }
                    } else {
                        window.alert('Geocoder failed due to: ' + status);
                    }
                });

                $.ajax({
                    url: "{{route('client.stores.search')}}",
                    type: "GET",
                    data: {q: '', lat: latitude, lng: longitude},
                    dataType: "html",
                    success: function (data) {
                        $('#search-container').html(data);
                    }
                });
            }

            $('#query').keyup(function() {
                var query = $(this).val();

                $.ajax({
                    url: "{{route('client.stores.search')}}",
                    type: "GET",
                    data: {q: query, lat: latitude, lng: longitude},
                    dataType: "html",
                    success: function (data) {
                        $('#search-container').html(data);
                    }
                });
            });

        }


    </script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClQR6wvHKmzt6ERxYTJlrtziRPh71DGOQ&callback=initMap">
    </script>

@endsection




