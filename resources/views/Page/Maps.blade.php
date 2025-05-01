<!DOCTYPE html>
<html lang="id">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Lokasi di Google Maps</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        #map {
            width: 100%;
            height: 400px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        button {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
    <!-- Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initMap" async defer></script>
    <script>
        var map, marker;
        function initMap() {
            var defaultLocation = { lat: -6.200000, lng: 106.816666 };
            map = new google.maps.Map(document.getElementById('map'), {
                center: defaultLocation,
                zoom: 12
            });

            fetch("/get-locations")
                .then(response => response.json())
                .then(data => {
                    console.log("Data lokasi dari database:", data); // Debugging
                    data.forEach(location => {
                        new google.maps.Marker({
                            position: { lat: parseFloat(location.latitude), lng: parseFloat(location.longitude) },
                            map: map,
                            title: location.nama_tempat,
                            icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png' // Icon marker database
                        });
                    });
                })
                .catch(error => console.error("Error mengambil data lokasi:", error));

            marker = new google.maps.Marker({
                position: defaultLocation,
                map: map,
                draggable: true,
                icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png' // Icon marker utama
            });

            marker.addListener('dragend', function(event) {
                document.getElementById('latitude').value = event.latLng.lat();
                document.getElementById('longitude').value = event.latLng.lng();
            });

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var userLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    map.setCenter(userLocation);
                    marker.setPosition(userLocation);
                    document.getElementById('latitude').value = userLocation.lat;
                    document.getElementById('longitude').value = userLocation.lng;
                }, function() {
                    alert("Tidak dapat mendeteksi lokasi Anda.");
                });
            }

            var input = document.getElementById('search');
            var searchBox = new google.maps.places.SearchBox(input);
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();
                if (places.length === 0) return;
                var place = places[0];
                if (!place.geometry) {
                    alert("Lokasi tidak valid.");
                    return;
                }
                map.setCenter(place.geometry.location);
                marker.setPosition(place.geometry.location);
                document.getElementById('latitude').value = place.geometry.location.lat();
                document.getElementById('longitude').value = place.geometry.location.lng();
            });
        }
    </script>
    <!-- Modal Popup -->
<div id="successPopup" class="popup">
    <div class="popup-content">
        <p>Data lokasi telah tersimpan!</p>
        <button onclick="closeTab()">Selesai</button>
    </div>
</div>

<style>
    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        text-align: center;
    }
    .popup button {
        margin-top: 10px;
        padding: 10px 20px;
        background-color: #28a745;
        color: white;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }
</style>

<script>
    document.getElementById('locationForm').addEventListener('submit', function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        fetch("{{ route('save.location') }}", {
            method: "POST",
            body: formData,
            headers: {
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);  // Menampilkan pop-up
                window.location.href = "/map";  // Redirect ke halaman input
            } else {
                alert("Gagal menyimpan lokasi.");
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("Terjadi kesalahan.");
        });
    });
    </script>

</head>
<body>

    <div class="container">
        <h2>Pilih Lokasi Anda</h2>
        <input id="search" type="text" placeholder="Cari lokasi...">
        <div id="map"></div>
        <form action="{{ route('save.location') }}" method="POST">
            @csrf
            <label>Latitude:</label>
            <input type="text" id="latitude" name="latitude" required readonly>
            <label>Longitude:</label>
            <input type="text" id="longitude" name="longitude" required readonly>
            <label>Nama Tempat</label>
            <input type="text" name="nama_tempat" required>
            <label>ID User</label>
            <input type="text" name="id_user" value="{{ auth()->user()->id}}">
            <button type="submit">Simpan Lokasi</button>
        </form>




    </div>

</body>
</html>
