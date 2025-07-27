@extends('admin.main')

@section('content')

<div class="container row">
<div class="col-md-8 mx-auto">
<h2>{{ $slider->id ? 'Edit Slider Image' : 'Add New Slider Image' }}</h2>

    <form action="{{ $slider->id == null ? route('admin.slider.store') : route('admin.slider.update', ['id' => $slider->id]) }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="mb-1">
    <label for="img" class="form-label">Upload Image</label>
    <input
        type="file"
        name="img"
        id="img"
        class="form-control @error('img') is-invalid @enderror"
    >

    <!-- Show Error Message -->
    @error('img')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
    </div>

    <input type="submit" value="Upload" class="btn mt-2" style="background-color: #39b54a; color:white;">

    </form>
</div>
</div>

@endsection
