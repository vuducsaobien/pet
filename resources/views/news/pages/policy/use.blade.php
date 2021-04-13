@extends('news.main')
@section('content')

    <!-- breadcumb -->
    @include('news.templates.breadcumb', ['name' => 'Chính Sách Sử Dụng'])

    <!-- shop-area -->
    <div class="shop-area pt-100 pb-100">
        <div class="container">
            <div class="row flex-row-reverse">

                <div class="col-lg-9 col-md-8">
                    <div class="blog-details-wrapper res-mrg-top">
                        {!! $item !!}
                        {{-- @include('news.pages.faq.content') --}}
                        
                    </div>
                </div>

                <!-- shop-sidebar -->
                <div class="col-lg-3 col-md-4">
                    <div class="shop-sidebar blog-mrg">
                        @include('news.partials.sidebar.recent_recruitment')
                        @include('news.partials.sidebar.recent_blog')
                        @include('news.partials.sidebar.recent_rss')
                    </div>
                </div>
                
            </div>
        </div>
    </div>    
@endsection
