@extends('admin.main')

@section('content')

<div class="container row">
    <div class="col-md-10 mx-auto">
    <h2>{{ $city->id ? 'Edit City' : 'Add New City' }}</h2>
    <form action="{{ $city->id == null ? route('admin.city.store') : route('admin.city.update', ['id' => $city->id]) }}" method="post">
    @csrf

    <div class="mb-3">
        <label for="province_id">Select a Province</label>
        <select name="province_id" id="province_id" class="form-select @error('province_id') is-invalid @enderror">
            <option>Choose Province</option>
            @foreach ($province as $prov )
            <option value="{{ $prov->id }}" {{ old('province_id', $city->province_id) == $prov->id ? 'selected' : '' }}>{{ $prov->name }}</option>
            @endforeach
        </select>

        <!-- Show Error Message -->
        @error('province_id')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-1">
        <label for="name" class="form-label"> City Name </label>
        <input
            type="text"
            class="form-control @error('name') is-invalid @enderror"
            name="name"
            id="name"
            placeholder="Enter City Name Here"
            value="{{ old('name', $city->name) }}"
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
