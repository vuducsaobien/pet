@php
    $prefixNews  = config('zvn.url.prefix_news') . '/';
    $url_current = url()->current();
    $uu          = substr( strrchr( $url_current, '/' ), 1 );
    $linkSearch  = route("category/search", ['category_slug' => $uu]);
@endphp

<div class="shop-widget">
    <h4 class="shop-sidebar-title">Tìm kiếm Sản Phẩm</h4>
    <div class="shop-search mt-25 mb-50">

        <form class="shop-search-form" action="{{ $linkSearch }}" method="GET">
            {{-- @csrf --}}
            {{-- <input name="url_current" type="hidden" value="{{ $uu }}"> --}}
            <input name="search" type="text" placeholder="Find a product" value="">
            <button id="search_product" type="submit">
                <i class="icon-magnifier"></i>
            </button>
        </form>

    </div>
</div>