@extends('admin.main')

@section('content')

<div class="container row">
    <div class="col-md-10 mx-auto">
        <h2>Edit User Form</h2>
        <form action="{{ $user->id==null? route('admin.user.store') :
        route('admin.user.update',['id'=>$user->id])}}" method="post">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label"> User Name </label>
        <input
            type="text"
            class="form-control"
            name="name"
            id="name"
            placeholder="Enter User Name Here"
            value="{{ $user->name }}"
        />

    <div class="mb-3">
        <label for="email" class="form-label"> Email </label>
        <input
            type="text"
            class="form-control"
            name="email"
            id="email"
            placeholder="Enter Email Here"
            value="{{ $user->email }}"
        />
    </div>

    <div class="mb-3">
        <label for="role">Select a Role</label>
        <select name="role" id="role" class="form-select">
            <option>{{ $user->role}}</option>
            <option value="">User</option>
            <option value="">Admin</option>
        </select>
    </div>

        <input type="submit" value="Save" class="btn mt-2" style="background-color: #39b54a; color:white;">
    </form>
    </div>
</div>

@endsection
