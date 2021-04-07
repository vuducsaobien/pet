@extends('news.main')
@section('content')

    <!-- breadcumb -->
    @include('news.templates.breadcumb', ['name' => 'Blog'])

    <!-- list blog -->
    <div class="blog-area pt-100 pb-100 clearfix">
        <div class="container">
            <div class="row">
                @include('news.pages.article.child-index.list')
            </div>

            <!-- paginate -->
            <div class="pagination-style text-center mt-20">
                <ul>
                    @include('news.templates.pagination')
                </ul>
            </div>

        </div>
    </div>
    
@endsection