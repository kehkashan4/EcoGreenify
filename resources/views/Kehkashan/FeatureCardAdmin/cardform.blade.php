@extends('admin.main')

@section('content')

<div class="container row">
    <div class="col-md-10 mx-auto">
        <h2>{{ $featurecard->id ? 'Edit Feature Card' : 'Add New Feature Card' }}</h2>
        <form action="{{ $featurecard->id == null ? route('admin.featurecard.store') : route('admin.featurecard.update', ['id' => $featurecard->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label"> Title </label>
        <input
            type="text"
            class="form-control @error('title') is-invalid @enderror"
            name="title"
            id="title"
            placeholder="Enter Title Here"
            value="{{ old('title', $featurecard->title) }}"
        />

    <!-- Show Error Message -->
    @error('title')
           <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>

    <div class="mb-3">
        <label for="tag_line" class="form-label"> Tag Line </label>
        <input
            type="text"
            class="form-control @error('tag_line') is-invalid @enderror"
            name="tag_line"
            id="tag_line"
            placeholder="Enter Tag Line Here"
            value="{{ old('tag_line', $featurecard->tag_line) }}"
        />

    <!-- Show Error Message -->
    @error('tag_line')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>

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

    <input type="submit" value="Save" class="btn mt-2" style="background-color: #39b54a; color:white;">

    </form>
    </div>
</div>

@endsection
