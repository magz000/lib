@extends('layouts.admin.app')

@section('content')

    <section>
        <div class="container p-5">
            <div class="row justify-content-center">
                <div class="col-md-10 col-md-offset-1">
                    <div class="card panel-default">
                        <div class="card-heading p-2 bg-primary text-white">Edit Store</div>

                        <div class="card-body">
                            <a class="btn-primary text-white rounded p-2 pull-right" href="{{ route('admin.stores.show', $store->id) }}"> Back </a>

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif

                            <div id="map"></div>

                            <form  role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.stores.editprocess', $store->id) }}">
                                {{ csrf_field() }}

                                <input type="hidden" name="_method" value="patch" />

                                <div class="form-group">
                                    <label for="name" class="col-md-6 control-label text-secondary">Name</label>

                                    <div class="col-lg-10 col-md-8">
                                        <input id="name" type="text" class="form-control" name="name"
                                               value="{{ isset($store) ?  $store->name : old('name') }}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="address" class="col-md-6 control-label text-secondary">Address</label>

                                    <div class="col-lg-10 col-md-12">
                                        <input id="address" type="text" class="form-control" name="address"
                                               value="{{ isset($store) ?  $store->address :  old('address') }}" readonly required>
                                    </div>
                                </div>

                                <div class="row form-group">

                                    <div class="form-group col-lg-5 col-md-6">
                                        <label for="latitude" class="col-md-6 control-label text-secondary">Latitude</label>

                                        <div  class="col-md-12">
                                            <input id="latitude" type="text" class="form-control" name="latitude"
                                                   value="{{ isset($store) ?  $store->latitude : old('latitude') }}" readonly required>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-5 col-md-6">
                                        <label for="longitude" class="col-md-6 control-label text-secondary">Longitude</label>

                                        <div class="col-md-12" >
                                            <input id="longitude" type="text" class="form-control" name="longitude"
                                                   value="{{ isset($store) ?  $store->longitude : old('longitude') }}" readonly required>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </div>


                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')

    <script>
        function initMap() {
            var uluru = {lat: 14.6332989, lng: 121.0736277};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: uluru
            });


            var geocoder = new google.maps.Geocoder;

            var markers = [];

            @if(isset($store))
                var location = {lat: {{$store->latitude}}, lng: {{$store->longitude}}};

                var marker = new google.maps.Marker({
                        position: location,
                        map: map
                    });
                markers.push(marker);
            @endif



            google.maps.event.addListener(map, 'click', function(event) {
                placeMarker(event.latLng);

                $('#latitude').val(event.latLng.lat);
                $('#longitude').val(event.latLng.lng);


                geocoder.geocode({'location': event.latLng}, function(results, status) {
                    if (status === 'OK') {
                        if (results[0]) {
                            map.setZoom(11);

                            $('#address').val(results[0].formatted_address);

                        } else {
                            window.alert('No results found');
                        }
                    } else {
                        window.alert('Geocoder failed due to: ' + status);
                    }
                });

            });

            function placeMarker(location) {
                if(markers.length > 0) {
                    markers[0].setMap(null);

                    markers = [];
                }

                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
                markers.push(marker);

            }



        }
    </script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClQR6wvHKmzt6ERxYTJlrtziRPh71DGOQ&callback=initMap">
    </script>

@endsection



