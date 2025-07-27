@extends('admin.main')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Provinces List</h2>
        <a href="{{ route('admin.province.create')}}" class="btn" style="background-color: #39b54a; color: white;">Create New Province</a>
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
                  <th style="text-transform: none; background-color: #023d54; color: white;">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($provinces as $prov)
               <tr>
                  <td>{{ $prov->id }}</td>
                  <td>{{ $prov->name }}</td>
                  <td><a class="btn btn-primary mt-1" href="{{ route('admin.province.edit',['id'=>$prov->id])}}" ><i class="fas fa-edit"></i></a>
                  <a class="btn btn-danger mt-1" href="{{ route('admin.province.delete',['id'=>$prov->id])}}"><i class="fas fa-trash-alt"></a></td>
               </tr>
           @endforeach
        </tbody>
    </table>
</div>

@endsection
