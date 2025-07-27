@extends('admin.main')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Product List</h2>
        <a href="{{ route('admin.product.create')}}" class="btn" style="background-color: #39b54a; color: white;">Create New Product</a>
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
                <th style="text-transform: none; background-color: #023d54; color: white;">Product Name</th>
                <th style="text-transform: none; background-color: #023d54; color: white;">Price</th>
                <th style="text-transform: none; background-color: #023d54; color: white;">Quantity</th>
                <th style="text-transform: none; background-color: #023d54; color: white;">Image</th>
                <th style="text-transform: none; background-color: #023d54; color: white;">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock_quantity }}</td>
                <td><img src="{{ $product->image }}" style="width: 70px; height: 70px; object-fit: cover;"></td>
                <td>
                    <a class="btn btn-primary mt-1" href="{{ route('admin.product.edit',['slug'=>$product->slug])}}" ><i class="fas fa-edit"></i></a>
                    <a class="btn btn-danger mt-1" href="{{ route('admin.product.delete',['id'=>$product->id])}}"><i class="fas fa-trash-alt"></a></td>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        {{ $products->links('pagination::bootstrap-5')}}
    </div>
</div>

@endsection
