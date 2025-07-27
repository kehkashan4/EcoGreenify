@extends('admin.main')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Slider Images</h2>
        <a href="{{ route('admin.slider.create')}}" class="btn" style="background-color: #39b54a; color: white;">Create New Slider</a>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

<table class="table table-bordered text-center">
    <thead>
        <tr>
            <th style="text-transform: none; background-color: #023d54; color: white;">ID</th>
            <th style="text-transform: none; background-color: #023d54; color: white;">Image</th>
            <th style="text-transform: none; background-color: #023d54; color: white;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sliders as $slider)
        <tr>
          <td>{{ $slider->id }}</td>
          <td><img src="{{ $slider->image }}" style="width: 240px; height: auto;"></td>
                <td>
                    <a class="btn btn-primary mt-1" href="{{ route('admin.slider.edit',['id'=>$slider->id])}}" ><i class="fas fa-edit"></i></a>
                    <a class="btn btn-danger mt-1" href="{{ route('admin.slider.delete',['id'=>$slider->id])}}"><i class="fas fa-trash-alt"></a></td>
                </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection
