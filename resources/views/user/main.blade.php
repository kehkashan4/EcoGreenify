<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FYP Project</title>
    <link rel="stylesheet" href="{{asset ('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <script src="{{asset ('js/bootstrap.bundle.min.js')}}"></script>

</head>
<body>
<style>
    .navbar{
        background: #023d54;
    }
    .navbar-brand, .navbar-brand:hover, .navbar-brand:focus, .navbar-brand:active{
       color: white;
       font-weight: bold;
    }
    .nav-link {
        position: relative;
    }
    .nav-menu::after {
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
    .nav-menu:hover::after {
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
    .dropdown-item:focus,
    .dropdown-item:active,
    .dropdown-item:hover {
        background-color: transparent !important;
        color: inherit !important;
        outline: none !important;
    }
</style>

    <div class="navbar navbar-expand-md sticky-top">
        <div class="container-fluid px-5">
            <a class="navbar-brand" style="margin-left: 0;" href="#">
                <img width="25" class="me-1 mb-1" src="{{ asset('images/logo.png')}}" alt="">EcoGreenify
            </a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link nav-menu text-light" href="{{ route('page')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link nav-menu text-light" href="{{ route('user.map')}}">Interactive Map</a></li>
                    <li class="nav-item"><a class="nav-link nav-menu text-light" href="{{ route('user.footprint')}}">Carbon Footprint</a></li>
                    <li class="nav-item"><a class="nav-link nav-menu text-light" href="{{ route('user.issues')}}">Blog Posts</a></li>
                    <li class="nav-item"><a class="nav-link nav-menu text-light" href="{{ route('user.mart')}}">Greenify Mart</a></li>
                    <li class="nav-item"><a class="nav-link nav-menu text-light" href="{{ route('user.challenges')}}">EcoChallenges</a></li>
                    <li class="nav-item"><a class="nav-link nav-menu text-light" href="{{ route('user.about')}}">About Us</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-1">

                    {{-- If user is not logged in --}}
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="btn" style="background-color: #39b54a; color: white; margin-right: 0;" data-bs-toggle="modal" data-bs-target="#loginModal">
                                    {{ __('Sign up') }}
                                </a>
                            </li>
                        @endif
                    @endguest

                    {{-- If user is logged in --}}
                    @auth
                        @if(Auth::user()->role == 'user')
                        <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white; cursor: pointer;">

                        @if(Auth::user()->profile)
                            <img src="{{ asset('ecoimages/img/' . Auth::user()->profile) }}" alt="Profile" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">

                        @else
                        {{-- Circle with first letter of name --}}
                        <div class="d-flex justify-content-center align-items-center" style="width: 40px; height: 40px; border-radius: 50%; background-color: #fff9E2; color: #023d54; font-weight: bold; font-size: 1.25rem; text-transform: uppercase; margin-right: 10px;">
                             {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                         @endif

                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#userProfileModal">
                                <i class="fas fa-user me-2"></i>{{ __('Profile') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt me-2"></i>{{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                        </li>
                        @endif
                    @endauth
                </ul>
        </div>
    </div>
</div>

<div>
    @yield('content')
</div>

<!-- Footer Section -->
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
                   <p><a class="text-light" href="{{ route('page')}}">Home</a></p>
                   <p><a class="text-light" href="{{ route('user.about')}}">About Us</a></p>
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

    @include('auth.login')
    @include('auth.register')
    @include('Kehkashan.userprofile')

</body>
</html>
