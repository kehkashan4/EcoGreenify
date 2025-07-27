@extends('user.main')

@section('content')

<div style="overflow-x: hidden;">
    <div style="display: flex; justify-content: center;">
        <img src="{{ asset('images/martlogo.png')}}" alt="" style="width:130px;">
    </div>


    <div style="background-color: #023d54; color: white;" class="mt-2 py-3">
        <div class="row" style="text-align: center;">
            <div class="col-md-8 mx-auto">
                  <h2 style="font-size: 36px;">{{ $category->name }}</h2>
                  <div style="font-size: 24px;">{!! $category->description !!}</div>
            </div>
        </div>
    </div>



    <div class="container mt-4">
        <div class="row">
            @foreach ($category->products as $product)
                <div class="col-md-3 mx-auto py-4">
                    <a href="{{ route('product.show', ['slug'=>$product->slug]) }}" class="text-decoration-none text-dark">
                        <div class="card h-100 shadow">
                            <img src="{{  $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">Rs: {{ $product->price }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
