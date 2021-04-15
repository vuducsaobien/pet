@php
    $prefixNews  = config('zvn.url.prefix_news') . '/';
    $url_current = url()->current();
    $uu          = substr( strrchr( $url_current, '/' ), 1 );

    // Multi search name
    if (isset($slug)) {
        $linkSearch  = route("category/search", ['category_slug' => $slug]);
    } else {
        $linkSearch  = route("category/search", ['category_slug' => $uu]);
    }
    
@endphp

<div class="shop-widget">
    <h4 class="shop-sidebar-title">Tìm kiếm Sản Phẩm</h4>
    <div class="shop-search mt-25 mb-50">

        <form id="search_name" class="shop-search-form" action="{{ $linkSearch }}" method="GET">
            {{-- @csrf --}}
            <input type="hidden" name="min" value=""/>
            <input type="hidden" name="max" value=""/>

            <input name="search_name" type="text" placeholder="Find a product" value="">
            <button id="search_product" type="submit">
                <i class="icon-magnifier"></i>
            </button>
        </form>

    </div>
</div>