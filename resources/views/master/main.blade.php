<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FYP Project</title>
    <link rel="stylesheet" href="{{asset ('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{asset ('leaflet/leaflet.css')}}">
    <script src="{{asset ('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset ('leaflet/leaflet.js')}}"></script>
</head>
<body>
    <style>
        .navbar{
            background: #023d54;
        }
        .navbar-brand{
           color: white;
           font-weight: bold;
        }
        .navbar-brand:hover {
            color: white !important;
        }
        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            display: block;
            margin-top: 5px;
            right: 0;
            background: white;
            transition: width .3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
            left: 0; background: white;
        }
        .navbar-toggler{
            filter: invert(1);
        }
        .color{
            background-color: #023d54;
        }
        .btn-custom:hover{
            background-color: #28a745;
        }
    </style>
    <div class="navbar navbar-expand-md">
        <div class="container">
            <a class="navbar-brand" href="{{ route('website.home')}}">
                <img width="25" class="me-1 mb-1" src="{{ asset('logo.png')}}" alt="">EcoGreenify
            </a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-light" href="{{ route('website.home')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="{{ route('website.map')}}">Interactive Map</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="{{ route('website.footprint')}}">Carbon Footprint</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="{{ route('website.issues')}}">Issues</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="{{ route('website.mart')}}">Greenify Mart</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="{{ route('website.challenges')}}">EcoChallenges</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="{{ route('website.about')}}">About Us</a></li>
                 </ul>
                 <a href="{{ route('home')}}" class="btn ms-2 btn-custom" style="background-color: #39b54a; color: white">Sign Up</a>
            </div>
         </div>
    </div>

    <div>
        @yield('home')
    </div>

    <footer class="color">
        <div class="container mt-3 mb-3">
           <div class="row py-3">
               <div class="col-12 col-md-4">
                   <div class="container text-center">
                    <h4 class="text-light">About Us</h4>
                    <p class="text-light">EcoGreenify is dedicated to raising awareness for sustainable living and making a positive impact on the environment.</p>
                   </div>
               </div>

               <div class="col-12 col-md-4 text-center">
                   <h4 class="text-light">Quick Links</h4>
                   <p><a class="text-light" href="{{ route('website.home')}}">Home</a></p>
                   <p><a class="text-light" href="{{ route('website.about')}}">About Us</a></p>
                   <p><a class="text-light" href="#">Privacy Policy</a></p>
                   <p><a class="text-light" href="#">Terms of Service</a></p>
               </div>

               <div class="col-12 col-md-4 text-center">
                   <h4 class="text-light">Contact Information</h4>
                   <p class="text-light">EcoGreenify@gmail.pk</p>
                   <h4 class="text-light">Follow Us</h4>
                   <i class="fab fa-facebook me-1" style="color: white; font-size: 20px;"></i>
                   <i class="fab fa-instagram me-1" style="color: white; font-size: 20px;"></i>
                   <i class="fab fa-twitter me-1" style="color: white; font-size: 20px;"></i>
               </div>
           </div>
        </div>
       </footer>

</body>
</html>
