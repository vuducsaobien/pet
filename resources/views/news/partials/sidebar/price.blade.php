@php
    $link = route('category/search_price');
@endphp

<div class="shop-widget">
    <h4 class="shop-sidebar-title">Tìm theo Giá</h4>
     <div class="price_filter mt-25">
        <div id="slider-range"></div>
        <div class="price_slider_amount">
                <div class="label-input">
                    <label>Giá : </label>
                    <form class="shop-search-form" action="{{ $link }}" method="GET">
                        <input type="text" id="amount" placeholder="Add Your Price" />
                        <input type="hidden" name="min" value="{{ $setting_price['min'] }}"/>
                        <input type="hidden" name="max" value="{{ $setting_price['max'] }}"/>
                </div>
                <button id="filter_price" type="submit">Lọc</button> 
            </form>
        </div>
    </div>
</div>
