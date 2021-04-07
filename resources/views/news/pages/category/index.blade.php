@extends('news.main')
@section('content')

    <!-- breadcumb -->
    @include('news.templates.breadcumb', ['name' => 'Shop Page'])

    <div class="shop-area pt-100 pb-100 gray-bg">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">

                    <!-- Shop - Topbar -->
                    @include('news.templates.shop_topbar', [
                        'search'       => $search,
                        'search_price' => $search_price,
                        ])

                    <div class="grid-list-product-wrapper">
                        <div class="product-view product-{{ $display }}">

                            <!-- List - Product -->
                            <div class="row">
                                @include('news.pages.category.list_product')
                            </div>

                            <!-- paginate -->
                            <div class="pagination-style text-center mt-10">
                                <ul>
                                    @include('news.templates.pagination')
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="shop-sidebar">

                        <!-- Filter -->
                        @include('news.partials.sidebar.search')
                        @include('news.partials.sidebar.price')
                        @include('news.partials.sidebar.brand')
                        @include('news.partials.sidebar.product')
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal -->
    @include('news.templates.modal_quick_view')

@endsection
        
