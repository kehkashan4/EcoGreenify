@extends('user.main')

@section('content')

<!-- Hero Section -->
<div class="container-fluid p-0" style="overflow-x: hidden;">
    <div class="row d-flex align-items-center justify-content-center text-white"
         style="background: url('{{ asset('images/issueshero.jpeg') }}') no-repeat center center/cover; height: 450px;">
         <div class="col-md-8">
            <h1 class="text-center" style="font-weight: bold; font-size: 43px;">Pakistan is facing numerous environmental issues that require urgent action</h1>
         </div>
    </div>
</div>

<!-- Environmental Issues Overview -->
<div class="container my-5">
    <div class="row justify-content-center">
         <div class="col-md-10 text-center">
           <h2 style="font-size: 40px; font-weight: bold; font-family: 'Times New Roman', serif;">Overview</h2>
           <p class="py-2" style="font-size: 21px">Pakistan ranks among the world’s most at-risk countries to the effects of climate change, even though it adds very little to global pollution. It is facing more and more serious weather conditions, like drought, floods, and very hot weather, that are putting food and water safety at risk for millions of Pakistanis. These effects are made worse by the growing pressure on Pakistan’s important natural environments.
           </p>
         </div>
    </div>
 </div>

<!-- Image and Description Section -->
<div class="container-fluid my-3">
    @foreach ($issues as $index => $issue )
        <div class="row align-items-center mb-5">
             @if ($index % 2==0)
                 <div class="col-md-6 p-0">
                    <img src="{{ $issue->image}}" class="img-fluid" alt="">
                 </div>
                 <div class="col-md-6" style="padding: 5rem; background-color: #023d54; color: white;">
                     <h2 style="font-size: 38px" class="fw-bold">{{ $issue->title }}</h2>
                     <p style="font-size: 24px" class="py-2">{!! $issue->description !!}</p>
                 </div>
             @else
                 <div class="col-md-6" style="padding: 5rem; background-color: #023d54; color: white;">
                     <h2 style="font-size: 38px" class="fw-bold">{{ $issue->title }}</h2>
                     <p style="font-size: 24px" class="py-2">{!! $issue->description !!}</p>
                 </div>
                 <div class="col-md-6 p-0">
                    <img src="{{ $issue->image}}" class="img-fluid" alt="">
                 </div>
             @endif
       </div>
    @endforeach
</div>

@endsection

