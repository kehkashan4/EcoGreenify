@extends('admin.main')

@section('content')

<script src="{{ asset('js/jquery.min.js') }}"></script>

<div class="container row">
    <div class="col-md-10 mx-auto">
    <h2>{{ $town->id ? 'Edit Town' : 'Add New Town' }}</h2>
    <form action="{{ $town->id ? route('admin.town.update', $town->id) : route('admin.town.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="province_id" class="form-label">Select Province</label>
        <select name="province_id" id="province_id" class="form-select @error('province_id') is-invalid @enderror" required>
            <option value="">Choose Province</option>
            @foreach ($provinces as $province)
                <option value="{{ $province->id }}" {{ old('province_id', $town->province_id) == $province->id ? 'selected' : '' }}>
                    {{ $province->name }}
                </option>
            @endforeach
        </select>

        <!-- Show Error Message -->
        @error('province_id')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="city_id" class="form-label">Select City</label>
        <select name="city_id" id="city_id" class="form-select @error('city_id') is-invalid @enderror">
            <option value="">Choose City</option>
            @foreach ($cities as $city)
                <option value="{{ $city->id }}" {{ old('city_id', $town->city_id) == $city->id ? 'selected' : '' }}>
                    {{ $city->name }}
                </option>
            @endforeach
        </select>

        <!-- Show Error Message -->
        @error('city_id')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Town Name</label>
        <input
            type="text"
            name="name"
            id="name"
            class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $town->name) }}"
        />

        <!-- Show Error Message -->
        @error('name')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="row mb-1">
        <div class="col-md-6">
            <label for="latitude" class="form-label">Latitude</label>
            <input
                type="number"
                step="any"
                name="latitude"
                id="latitude"
                class="form-control @error('latitude') is-invalid @enderror"
                value="{{ old('latitude', $town->latitude) }}"
            />

        <!-- Show Error Message -->
        @error('latitude')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="longitude" class="form-label">Longitude</label>
            <input
                type="number"
                step="any"
                name="longitude"
                id="longitude"
                class="form-control @error('longitude') is-invalid @enderror"
                value="{{ old('longitude', $town->longitude) }}"
            />

        <!-- Show Error Message -->
        @error('longitude')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
        </div>
    </div>

    <input type="submit" value="Save" class="btn mt-2" style="background-color: #39b54a; color:white;">

    </form>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#province_id').change(function() {
        var provinceId = $(this).val();
        if (provinceId) {
            $.ajax({
                url: "{{ url('/admin/town/get-cities') }}/" + provinceId,
                type: "GET",
                success: function(cities) {
                    $('#city_id').empty();
                    $('#city_id').append('<option value="">Choose City</option>');
                    $.each(cities, function(key, city) {
                        $('#city_id').append('<option value="' + city.id + '">' + city.name + '</option>');
                    });
                }
            });
        } else {
            $('#city_id').empty();
            $('#city_id').append('<option value="">Choose City</option>');
        }
    });
});
</script>

@endsection
