@extends('layouts.main')

@section('content')
    <!--- PANTALLAS GRANDES -->
    <div class="container-fluid p-0 d-md-flex fondo-negro h-100 desktop-images">
        <div class="w-100 d-flex justify-content-center align-items-center h-100">
            <img class="redimensionar" src="{{ asset('img/assents/img_2152.jpg') }}" alt="Image">
        </div>
        <div class="w-100 d-flex justify-content-center align-items-center h-100">
            <img class="redimensionar" src="{{ asset('img/assents/img_2153.jpg') }}" alt="Image">
        </div>
    </div>
    <!--- PANTALLAS GRANDES -->

    <!--- PANTALLAS MOVILES -->
    <!--- Carousel Start -->
    <div class="container-fluid p-0 mobile-carousel">
        <div id="blog-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img class="w-100 redimensionar" src="{{ asset('img/assents/img_2153.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#blog-carousel" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#blog-carousel" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
    <!-- Carousel End -->
    <!--- PANTALLAS MOVILES -->

    <!-- About Start -->
    <div class="container py-5">
        <div class="row align-items-center">
            
            @include('partials.about-carousel')

            @include('partials.about1')
            
            <!-- Features Start -->
            @include('partials.about2')
            <!-- Features End -->

            <!-- GYM Feature Start -->
            @include('partials.beneficios')
            <!-- GYM Feature End -->

            <!-- Class Timetable Start -->
            @include('partials.class')
            <!-- Class Timetable End -->

            <!-- Team Start -->
            @include('partials.team')
            <!-- Team End -->
        </div>
    </div>
@endsection
