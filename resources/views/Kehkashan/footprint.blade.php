@extends('master.main')

@section('home')

    <div style="position: relative; overflow-x: hidden;">
        <img src="{{ asset('images/foothero01.jpg') }}" alt="" class="img-fluid mt-5" style="width: 100%; height: 90vh; object-fit: cover;">
        <div style="position: absolute; inset: 0; display: flex; flex-direction: column; justify-content: center; align-items: center; color: white; text-align: center;">
            <h1 style="font-weight: 450;" class="fs-1 fs-md-3 ms-5 me-5 mt-5">Use our interactive map to locate environmentally favorable and polluting regions by providing feedback to help create a cleaner, greener world!</h1>
        </div>
    </div>
@endsection
