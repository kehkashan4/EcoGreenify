@extends('user.main')

@section('content')


   <!-- Environmental Issues Slider -->
   <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/abouthero01.jpg')}}" class="d-block w-100" alt="Slide 1" class="img-fluid" style="height: 430px; object-fit:cover;">
            <div style="position: absolute;inset: 0;display: flex; flex-direction:column; justify-content:center; align-items: center; color:white;text-align: center;">
            <div class="container-fluid py-2" style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3))">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <h1 class="text-center" style="font-weight: bold; font-size: 35px;">Caring for the Earth is not our choice but in reality it’s our responsibility</h1>
                    </div>
               </div>
            </div>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/abouthero02.jpg')}}" class="d-block w-100" alt="Slide 2" class="img-fluid" style="height: 430px; object-fit:cover;">
            <div style="position: absolute;inset: 0;display: flex; flex-direction:column; justify-content:center; align-items: center; color:white;text-align: center; ">
            <div class="container-fluid py-2" style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3))">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <h1 class="text-center" style="font-weight: bold; font-size: 35px;">Every tree we plant helping us to make our world a better place</h1>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/abouthero03.jpg')}}" class="d-block w-100" alt="Slide 3" class="img-fluid" style="height: 430px; object-fit:cover;">
            <div style="position: absolute;inset: 0;display: flex; flex-direction:column; justify-content:center; align-items: center; color:white;text-align: center; ">
            <div class="container-fluid py-2" style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3))">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <h1 class="text-center" style="font-weight: bold; font-size: 35px;">Every Small steps we take  can help us to make environment clean</h1>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/abouthero04.jpg')}}" class="d-block w-100" alt="Slide 3" class="img-fluid" style="height: 430px; object-fit:cover;">
            <div style="position: absolute;inset: 0;display: flex; flex-direction:column; justify-content:center; align-items: center; color:white;text-align: center; ">
                <div class="container-fluid py-2" style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3))">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <h1 class="text-center" style="font-weight: bold; font-size: 35px;">Each small change we make can lead to a world of difference</h1>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
    </div>

      <!-- Protecting nature section-->
    <div class="container py-5">
        <div class="row align-items-center">
            <!--left text-->
    <div class="col-md-6">
    <h2 style="font-weight: bold; font-family: 'Times New Roman', serif;" class="fw-bold">Protecting Nature<br>for a sustainable Future</h2>
    <p class="mt-3" style="font-weight: 350; font-size:25px; font-family: 'Times New Roman', serif;">
        We care about protecting our planet for the future. Our goal is to inspire people to clean their environment where every small action  contributes to a cleaner, greener, and healthier Earth.our mission to safeguard the Earths natural ecosystem and promote sustainable practices.</p>
    </div>
    <!--Right text-->
    <div class="col-md-6 d-flex justify-content-center align-items-center">
        <img src="{{ asset('images/aboutcircle.jpg')}}" alt="Planting Tree" class="rounded-circle img-fluid "  style="width: 400px; height: 400px; object-fit: cover;">
    </div>
        </div>
    </div>

    <!--mission & vision section-->
    <div class="container-fluid py-2">
    <div class="row mt-3">
        <div class="col-md-6">
          <div class="card p-4" style="background-color: #023D54; color: white;">
            <h2 style="text-align: center; font-family: 'Times New Roman', serif;" class="fw-bold">Our Mission</h2>
            <p style="font-weight: 350; font-size:25px; font-family: 'Times New Roman', serif;">To conserve biodiversity, reduce carbon emissions, and inspire collective action for the environment.</p>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card p-4" style="background-color: #023D54; color: white;">
            <h2 style="text-align: center; font-family: 'Times New Roman', serif;" class="fw-bold">Our Vision</h2>
            <p style="font-weight: 350; font-size:25px; font-family: 'Times New Roman', serif;" >A world where people live in harmony with nature, and the Earth's resources are managed sustainably.</p>
          </div>
        </div>
        </div>
    </div>

<!--story section-->

    <div class="py-3 mt-5" style="background-color: #fff9E2">
        <div class="container">
            <div class="text-center">
                <h2 style="font-family: 'Times New Roman', serif;" class="fw-bold">Our Story</h2>
                    <p style="text-align: justify; weight: 400; font-size: 20px;">
                    EcoGreenify platform founded with the belief that awareness is first step toward change.Our journey began with a simple yet powerful vision to create a sustainable world for future generations. This plateform was born out of a desire to bring individuals and communities to nature while also reducing carbon footprints and promoting environmental practices. Our aim to help people connect with nature by sharing knowledge, spreading awareness and encouraging simple actions that lead to a cleaner and more sustainable life. Our plateform provides easy uderstandable tools and resourses for those looking to take impactfull steps towards sustainability.</p>
                </div>
        </div>

    </div>


  <!--form-->

    <!--left side-->
<div class="container mt-4">
    <div class="row">
    <div class="col-md-8 mx-auto">
        <h2 style="font-family: 'Times New Roman', serif;" class="fw-bold text-center">Contact Us</h2>
 <form>
  <div class="mt-2">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="name">
    </div>
    <div class="mb-3">
        <label for="user_email"class="form-label">Email</label>
        <input type="email" name="user_email" id="user_email" class="form-control">
    </div>
    <div class="mb-3">
        <label for="user_suggestion" class="form-label">Suggestion</label>
        <textarea name="user_descript" id="user_descript" rows="3" class="form-control"></textarea>
    </div>
    <div>
        <input type="submit" class="btn" value="Submit" style="background-color: #39B54A; border: none; color: white;">
    </div>
  </div>
</form>
    </div>
    </div>
</div>


@endsection
