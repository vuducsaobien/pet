@extends('news.main')

@section('content')
    <div class="section-category">
        @include('news.block.breadcrumb', ['item' => ['name' => $title]])
        <!-- Content Container -->
        <div class="content_container container_category">
            <div class="container">
                <div class="row">
                    <!-- Main Content -->
                    <div class="col-lg-8">
                        @include('news.pages.rss.child-index.list', ['items' => $items])
                    </div>
                    <!-- Sidebar -->
                    <div class="col-lg-4">
                        <div class="sidebar">
                            <h3 class="font-weight-bold">Giá vàng</h3>
                            <div id="box-gold" data-url="{{ route('rss/get-gold') }}">
                                <div class="text-center">
                                    <img style="width: 150px" src="{{ asset('news/images/loading.gif') }}" alt="">
                                </div>
                            </div>
                            <div id="box-coin" data-url="{{ route('rss/get-coin') }}">
                                <div class="text-center">
                                    <img style="width: 150px" src="{{ asset('news/images/loading.gif') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('news.pages.rss.child-index.template_box')
@endsection