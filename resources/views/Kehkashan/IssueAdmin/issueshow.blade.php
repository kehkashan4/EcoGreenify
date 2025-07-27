@extends('admin.main')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Environmental Issues List</h2>
        <a href="{{ route('admin.issue.create')}}" class="btn" style="background-color: #39b54a; color: white;">Create New Issue</a>
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
                <th style="text-transform: none; background-color: #023d54; color: white;">Title</th>
                <th style="text-transform: none; background-color: #023d54; color: white;">Description</th>
                <th style="text-transform: none; background-color: #023d54; color: white;">Image</th>
                <th style="text-transform: none; background-color: #023d54; color: white;">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($issues as $issue)
            <tr>
                <td>{{ $issue->id }}</td>
                <td>{{ $issue->title }}</td>
                <td>{!! $issue->description !!}</td>
                <td><img src="{{ $issue->image }}" style="width: 70px; height: 70px; object-fit: cover;"></td>
                <td>
                    <a class="btn btn-primary mt-1" href="{{ route('admin.issue.edit',['id'=>$issue->id])}}" ><i class="fas fa-edit"></i></a>
                    <a class="btn btn-danger mt-1" href="{{ route('admin.issue.delete',['id'=>$issue->id])}}"><i class="fas fa-trash-alt"></a></td>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
