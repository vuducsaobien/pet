@extends('news.main')
@section('content')

    <!-- breadcumb -->
    @include('news.templates.breadcumb', ['name' => 'Blog Details'])

    <!-- shop-area -->
    @php
        echo '<h3>Die is Called Detail Recruiment</h3>';die;
    @endphp
    @include('news.pages.recruitment.child-index.shop_area')

@endsection
