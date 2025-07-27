@extends('user.main')

@section('content')

<div class="container-fluid mt-3">
    <div class="container px-5">
        <div class="row">
                 <!-- Left side: Selected card -->
                <div class="col-md-4">
                    <div class="card mt-3">
                        <div class="card-body p-0">
                            <img src="{{ $marker->image }}" class="card-img-top w-100" alt="">
                            <div class="px-2 py-2">
                                <p>{{ $marker->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Right side: Details -->
                <div class="col-md-6">
                    <div class="card p-3">
                        <h3>{{ $marker->place_name }}</h3>
                        <p><strong>Location:</strong> {{ $marker->address }}</p>
                        <p><strong>Latitude:</strong> {{ $marker->latitude }}</p>
                        <p><strong>Longitude:</strong> {{ $marker->longitude }}</p>
                        <p><strong>Description:</strong> {!! $marker->description !!}</p>
                    </div>
                </div>

           </div>
    </div>
</div>

@endsection
