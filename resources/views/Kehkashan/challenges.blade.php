@extends('user.main')

@section('content')

<style>
    .btn-color, .btn-color:hover, .btn-color:focus, .btn-color:active{
        background-color: #39b54a !important;
        color: white !important;
    }
</style>

<div class="container-fluid p-0" style="overflow-x: hidden;">
    <div class="d-flex align-items-center justify-content-center" style="background: url('{{ asset('images/foothero02.jpg') }}') no-repeat center center/cover; height: 450px;">
        <div class="container-fluid py-2" style="background: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1))">
            <div class="row">
                <div class="col-md-8 mx-auto text-center">
                    <h2 class="text-center text-white" style="font-weight: bold; font-size: 43px;">Join the Eco Challenge</h2>
                    <p style="color: white; font-size: 20px;">Make a difference, one step at a time. Take action to reduce your environmental footprint.</p>
                    <a href="#start" class="btn btn-color btn-lg">Start the Challenge</a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Introduction Section -->
<section id="introduction" class="py-5">
    <div class="container text-center">
        <h2>What is the Eco Challenge?</h2>
        <p class="lead">
            Are you ready to make a real impact? The Eco Challenge is your chance to take small actions every day to help protect our planet.
            Whether it's reducing your plastic use or saving water, every action counts. Let’s work together for a greener, healthier world.
        </p>
        <a href="#challenges" class="btn btn-color">Start the Challenge</a>
    </div>
</section>

<!-- Daily/Weekly Challenges Section -->
<section id="challenges" class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-4">Today's Eco Challenge</h2>
        <div class="row">
            <!-- Challenge 1 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Switch Off Lights</h5>
                        <p class="card-text">Turn off unnecessary lights to save energy and reduce your carbon footprint.</p>
                        <p class="text-muted">Impact: Saves 1.5 kWh of energy daily.</p>
                        <a href="#" class="btn btn-color">Mark Completed</a>
                    </div>
                </div>
            </div>
            <!-- Challenge 2 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Use a Reusable Water Bottle</h5>
                        <p class="card-text">Avoid single-use plastics by using a reusable water bottle all day.</p>
                        <p class="text-muted">Impact: Reduces 167 plastic bottles yearly.</p>
                        <a href="#" class="btn btn-color">Mark Completed</a>
                    </div>
                </div>
            </div>
            <!-- Challenge 3 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Take a Shorter Shower</h5>
                        <p class="card-text">Reduce water usage by taking a shower for 5 minutes or less.</p>
                        <p class="text-muted">Impact: Saves up to 10 gallons of water per day.</p>
                        <a href="#" class="btn btn-color">Mark Completed</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Progress Tracker Section -->
<section id="progress-tracker" class="py-5">
    <div class="container text-center">
        <h2>Track Your Progress</h2>
        <p>You’ve completed <strong>10 challenges</strong>! Keep up the great work!</p>
        <div class="progress mx-auto" style="width: 50%;">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <p class="mt-3">Earn badges and track your environmental impact as you complete more tasks.</p>
    </div>
</section>

<!-- Leaderboard Section -->
<section id="leaderboard" class="bg-light py-5">
    <div class="container text-center">
        <h2>See How You Compare</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Name</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1st</td>
                    <td>Hassan Ali</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>2nd</td>
                    <td>Kehkashan</td>
                    <td>95</td>
                </tr>
                <tr>
                    <td>3rd</td>
                    <td>Ayesha</td>
                    <td>90</td>
                </tr>
            </tbody>
        </table>
        <a href="#" class="btn btn-color mt-3">Share Your Progress</a>
    </div>
</section>

<!-- Tips and Resources Section -->
<section id="resources" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Eco Tips & Resources</h2>
        <div class="row">
            <div class="col-md-4">
                <h5>Switch to LED Bulbs</h5>
                <p>Save energy and reduce electricity bills by replacing traditional bulbs with LEDs.</p>
            </div>
            <div class="col-md-4">
                <h5>Compost Food Waste</h5>
                <p>Turn kitchen scraps into nutrient-rich compost to enrich your garden and reduce landfill waste.</p>
            </div>
            <div class="col-md-4">
                <h5>Support Eco-Friendly Businesses</h5>
                <p>Shop from brands committed to sustainability and ethical practices.</p>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="#" class="btn btn-color">Explore More Tips</a>
        </div>
    </div>
</section>


@endsection
