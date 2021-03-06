@extends('news.main')
@section('content')

    <!-- breadcumb -->
    @include('news.templates.breadcumb', ['name' => 'Thư viện Hình Ảnh'])

    <!-- list blog -->
    <div class="shop-area pt-100 pb-100">

        <div class="container">
            <div class="row flex-row-reverse">

                <div class="col-lg-9 col-md-8">
                    <div class="row">
                        @include('news.pages.gallery.content')
                    </div>
                </div>

                <!-- shop-sidebar -->
                <div class="col-lg-3 col-md-4">
                    <div class="shop-sidebar blog-mrg">
                        @include('news.partials.sidebar.recent_blog')
                        @include('news.partials.sidebar.recent_rss')
                    </div>
                </div>

            </div>
        </div>
    </div>
    

@endsection