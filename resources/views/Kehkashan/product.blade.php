@extends('user.main')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">

            <!-- Product Images -->
            <div class="col-md-6">
                    <img src="{{ $product->image}}" class="img-fluid" alt="">
            </div>

             <!-- Product Info -->
            <div class="col-md-6">
                <h2 class="mb-1">{{ $product->name }}</h2>
                <h4 style="color: #16A08B;">Rs.{{ number_format($product->price) }}</h4>

                <p class="mb-1"><strong>Description:</strong> {!! $product->description !!}</p>

                <p class="mb-1">
                   <strong>Availability:</strong>
                        @if($product->is_available === 'instock')
                            <span style="color: #16A08B; font-weight: bold;">In Stock</span>
                        @else
                            <span class="text-danger">Out of Stock</span>
                        @endif
                </p>

                <p><strong>Category:</strong> {{ $product->category->name ?? 'N/A' }}</p>

                <!-- Add to Cart Form -->
                <form action="{{ route('cart.add') }}" method="POST" class="d-flex flex-column">
                @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="input-group mb-3" style="width: 150px;">
                        <button class="btn" style="border-color: #023d54;" type="button" onclick="decreaseQty()">-</button>
                        <input type="text" name="quantity" id="quantity" class="form-control text-center" value="1" readonly>
                        <button class="btn" style="border-color: #023d54;" type="button" onclick="increaseQty()">+</button>
                    </div>
                        <button class="btn w-50" type="submit" style="background-color: #39b54a; color: white;">Add to Cart</button>
                    </form>
            </div>
            </div>
        </div>
    </div>
</div>


<!-- JS for Quantity Buttons -->
<script>
    function increaseQty() {
        let qty = document.getElementById("quantity");
        qty.value = parseInt(qty.value) + 1;
    }

    function decreaseQty() {
        let qty = document.getElementById("quantity");
        if (parseInt(qty.value) > 1) {
            qty.value = parseInt(qty.value) - 1;
        }
    }
</script>

@endsection
