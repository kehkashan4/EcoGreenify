@extends('admin.main')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Cities List</h2>
        <a href="{{ route('admin.city.create')}}" class="btn" style="background-color: #39b54a; color: white;">Create New City</a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th style="text-transform: none; background-color: #023d54; color: white;">ID</th>
                <th style="text-transform: none; background-color: #023d54; color: white;">Province Name</th>
                <th style="text-transform: none; background-color: #023d54; color: white;">City Name</th>
                <th style="text-transform: none; background-color: #023d54; color: white;">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($cities as $city)
            <tr>
                <td>{{ $city->id }}</td>
                <td>{{ $city->province->name }}</td>
                <td>{{ $city->name }}</td>
                <td>
                    <a class="btn btn-primary mt-1" href="{{ route('admin.city.edit',['id'=>$city->id])}}" ><i class="fas fa-edit"></i></a>
                    <a class="btn btn-danger mt-1" href="{{ route('admin.city.delete',['id'=>$city->id])}}"><i class="fas fa-trash-alt"></a></td>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        {{ $cities->links('pagination::bootstrap-5')}}
    </div>
</div>

@endsection
