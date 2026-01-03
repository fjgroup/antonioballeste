@extends('layouts.main')

@section('content')
    @include('partials.page-header', ['title' => 'NOSOTROS'])
<div class="container py-5">
    <div class="row align-items-center">
        <!-- About Start -->
        @include('partials.about-carousel')
        @include('partials.about1')
        <!-- About End -->

        <!-- Features Start -->
        @include('partials.about2')
        <!-- Features End -->
    </div>
</div>
@endsection
