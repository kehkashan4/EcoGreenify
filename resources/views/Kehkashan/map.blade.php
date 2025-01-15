@extends('master.main')

@section('home')

    <div style="position: relative; overflow-x: hidden;">
        <img src="{{ asset('images/maphero01.png') }}" alt="" class="img-fluid mt-5" style="width: 100%; height: 90vh; object-fit: cover;">
        <div class="container" style="position: absolute; inset: 0; display: flex; flex-direction: column; justify-content: center; align-items: center; color: white; text-align: center;">
            <h4 style="font-weight: 550;" class="fs-1 fs-md-3 ms-5 me-5 mt-5">Use our interactive map to locate environmentally favorable areas!</h4>
       </div>
    </div>

   <div class="container mt-3">
    <div class="row">
        <div class="col-md-9 mt-3">
             <div id="map" style=" height: 500px;"></div>
        </div>

        <div class="col-md-3 py-3 sidebar mt-3" style="background-color: #fff9e2">
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

