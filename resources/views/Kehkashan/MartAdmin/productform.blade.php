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
        <h2>{{ $product->id ? 'Edit Product' : 'Add New Product' }}</h2>
        <form action="{{ isset($product->slug) ? route('admin.product.update',['slug'=>$product->slug]) : route('admin.product.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="category_id">Select a Category</label>
        <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
            <option value="">Choose Category</option>
            @foreach ($category as $ctgry )
            <option value="{{ $ctgry->id }}" {{ $product->category_id == $ctgry->id ? 'selected' : '' }}>{{ $ctgry->name }}</option>
            @endforeach
        </select>

    <!-- Show Error Message -->
    @error('category_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>

    <div class="mb-3">
        <label for="name" class="form-label"> Product Name </label>
        <input
            type="text"
            class="form-control @error('name') is-invalid @enderror"
            name="name"
            id="name"
            placeholder="Enter Product Name Here"
            value="{{ old('name', $product->name) }}"
        />

    <!-- Show Error Message -->
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>

    <div class="mb-3">
        <label for="price" class="form-label"> Price </label>
        <input
            type="number"
            class="form-control @error('price') is-invalid @enderror"
            name="price"
            id="price"
            placeholder="Enter Price Here"
            value="{{ old('price', $product->price) }}"
        />

    <!-- Show Error Message -->
    @error('price')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>

    <div class="mb-3">
        <label for="name" class="form-label"> Stock Quantity </label>
        <input
            type="number"
            class="form-control @error('stock_quantity') is-invalid @enderror"
            name="stock_quantity"
            id="stock_quantity"
            placeholder="Enter Quantity Here"
            value="{{ old('stock_quantity', $product->stock_quantity) }}"
        />

    <!-- Show Error Message -->
    @error('stock_quantity')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>

    <div class="mb-3">
        <label for="is_available">Availability</label>
            <select name="is_available" class="form-control @error('is_available') is-invalid @enderror">
                <option value="instock" {{ old('is_available', $product->is_available) == 'instock' ? 'selected' : '' }}>In Stock</option>
                <option value="outofstock" {{ old('is_available', $product->is_available) == 'outofstock' ? 'selected' : '' }}>Out of Stock</option>
            </select>
    <!-- Show Error Message -->
    @error('is_available')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label"> Description </label>
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="4">{{ old('description', $product->description) }}</textarea>

    <!-- Show Error Message -->
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>

    <div class="mb-3">
    <label for="img" class="form-label">Upload Image</label>
        <input
            type="file"
            name="img"
            class="form-control @error('img') is-invalid @enderror"
        />

    <!-- Show Error Message -->
    @error('img')
        <div class="invalid-feedback">{{ $message }}</div>
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
