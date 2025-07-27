@extends('user.main')

@section('content')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
         $.ajaxSetup({
                headers: {
                     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    }
            });
    </script>
</head>


<style>
      .card-feature{
         transition: transform 0.3s ease;
      }
      .card-feature:hover{
         transform: translateY(-8px);
      }
      .hero-button a{
          background-color: #39b54a;
          color: white;
          padding: 10px 20px;
          font-weight: bold;
      }
      .hero-button a:hover {
        background-color: #28a745 !important;
        color: white;
      }
      .card-preview{
          background-color: white;
          border: 1px solid #d1d1d1;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }
      .card-preview a{
           border-color: #39b54a;
           color: #39b54a;
      }
      .card-preview a:hover{
           background-color: #39b54a;
           color: white;

      }
</style>

<!-- Hero Section-->
    <div style="position: relative; overflow-x: hidden;">
       <img src="{{ asset('images/homehero01.jpg') }}" alt="" class="img-fluid" style="width: 100%; height: 90vh; object-fit: cover;">
       <div style="position: absolute; inset: 0; display: flex; flex-direction: column; justify-content: center; align-items: center; color: white; text-align: center;">
            <h1 style="font-weight: bold; font-size: 50px; margin-top: 35px;">Building a Sustainable Future Together</h1>
            <p style="font-weight: 600; font-size: 25px;">Small Changes, Big Impact. Join the Green Movement!</p>
            <div class="hero-button mt-1 row">
                <div class="col-12 col-md-auto mb-2 mb-sm-2">
                    <a href="{{ route('user.footprint')}}" class="btn">Calculate Your Carbon Footprint</a>
                </div>
                <div class="col-12 col-md-auto">
                    <a href="{{ route('user.challenges')}}" class="btn">Explore Eco-Friendly Initiatives</a>
                </div>
            </div>
       </div>
   </div>

     <div class="container my-5">
        <div class="row justify-content-center">
             <div class="col-md-10 text-center">
               <h2 style="font-size: 40px; font-weight: bold; font-family: 'Times New Roman', serif;">Website Overview and Mission</h2>
               <p style="font-size: 21px" class="mt-3">EcoGreenify is a platform dedicated to providing eco-friendly solutions and ideas to improve our country’s environment. Our  mission is to encourage sustainable habits and actions that will make our surroundings cleaner and healthier for everyone.</p>
               <p style="font-size: 22px;">On our website, you’ll find eco-friendly products, tips, and practical ways to make your lifestyle more sustainable.</p>
             </div>
        </div>
     </div>

   <section class="py-3" style="background-color: #fff9e2">
      <div class="container text-center">
         <h2 class="mb-5" style="font-size: 40px; font-weight: bold; font-family: 'Times New Roman', serif;">Our Key Features</h2>
            <div class="row">

                @foreach ($featurecards as $featurecard )
                <div class="col-6 col-md-3 mb-3">
                   <div class="card card-feature">
                      <div class="card-body">
                        <img src="{{ $featurecard->image }}" class="d-block mx-auto py-0" style="width: 180px" alt="">
                        <h4>{{ $featurecard->title }}</h4>
                        <p style="font-size: 20px;">{{ $featurecard->tag_line }}</p>
                      </div>

                    </div>
                </div>
                @endforeach

            </div>
        </div>
   </section>



   <h2 class="text-center mt-4" style="font-size: 40px; font-weight: bold; font-family: 'Times New Roman', serif;">Why Care About Environment?</h2>
   <div class="container p-3 ">
        <div class="row">
             <div class="col-md-6 mt-3">
                <p style="font-size: 19px;">Pakistan loses more than <b>200 million trees per year,</b> which causes flooding and raises CO2 levels in the atmosphere. This affects air quality, contributing to respiratory problems and other health concerns. We should thus realize the importance of immediate action on environmental issues.</p>
                <p style="font-size: 19px;">Every year,<b> more than 120,000 people die prematurely </b>Pakistan as a result of air pollution, which is primarily caused by emissions from cars, factories, and crop burning. Air pollution also intensifies climate change by trapping heat in the atmosphere, contributing to global warming.</p>
                <p style="font-size: 19px;">Climate change-related floods cause considerable losses in Pakistan, <b>costing $10 billion each year.</b> These floods destroy crops, ruin infrastructure, and displace millions of people, leaving the country more exposed.</p>

             </div>
             <div class="col-md-6 mt-3">
                    <img width="600" class="img-fluid rounded" src="{{ asset('images/wood2.jpg')}}" alt="">
             </div>
        </div>
   </div>


   <section class="mt-2" style="background-color: #f8f8f8;">
    <div class="container" style="padding: 50px;">
        @include('components.places.place',['markers'=>$markers])
    </div>
   </section>



<!-- AJAX Function for Like/Unlike -->
<script>
    function toggleLike(element) {
     @if (Auth::check()) // Check agar user login hai
         var markerId = $(element).data("place");
         var heartIcon = $(element);

         // Pehle UI update karo
         var isLiked = heartIcon.css("color") === "rgb(211, 211, 211)"; // Light gray

         if (isLiked) {
             heartIcon.css("color", "red");
         } else {
             heartIcon.css("color", "#d3d3d3");
         }

         // Ab AJAX request bhejo
         $.ajax({
             url: "/toggle-favorite",
             type: "POST",
             data: {
                 marker_id: markerId,
                 _token: "{{ csrf_token() }}"
             },
             success: function (response) {
                 if (response.status === "removed") {
                     heartIcon.css("color", "#d3d3d3");
                 } else {
                     heartIcon.css("color", "red");
                 }
             }
         });
     @else
         alert("Please login first!!");
     @endif
 }
</script>

<!-- Interactive Preview -->
   <div class="container mt-3">
    <h2 class="text-center" style="font-size: 40px; font-weight: bold; font-family: 'Times New Roman', serif;">Interactive Preview</h2>
        <div class="row py-3">
             <div class="col-12 col-md-6 mb-3">
                   <div class="card-preview p-4 text-center">
                        <h4>Greenify Mart</h4>
                        <p>Eco-friendly shopping made easy with Greenify Mart.</p>
                        <a href="{{ route('user.mart')}}" class="btn w-100">Buy Now</a>
                   </div>
             </div>
             <div class="col-12 col-md-6 mb-3">
                <div class="card-preview p-4 text-center">
                     <h4>Eco-Friendly Map</h4>
                     <p>Find Eco-friendly places and green initiatives near you.</p>
                     <a href="{{ route('user.map')}}" class="btn w-100">Explore</a>
                </div>
          </div>
        </div>
   </div>
@endsection
