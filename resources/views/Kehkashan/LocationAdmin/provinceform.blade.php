@extends('admin.main')

@section('content')

<div class="container row">
    <div class="col-md-8 mx-auto">
    <h2>{{ $province->id ? 'Edit Province' : 'Add New Province' }}</h2>
    <form action="{{ $province->id==null? route('admin.province.store') : route('admin.province.update',['id'=>$province->id])}}" method="post">
    @csrf

    <div class="mb-1">
        <label for="name" class="form-label @error('name') is-invalid @enderror"> Province Name </label>
        <input
            type="text"
            class="form-control"
            name="name"
            id="name"
            placeholder="Enter Province Name Here"
            value="{{old('name', $province->name) }}"
        />

        <!-- Show Error Message -->
        @error('name')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <input type="submit" value="Save" class="btn mt-2" style="background-color: #39b54a; color:white;">

    </form>
    </div>
</div>

@endsection
