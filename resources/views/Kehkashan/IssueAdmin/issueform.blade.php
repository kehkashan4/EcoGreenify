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
        <h2>{{ $issue->id ? 'Edit Environmental Issue' : 'Add New Environmental Issue' }}</h2>
          <form action="{{ $issue->id == null ? route('admin.issue.store') : route('admin.issue.update', ['id' => $issue->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label"> Title </label>
        <input
            type="text"
            class="form-control @error('title') is-invalid @enderror"
            name="title"
            id="title"
            placeholder="Enter Title Here"
            value="{{ old('title', $issue->title) }}"
        />

    <!-- Show Error Message -->
    @error('title')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label"> Description </label>
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="4">{{ old('description', $issue->description) }}</textarea>

    <!-- Show Error Message -->
    @error('description')
        <div class="text-danger mt-1">{{ $message }}</div>
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
