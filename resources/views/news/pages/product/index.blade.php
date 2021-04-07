@extends('news.main')
@section('content')

    <!-- breadcumb -->
    @include('news.templates.breadcumb', ['name' => 'Product detail'])
    
    @php
        // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';    
        // echo '<h3>Die is Called Blade</h3>';die;
    @endphp
    
    <!-- shop-area -->
    @include('news.templates.notify')

    <div class="shop-area pt-95 pb-100">
        <div class="container">
            <div class="row">
                @include('news.pages.product.child-index.product_info')
            </div>
        </div>
    </div>

    <div class="description-review-area pb-100">
        <div class="container">
            <div class="description-review-wrapper gray-bg pt-40">
                <div class="description-review-topbar nav text-center">
                    <a class="active" data-toggle="tab" href="#des-details1">DESCRIPTION</a>
                    <a data-toggle="tab" href="#des-details2">MORE INFORMATION</a>
                    <a data-toggle="tab" href="#des-details3">REVIEWS ({{ count($items['comment']) }})</a>
                </div>

                @include('news.pages.product.child-index.product_description')
            </div>
        </div>
    </div>
    
    <div class="related-product-area pt-95 pb-80 gray-bg">
        <div class="container">
            <div class="section-title text-center mb-55">
                <h4>Most Populer</h4>
                <h2>Related Products</h2>
            </div>
            <div class="related-product-active owl-carousel">

            @include('news.pages.product.child-index.product_related')

            </div>
        </div>
    </div>

    @include('news.templates.modal_quick_view')
@endsection
