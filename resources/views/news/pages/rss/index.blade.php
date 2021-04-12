@extends('news.main')
@section('content')

    <!-- breadcumb -->
    @include('news.templates.breadcumb', ['name' => 'RSS'])

    <!-- list blog -->
    <div class="blog-area pt-100 pb-100 clearfix">
        <div class="container">
            <div class="row">
                @include('news.pages.rss.child-index.list')
            </div>

        </div>
    </div>
    
@endsection