@extends('admin.main')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Towns List</h2>
        <a href="{{ route('admin.town.create')}}" class="btn" style="background-color: #39b54a; color: white;">Create New Town</a>
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
            <th style="text-transform: none; background-color: #023d54; color: white;">Town Name</th>
            <th style="text-transform: none; background-color: #023d54; color: white;">Latitude</th>
            <th style="text-transform: none; background-color: #023d54; color: white;">Longitude</th>
            <th style="text-transform: none; background-color: #023d54; color: white;">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($towns as $town)
        <tr>
            <td>{{ $town->id }}</td>
            <td>{{ $town->province->name}}</td>
            <td>{{ $town->city->name }}</td>
            <td>{{ $town->name }}</td>
            <td>{{ $town->latitude }}</td>
            <td>{{ $town->longitude }}</td>

            <td>
                <a class="btn btn-primary mt-1" href="{{ route('admin.town.edit',['id'=>$town->id])}}" ><i class="fas fa-edit"></i></a>
                <a class="btn btn-danger mt-1" href="{{ route('admin.town.delete',['id'=>$town->id])}}"><i class="fas fa-trash-alt"></a></td>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


<div>
    {{ $towns->links('pagination::bootstrap-5')}}
</div>
</div>

@endsection
