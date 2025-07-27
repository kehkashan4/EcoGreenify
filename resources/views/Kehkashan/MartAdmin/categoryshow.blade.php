@extends('admin.main')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Category List</h2>
        <a href="{{ route('admin.category.create')}}" class="btn" style="background-color: #39b54a; color: white;">Create New Category</a>
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
                  <th style="text-transform: none; background-color: #023d54; color: white;">Category Name</th>
                  <th style="text-transform: none; background-color: #023d54; color: white;">Image</th>
                  <th style="text-transform: none; background-color: #023d54; color: white;">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($categories as $category)
               <tr>
                  <td>{{ $category->id }}</td>
                  <td>{{ $category->name }}</td>
                  <td><img src="{{ $category->image }}" style="width: 100px; height: 70px; object-fit: cover;"></td>
                  <td><a class="btn btn-primary mt-1" href="{{ route('admin.category.edit',['slug'=>$category->slug])}}"><i class="fas fa-edit"></i></a>
                  <a class="btn btn-danger mt-1" href="{{ route('admin.category.delete',['id'=>$category->id])}}"><i class="fas fa-trash-alt"></a></td>
               </tr>
           @endforeach
        </tbody>
    </table>
</div>

@endsection
