@extends('master.main')

@section('home')
    <style>
      .feature-section{
         background-color: #fff9e2;
      }
      .card-feature{
         background-color: white;
         border: 1px solid #d1d1d1;
         transition: transform 0.3s ease;
      }
      .card-feature:hover{
         transform: translateY(-5px);
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

    <div style="position: relative;">
       <img src="{{ asset('homehero01.jpg') }}" alt="" class="img-fluid mt-1" style="width: 100%; height: 90vh; object-fit: cover;">
       <div style="position: absolute; inset: 0; display: flex; flex-direction: column; justify-content: center; align-items: center; color: white; text-align: center;">
            <h1 style="font-weight: bold; font-size: 50px;">Building a Sustainable Future Together</h1>
            <p style="font-weight: 600; font-size: 25px;">Small Changes, Big Impact. Join the Green Movement!</p>
            <div class="hero-button mt-3">
                <a href="{{ route('website.footprint')}}" class="btn me-3">Calculate Your Carbon Footprint</a>
                <a href="{{ route('website.challenges')}}" class="btn">Explore Eco-Friendly Initiatives</a>
            </div>
       </div>
   </div>

     <div class="container my-4">
        <div class="row justify-content-center">
             <div class="col-md-8 text-center">
               <h2 style="font-weight: bold;">Website Overview and Mission</h2>
               <p>EcoGreenify is a platform dedicated to providing eco-friendly solutions and ideas to improve our country’s environment. Our  mission is to encourage sustainable habits and actions that will make our surroundings cleaner and healthier for everyone.</p>
               <p>On our website, you’ll find eco-friendly products, tips, and practical ways to make your lifestyle more sustainable.</p>
             </div>
        </div>
     </div>

   <section class="feature-section py-3">
      <div class="container text-center">
         <h2 class="mb-5" style="font-weight: bold;">Our Key Features</h2>
            <div class="row">
                <div class="col-6 col-md-3 mb-3">
                   <div class="card-feature borber p-2 rounded">
                      <div class="card-body text-center">
                         <img width="100" src="{{asset('footprint.png')}}" alt="">
                         <h4>Carbon Footprint</h4>
                         <p>Track your impact and discover ways to reduce it.</p>
                      </div>
                    </div>
                </div>

                <div class="col-6 col-md-3 mb-3">
                 <div class="card-feature borber p-2 rounded">
                    <div class="card-body text-center">
                       <img width="85" src="{{asset('map.png')}}" alt="">
                       <h4>Interactive Map</h4>
                       <p>Find Local Eco-Friendly Projects Near You.</p>
                    </div>
                  </div>
              </div>

              <div class="col-6 col-md-3 mb-3">
                 <div class="card-feature borber p-2 rounded">
                    <div class="card-body text-center">
                       <img width="115" src="{{asset('mart.png')}}" alt="">
                       <h4>Greenify Mart</h4>
                       <p>Make a Difference with Every Eco-Friendly Purchase.</p>
                    </div>
                  </div>
              </div>

              <div class="col-6 col-md-3 mb-3">
                 <div class="card-feature borber p-2 rounded">
                    <div class="card-body text-center">
                       <img width="105" src="{{asset('challenges.png')}}" alt="">
                       <h4>Eco-Challenges</h4>
                       <p>Engage in fun challenges and earn rewards.</p>
                    </div>
                  </div>
              </div>
             </div>
        </div>
   </section>

   <h2 class="text-center mt-3" style="font-weight: bold;">Why Care About Environment?</h2>
   <div class="container py-3">

        <div class="row">
             <div class="col-md-6 mt-3">
                <p >Pakistan loses more than <b>200 million trees per year,</b> which causes flooding and raises CO2 levels in the atmosphere. This affects air quality, contributing to respiratory problems and other health concerns. We should thus realize the importance of immediate action on environmental issues.</p>
                <p>Every year,<b> more than 120,000 people die prematurely </b>Pakistan as a result of air pollution, which is primarily caused by emissions from cars, factories, and crop burning. Air pollution also intensifies climate change by trapping heat in the atmosphere, contributing to global warming.</p>
                <p>Climate change-related floods cause considerable losses in Pakistan, <b>costing $10 billion each year.</b> These floods destroy crops, ruin infrastructure, and displace millions of people, leaving the country more exposed.</p>

             </div>
             <div class="col-md-6">
                  <div class="container">
                        <img width="500" class="img-fluid rounded" src="{{ asset('wood2.jpg')}}" alt="">
                  </div>
             </div>
        </div>
   </div>

   <div class="container mt-3">
    <h2 class="text-center" style="font-weight: bold;">Interactive Preview</h2>
        <div class="row py-3">
             <div class="col-12 col-md-6 mb-3">
                   <div class="card-preview p-4 text-center">
                        <h4>Greenify Mart</h4>
                        <p>Eco-friendly shopping made easy with Greenify Mart.</p>
                        <a href="{{ route('website.mart')}}" class="btn w-100">Buy Now</a>
                   </div>
             </div>
             <div class="col-12 col-md-6 mb-3">
                <div class="card-preview p-4 text-center">
                     <h4>Eco-Friendly Map</h4>
                     <p>Find Eco-friendly places and green initiatives near you.</p>
                     <a href="{{ route('website.map')}}" class="btn w-100">Explore</a>
                </div>
          </div>
        </div>
   </div>
@endsection
