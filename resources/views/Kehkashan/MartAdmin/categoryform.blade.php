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
        <h2>{{ $category->id ? 'Edit Category' : 'Add New Category' }}</h2>
         <form action="{{ isset($category->slug) ? route('admin.category.update',['slug'=>$category->slug]) : route('admin.category.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label"> Category Name </label>
        <input
            type="text"
            class="form-control @error('name') is-invalid @enderror"
            name="name"
            id="name"
            placeholder="Enter Category Name Here"
            value="{{ old('name', $category->name) }}}"
        />

        <!-- Show Error Message -->
        @error('name')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label"> Description </label>
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="4">{{ old('description', $category->description) }}</textarea>

        <!-- Show Error Message -->
        @error('description')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
         <label for="img" class="form-label">Upload Image</label><br>
        <input type="file" name="img" class="@error('img') is-invalid @enderror">

        <!-- Show Error Message -->
        @error('img')
            <div class="text-danger mt-1">{{ $message }}</div>
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
