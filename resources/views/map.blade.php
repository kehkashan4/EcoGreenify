@extends('master.main')

@section('home')

    <style>
        #map {
            height: 580px;
        }
        .sidebar{
            background-color: #fff9e2;
        }
    </style>

    <div style="position: relative;">
        <img src="{{ asset('maphero01.png') }}" alt="" class="img-fluid mt-1" style="width: 100%; height: 90vh; object-fit: cover;">
        <div style="position: absolute; inset: 0; display: flex; flex-direction: column; justify-content: center; align-items: center; color: white;">
           <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <p style="font-weight: 600; font-size: 30px;">Use our interactive map to locate environmentally favorable and polluting regions by providing feedback to help create a cleaner, greener world!</p>
                </div>
           </div>
       </div>
    </div>

   <div class="container mt-3">
    <div class="row">
        <div class="col-md-9">
             <div id="map"></div>
        </div>

        <div class="col-md-3 py-2 sidebar">
            <h4>Interactive Filters</h4>
            <div class="mb-3">
                <label for="locationSearch" class="form-label">Search Location</label>
                <input type="text" class="form-control" id="locationSearch" placeholder="Enter a location">
            </div>

            <div class="mb-3">
                <label for="environmentalTopic" class="form-label">Select Environmental Topic</label>
                <select class="form-select" id="environmentalTopic">
                    <option value="carbon">Carbon Emissions</option>
                    <option value="deforestation">Deforestation</option>
                    <option value="pollution">Pollution</option>
                </select>
            </div>
    </div>

   </div>

    <script>
        const map=L.map('map').setView([30.3753,69.3451], 6);
        const titleURL = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        const attribution = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>';
        const tiles=L.tileLayer(titleURL,{attribution});
        tiles.addTo(map);
    </script>

@endsection

