@extends('user.main')

@section('content')

<style>
    .whatsapp-float{
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
    }
    .whatsapp-float img{
        width: 60px;
        height: 60px;
        cursor: pointer;
        transition: transform 0.3s ease;
    }
   .whatsapp-float img:hover {
        transform: translateY(-8px);
    }

</style>
<!-- Whatsapp Icon -->
<div id="whatsapp-link" class="whatsapp-float" data-admin="{{ $admin->phone }}">
    <img src="https://img.icons8.com/color/48/000000/whatsapp--v1.png" alt="Whatsapp"/>
</div>

<div class="d-flex justify-content-between align-items-start position-relative px-3 py-2" style="min-height: 145px;">
    <div class="invisible"> </div>
    <div class="text-center mx-auto" style="position: absolute; left: 50%; transform: translateX(-50%);">
        <img src="{{ asset('images/martlogo.png') }}" alt="Mart Logo" style="width: 130px;">
    </div>
    <div style="position: relative; width: 100%; max-width: 320px;">
        <i class="fas fa-search" style="position: absolute; top: 50%; left: 10px; transform: translateY(-50%); color: #023d54;"></i>
        <input type="text" id="search" placeholder="Search ...." style="padding-left: 35px; border-radius: 25px; width: 100%; border: 1.5px solid #023d54; height: 36px;">
        <div id="searchSuggestions" class="list-group" style="position: absolute; top: 40px; width: 100%; background: white;"></div>
     </div>
</div>

<!-- Slider -->
<div class="container-fluid p-0">
    <div id="carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
        <div class="carousel-inner">
              @foreach($sliders as $index => $slider)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img src="{{ $slider->image}}" style="height: 450px;" class="w-100" alt="Slider Image">
                </div>
              @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
    </div>
</div>

<div class="container" style="margin-top: 50px">
    @foreach ($categories as $category)
    <!-- Category Image -->
    <a href="{{ route('category.show', ['slug'=> $category->slug]) }}">
        <img src="{{ $category->image }}" class="img-fluid w-100 mb-3" style="height: 520px; object-fit: contain;" alt="{{ $category->name }}">
    </a>

    <!-- Product Image -->
    <div class="container py-4 px-5">
        <div class="row mb-5">
            @foreach ($category->products->take(4) as $product)
                <div class="col-6 col-md-3">
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
    @endforeach
</div>

<!-- Whatsapp Contact -->
<script>
     document.getElementById("whatsapp-link").addEventListener("click", function () {

        const adminPhone = this.dataset.admin;
        const message = "Hello! I want more information about your mart products.";
        const encodedMessage = encodeURIComponent(message);
        const url = "https://wa.me/" + adminPhone + "?text=" + encodedMessage;
        window.open(url, '_blank');
    });
</script>

<!-- Search -->
<script>
    const searchInput = document.getElementById('search');
    const suggestionBox = document.getElementById('searchSuggestions');

    let debounceTimer;

    searchInput.addEventListener('keyup', function () {
        const query = this.value.trim();

        clearTimeout(debounceTimer);

        if (query.length < 2) {
            suggestionBox.innerHTML = '';
            return;
        }

        debounceTimer = setTimeout(() => {
            fetch(`/search-suggestions?q=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    suggestionBox.innerHTML = '';

                    if (data.length === 0) {
                        const notFound = document.createElement('div');
                        notFound.classList.add('list-group-item');
                        notFound.textContent = 'No results found';
                        suggestionBox.appendChild(notFound);
                        return;
                    }

                    data.forEach(item => {
                        const suggestion = document.createElement('a');
                        suggestion.classList.add('list-group-item', 'list-group-item-action');
                        suggestion.href = item.type === 'product'
                            ? `/product/${item.slug}`
                            : `/category/${item.slug}`;
                        suggestion.textContent = item.name;
                        suggestionBox.appendChild(suggestion);
                    });
                });
        }, 300); // debounce delay
    });
</script>

@endsection
