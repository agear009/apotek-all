<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Maps Laravel 10</title>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places"></script>
    <script>
        function initMap() {
            // Inisialisasi peta dengan lokasi default
            var defaultLocation = { lat: -6.200000, lng: 106.816666 }; // Jakarta
            var map = new google.maps.Map(document.getElementById('map'), {
                center: defaultLocation,
                zoom: 12
            });

            // Menambahkan marker untuk pelanggan
            var customerMarker = new google.maps.Marker({
                position: defaultLocation,
                map: map,
                title: "Lokasi Pelanggan",
                draggable: true
            });

            // Mendeteksi lokasi pelanggan
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var userLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    map.setCenter(userLocation);
                    customerMarker.setPosition(userLocation);
                });
            }

            // Cari apotek terdekat
            var service = new google.maps.places.PlacesService(map);
            service.nearbySearch({
                location: defaultLocation,
                radius: 5000, // 5 km
                type: ['pharmacy']
            }, function (results, status) {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    for (var i = 0; i < results.length; i++) {
                        var place = results[i];
                        new google.maps.Marker({
                            position: place.geometry.location,
                            map: map,
                            title: place.name
                        });
                    }
                }
            });
        }
    </script>
</head>
<body onload="initMap()">
    <h2>Google Maps - Lokasi Apotek Terdekat</h2>
    <div id="map" style="width: 100%; height: 500px;"></div>

    <!--mengimput data apotek-->
    <form method="POST" action="{{ route('save.location') }}">
    @csrf
    <input type="text" name="id_user" placeholder="Nama Lokasi" required>
    <input type="hidden" name="latitude" id="latitude">
    <input type="hidden" name="longitude" id="longitude">
    <button type="submit">Simpan Lokasi</button>
    </form>

    <!--menampilkan marker apotek di database-->
    <script>
    var map;
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: -6.200000, lng: 106.816666 },
            zoom: 12
        });

        @foreach($locations as $location)
            new google.maps.Marker({
                position: { lat: {{ $location->latitude }}, lng: {{ $location->longitude }} },
                map: map,
                title: "{{ $location->name }}"
            });
        @endforeach
    }
</script>

<!--menampilkan jarak apotek di database-->
<script>
    function saveLocation(lat, lng) {
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
    }

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            saveLocation(position.coords.latitude, position.coords.longitude);
        });
    }
</script>



    <script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: -6.200000, lng: 106.816666 },
            zoom: 12
        });

        var directionsService = new google.maps.DirectionsService();
        var directionsRenderer = new google.maps.DirectionsRenderer();
        directionsRenderer.setMap(map);

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var userLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                map.setCenter(userLocation);

                // Cari apotek terdekat
                var service = new google.maps.places.PlacesService(map);
                service.nearbySearch({
                    location: userLocation,
                    radius: 5000, // 5 km
                    type: ['pharmacy']
                }, function (results, status) {
                    if (status === google.maps.places.PlacesServiceStatus.OK) {
                        var nearestPharmacy = results[0].geometry.location;

                        // Buat rute ke apotek terdekat
                        directionsService.route({
                            origin: userLocation,
                            destination: nearestPharmacy,
                            travelMode: 'DRIVING'
                        }, function (response, status) {
                            if (status === 'OK') {
                                directionsRenderer.setDirections(response);
                            }
                        });
                    }
                });
            });
        }
    }
</script>

</body>
</html>
