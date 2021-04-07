@extends('news.main')
@section('content')
    {{-- Slider --}}
    @include('news.pages.home.child-index.slider')

    {{-- Food Category --}}
    <div class="food-category food-category-col pt-100 pb-60">
        <div class="container">
            <div class="row">
                @include('news.pages.home.child-index.food_category')
            </div>
        </div>
    </div>

    {{-- Product --}}
    <div class="product-area pt-95 pb-70 gray-bg">
        <div class="container">
            <div class="section-title text-center mb-55">
                <h4>Most Populer</h4>
                <h2>Recent Products</h2>
            </div>
            <div class="row">
                @include('news.pages.home.child-index.product')
            </div>
        </div>
    </div>

    {{-- deal --}}
    @include('news.pages.home.child-index.deal')

    {{-- testimonial --}}
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

    <!-- service -->
    @include('news.block.service')

    {{-- blog-area --}}
    <div class="blog-area pb-70">
        <div class="container">
            <div class="section-title text-center mb-60">
                <h4>Latest News</h4>
                <h2>From Our Blog</h2>
            </div>
            <div class="row">
                @include('news.pages.home.child-index.blog')
            </div>
        </div>
    </div>

    <!-- modal -->
    @include('news.templates.modal_quick_view')
    
@endsection