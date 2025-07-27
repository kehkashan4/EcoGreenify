@extends('user.main')

@section('content')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('leaflet/leaflet.css') }}">
    <script src="{{ asset('leaflet/leaflet.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</head>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<!-- hero section -->
<div class="container-fluid p-0" style="overflow-x: hidden;">
    <div class="d-flex align-items-center justify-content-center" style="background: url('{{ asset('images/foothero02.jpg') }}') no-repeat center center/cover; height: 450px;">
        <div class="container-fluid py-2" style="background: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1))">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <h1 class="text-center text-white" style="font-weight: bold; font-size: 43px;">Use our interactive map to locate environmentally favorable areas</h1>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container mt-5">
    <div class="row">

        <!-- Show Map  -->
        <div class="col-md-9">
            <div id="map" style="height: 580px;"></div>
        </div>

        <!-- Sidebar -->
        <div class="col-md-3 sidebar" style="background-color:#023d54; color: white">
            <h3 class="py-4 text-center">Interactive Filter</h3>
            <div class="mb-4">
                <label for="province" class="form-label">Select Province</label>
                <select id="province" class="form-select">
                    <option value="">Choose Province</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="city" class="form-label">Select City</label>
                <select id="city" class="form-select">
                    <option value="">Choose City</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="town" class="form-label">Select Town</label>
                <select id="town" class="form-select">
                    <option value="">Choose Town</option>
                </select>
            </div>
            <div>
                <button id="searchBtn" class="btn p-2 w-100" style="background-color: #39b54a; color:white;">Search</button>
            </div>
        </div>
    </div>
</div>

<!-- Show parks jesy k insta ki post show hoti hai-->
<div class="mt-3" style="background-color: #f8f8f8;">
    <div class="container" style="padding: 50px;">
        @include('components.places.place',['markers'=>$markers])
    </div>
</div>

<!-- AJAX k through data load ho reha-->
<script>
    $(document).ready(function () {
    let map = L.map('map').setView([30.3753, 69.3451], 6);
    let markersLayer = L.layerGroup().addTo(map);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);


    $.get('/get-provinces', function (data) {
        $('#province').html('<option value="">Choose Province</option>');
        data.forEach(province => {
            $('#province').append(`<option value="${province.id}">${province.name}</option>`);
        });
    });


    $('#province').change(function () {
        let provinceId = $(this).val();
        $.get(`/get-cities/${provinceId}`, function (data) {
            $('#city').html('<option value="">Choose City</option>');
            data.forEach(city => $('#city').append(`<option value="${city.id}">${city.name}</option>`));
        });
    });

    $('#city').change(function () {
        let cityId = $(this).val();
        $.get(`/get-towns/${cityId}`, function (data) {
            $('#town').html('<option value="">Choose Town</option>');
            data.forEach(town => $('#town').append(`<option value="${town.id}">${town.name}</option>`));
        });
    });

    $('#searchBtn').click(function () {
        let townId = $('#town').val();
        if (!townId) {
            alert("Please select a town first!");
            return;
        }

        @if (!Auth::check())
            alert("Please login first!");
            return;
        @endif

        $.ajax({
            url: `/search-markers/${townId}`,
            type: 'GET',
            success: function (response) {
                markersLayer.clearLayers(); // Remove previous markers

                let townLat = response.town_coordinates.latitude;
                let townLng = response.town_coordinates.longitude;

                // Move map to selected town
                map.setView([townLat, townLng], 13);
                L.marker([townLat, townLng], { icon: L.icon({ iconUrl: 'https://maps.google.com/mapfiles/ms/icons/green-dot.png' }) })
                    .addTo(markersLayer)
                    .bindPopup('<b>Selected Town</b>')
                    .openPopup();

                response.markers.forEach(marker => {
                    let ecoMarker = L.marker([marker.latitude, marker.longitude]).addTo(markersLayer);
                    ecoMarker.bindPopup(`<b>${marker.place_name}</b>`).openPopup();

                    L.circle([marker.latitude, marker.longitude], {
                        radius: 500,
                        color: 'blue',
                        fillOpacity: 0.2
                    }).addTo(markersLayer);
                });

            },
            error: function (xhr) {
                if (xhr.status === 401) {
                    alert("Please login first!");
                }
            }
        });
    });
});
</script>

@endsection
