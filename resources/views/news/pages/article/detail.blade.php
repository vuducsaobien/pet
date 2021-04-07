@extends('news.main')
@section('content')

    <!-- breadcumb -->
    @include('news.templates.breadcumb', ['name' => 'Blog Details'])

    <!-- shop-area -->
    @include('news.pages.article.child-index.shop_area')

    <!-- modal ?? -->
    @include('news.templates.modal_quick_view')

@endsection
