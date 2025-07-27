@extends('admin.main')

@section('content')

<div class="container row">
    <div class="col-md-10 mx-auto">
        <h2>Users List</h2>
<table class="table table-bordered text-center">
    <thead>
        <tr>
              <th style="text-transform: none; background-color: #023d54; color: white;">ID</th>
              <th style="text-transform: none; background-color: #023d54; color: white;">User Name</th>
              <th style="text-transform: none; background-color: #023d54; color: white;">Email</th>
              <th style="text-transform: none; background-color: #023d54; color: white;">Role</th>
              <th style="text-transform: none; background-color: #023d54; color: white;">Action</th>

        </tr>
    </thead>

    <tbody>
        @foreach($users as $user)
           <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->role }}</td>
              <td><a class="btn btn-primary mt-1" href="{{ route('admin.user.edit',['id'=>$user->id])}}" ><i class="fas fa-edit"></i></a>
           </tr>
       @endforeach
    </tbody>
</table>
    </div>
</div>

@endsection
