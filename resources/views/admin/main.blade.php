<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="icon" href="{{ asset('images/logo.png')}}" type="image/x-icon"/>
     <link rel="stylesheet" href="{{asset ('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <style>
     body {
        overflow-x: hidden;
    }
    .sidebar {
        width: 270px;
        position: fixed;
        background-color: #023d54;
        transition: all 0.3s ease;
        height: 100vh;
        color: white;
    }
    .text, .fas{
        color: white;
    }

    .sidebar.collapsed {
        width: 70px;
    }

    .sidebar.collapsed .navbar-brand {
        display: none;
    }

    .sidebar.collapsed .text{
        display: none;
    }
     .sidebar.collapsed .nav-li nk{
        text-align: center;
        padding: 0%;
    }
    .sidebar.collapsed .submenu-icon {
    display: none !important;
    }
    .toggle-btn i {
        font-size: 1.2rem;
    }
    .main{
        margin-left: 270px;
        flex-grow: 1;
        width: calc(100% - 270px);
        transition: margin-left 0.3s ease;

        }
    .sidebar-collapsed .main{
         margin-left: 70px;
         width: calc(100% - 70px);
    }
    .profile-img {
        width: 40px;
        height: 40px;
        object-fit: cover;

    }
    .dropdown-item:focus,
       .dropdown-item:active,
       .dropdown-item:hover {
            background-color: transparent !important;
            color: inherit !important;
            outline: none !important;
        }
    </style>
</head>
<body>
<div class="wrapper d-flex">
    <div class="sidebar expanded" id="sidebar">
        <div class="d-flex justify-content-between align-items-center p-4">

            <!-- Logo & Brand name - will hide when collapsed -->
            <div class="brand d-flex align-items-center" id="brand">
                <a class="navbar-brand m-0 fw-bold" href="#">
                    <img width="30" class="me-1 mb-1" src="{{ asset('images/logo.png')}}" alt="">
                    EcoGreenify
                </a>
            </div>

            <!-- Toggle Button -->
            <button class="toggle-btn p-0" id="toggleSidebar" type="button" style="background-color: transparent; border: #fff9e2;">
                <i class="fas fa-angle-double-left text-light"></i>
            </button>

        </div>

        <div style="height: 1px; background-color: #fff9e2; margin-top: 8px;"></div>

        <div class="container mt-4">
            <ul class="nav flex-column mt-2">
            <li><a href="#" class="nav-link"><i class="fas fa-gauge"></i> <span class="text ms-2">Dashboard</span></a></li>
            <li><a href="{{ route('admin.user.index')}}" class="nav-link"><i class="fas fa-users"></i> <span class="text ms-2">Registered Users</span></a></li>
            <li><a href="{{ route('admin.featurecard.index')}}" class="nav-link"><i class="fas fa-layer-group"></i> <span class="text ms-2">Feature Card</span></a></li>
            <li>
                <a class="nav-link" data-bs-toggle="collapse" href="#locationMenu" role="button">
                        <i class="fas fa-location-dot"></i><span class="text ms-2">Location</span>
                        <i class="fas fa-angle-down submenu-icon" style="font-size: 0.4rem;"></i>
                </a>
                <div class="collapse" id="locationMenu">
                    <a href="{{ route('admin.province.index')}}" class="nav-link ps-5 text-light">Province</a>
                    <a href="{{ route('admin.city.index')}}" class="nav-link ps-5 text-light">City</a>
                    <a href="{{ route('admin.town.index')}}" class="nav-link ps-5 text-light">Town</a>
                </div>
            </li>
            <li><a href="{{ route('admin.marker.index')}}" class="nav-link"><i class="fas fa-tree"></i> <span class="text ms-2">Eco-Friendly Places</span></a></li>
            <li><a href="{{ route('admin.issue.index')}}" class="nav-link"><i class="fas fa-fas fa-recycle"></i> <span class="text ms-2">Environmental Issues</span></a></li>
             <li>
                <a class="nav-link" data-bs-toggle="collapse" href="#martMenu" role="button">
                        <i class="fas fa-shopping-cart"></i></i><span class="text ms-2">Greenify Mart</span>
                        <i class="fas fa-angle-down submenu-icon" style="font-size: 0.4rem;"></i>
                </a>
                <div class="collapse" id="martMenu">
                    <a href="{{ route('admin.slider.index')}}" class="nav-link ps-5 text-light">Slider</a>
                    <a href="{{ route('admin.category.index')}}" class="nav-link ps-5 text-light">Category</a>
                    <a href="{{ route('admin.product.index')}}" class="nav-link ps-5 text-light">Product</a>
                </div>
            </li>

            </ul>
        </div>

    </div>

    <!-- Content area -->
    <div class="main" id="mainContent">
        <nav class="navbar navbar-expand-md sticky-top bg-white shadow-sm px-4">
            <div class="container-fluid">
                <form class="d-flex w-50">
                    <input class="form-control" type="search" placeholder="Search..." aria-label="Search">
                </form>

                <div class="dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if(Auth::user()->profile)
                            <img src="{{ asset('ecoimages/img/' . Auth::user()->profile) }}" class="rounded-circle profile-img" alt="Profile">
                        @else
                            <img src="{{ asset('assets/img/default-profile.png') }}" class="rounded-circle profile-img" alt="Default">
                        @endif
                        <span class="ms-2 text-black">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#adminProfileModal"><i class="fas fa-user me-2 text-black"></i>Profile</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item" type="submit"><i class="fas fa-sign-out-alt me-2 text-black"></i>Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid mt-4">
            @yield('content')
        </div>
    </div>
</div>

<script src="{{asset ('js/bootstrap.bundle.min.js')}}"></script>
 <script>
    document.addEventListener("DOMContentLoaded", function () {
        const sidebar = document.getElementById("sidebar");
        const toggleBtn = document.getElementById("toggleSidebar");

        toggleBtn.addEventListener("click", function () {
            // Toggle sidebar collapse
            sidebar.classList.toggle("collapsed");

            // Toggle class on body to affect .main layout
            document.body.classList.toggle("sidebar-collapsed");

            // Change the icon direction
            const icon = toggleBtn.querySelector("i");

            if (sidebar.classList.contains("collapsed")) {
                icon.classList.remove("fa-angle-double-left");
                icon.classList.add("fa-angle-double-right");
            } else {
                icon.classList.remove("fa-angle-double-right");
                icon.classList.add("fa-angle-double-left");
            }
        });
    });
</script>

@include('Kehkashan.adminprofile')

</body>
</html>
