@extends('admin.main')

@section('content')

<!-- CSS Files -->
<link rel="stylesheet" href="{{ asset('summernote-0.9.0-dist/summernote-lite.min.css') }}">

<!-- jQuery (Agar pehle se load nahi hai toh) -->
<script src="{{ asset('js/jquery.min.js') }}"></script>

<!-- Summernote JS Files -->
<script src="{{ asset('summernote-0.9.0-dist/summernote-lite.min.js') }}"></script>


<div class="container row">
    <div class="col-md-10 mx-auto">
        <h2>{{ $marker->id ? 'Edit Eco-Friendly Place' : 'Add New Eco-Friendly Place' }}</h2>
        <form action="{{ isset($marker->slug) ? route('admin.marker.update',['slug'=>$marker->slug]) : route('admin.marker.store') }}" method="post" enctype="multipart/form-data">

    @csrf
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="latitude" class="form-label"> Latitude </label>
            <input
                type="number"
                step="any"
                class="form-control @error('latitude') is-invalid @enderror"
                name="latitude"
                id="latitude"
                placeholder="Enter Latitude Here"
                value="{{ old('latitude', $marker->latitude) }}"
        />

        <!-- Show Error Message -->
        @error('latitude')
            <div class="text-danger">{{ $message }}</div>
        @enderror
       </div>

       <div class="col-md-6">
            <label for="longitude" class="form-label"> Longitude </label>
            <input
                type="number"
                step="any"
                class="form-control @error('longitude') is-invalid @enderror"
                 name="longitude"
                id="longitude"
                placeholder="Enter Longitude Here"
                value="{{ old('longitude', $marker->longitude) }}"
        />

       <!-- Show Error Message -->
       @error('longitude')
            <div class="text-danger">{{ $message }}</div>
       @enderror
       </div>

    </div>

    <div class="row mb-3">
        <div class="col-md-6">
        <label for="place_name" class="form-label"> Place Name</label>
        <input
            type="text"
            class="form-control @error('place_name') is-invalid @enderror"
            name="place_name"
            id="place_name"
            placeholder="Enter Place Name Here"
            value="{{ old('place_name', $marker->place_name) }}"
        />

        <!-- Show Error Message -->
        @error('place_name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="address" class="form-label"> Address </label>
            <input
                type="text"
                class="form-control @error('address') is-invalid @enderror"
                name="address"
                id="address"
                placeholder="Enter Address Here"
                value="{{ old('address', $marker->address) }}"
            />

        <!-- Show Error Message -->
        @error('address')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="circle_radius" class="form-label"> Circle Radius </label>
        <input
            type="number"
            class="form-control @error('circle_radius') is-invalid @enderror"
            name="circle_radius"
            id="circle_radius"
            placeholder="Enter Circle radius (in km)"
            value="{{ old('circle_radius', $marker->circle_radius) }}"
        />

        <!-- Show Error Message -->
        @error('circle_radius')
            <div class="text-danger">{{ $message }}</div>
        @enderror

    </div>


    <div class="mb-3">
        <label for="description" class="form-label"> Description </label>
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="4">{{  old('description', $marker->description)  }}</textarea>

        <!-- Show Error Message -->
        @error('description')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-1">
        <label for="img" class="form-label"> Upload Image </label><br>
        <input type="file" name="img" id="img" class="@error('img') is-invalid @enderror">

        <!-- Show Error Message -->
        @error('img')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <input type="submit" value="Save" class="btn mt-2" style="background-color: #39b54a; color:white;">

         </form>
    </div>
</div>

<script>
    $('#description').summernote({
      placeholder: 'Enter Description Here',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });

</script>

@endsection
