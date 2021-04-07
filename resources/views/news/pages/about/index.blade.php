@extends('news.main')
@section('content')

        <!-- breadcumb -->
        @include('news.templates.breadcumb', ['name' => 'About Us'])

        <!-- statistic -->
        @include('news.pages.about.child-index.message')

        <!-- statistic -->
        <div class="project-count-area pb-70 pt-100 gray-bg">
            <div class="container">
                <div class="row">
                    @include('news.pages.about.child-index.statistic')
                </div>
            </div>
        </div>

        <!-- testimonial -->
        <div class="testimonial-area pt-90 pb-70 bg-img" style="background-image:url({{ asset('news/images/banner/banner-1.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 ml-auto mr-auto">
                        <div class="testimonial-wrap">
                            @include('news.partials.testimonial.testimonial')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- team -->
		<div class="team-ara pt-95 pb-70">
            <div class="container">
                <div class="section-title text-center mb-55">
                    <h2>Our Team</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing</p>
                </div>
                <div class="row">
                    @include('news.pages.about.child-index.team')
                </div>
            </div>
        </div>

@endsection
        
