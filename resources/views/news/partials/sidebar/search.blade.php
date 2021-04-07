@php
    // $name = Hightlight::show($val['name'], $params['search'], 'name');
    // $linkSearch = route("category/search", ['product_name' => 'product_name_old']); 
    $linkSearch = route("category/search"); 
@endphp

<div class="shop-widget">
    <h4 class="shop-sidebar-title">Tìm kiếm Sản Phẩm</h4>
    <div class="shop-search mt-25 mb-50">

        <form class="shop-search-form" action="{{ $linkSearch }}" method="GET">
            {{-- @csrf --}}

            <input name="search" type="text" placeholder="Find a product" value="">
            <button id="search_product" type="submit">
                <i class="icon-magnifier"></i>
            </button>
        </form>

    </div>
</div>