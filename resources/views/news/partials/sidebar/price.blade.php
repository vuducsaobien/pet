@php
    $url_all           = url()->full();
    $url_current       = url()->current();
    $url_all_cut       = substr( strrchr( $url_all, '/' ), 1 );
    $url_all_cut_input = substr( strrchr( $url_all, '?' ), 1 );
    $url_current_cut   = substr( strrchr( $url_current, '/' ), 1 );
    // $linkSearch  = route("category/search", ['category_slug' => $uu]);

    // echo '<pre style="color:red";>$url_all === '; print_r($url_all);echo '</pre>';
    // echo '<pre style="color:red";>$url_all_cut === '; print_r($url_all_cut);echo '</pre>';
    // echo '<pre style="color:red";>$url_all_cut_input === '; print_r($url_all_cut_input);echo '</pre>';

    // echo '<pre style="color:red";>$url_current === '; print_r($url_current);echo '</pre>';
    // echo '<pre style="color:red";>$url_current_cut === '; print_r($url_current_cut);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;

    // $link = route('category/search_price', [
    //     'category_slug' => $url_current_cut,
    //     'search'        => $url_all_cut_input
    // ]);

    $link = route('category/search', [
        'category_slug' => $url_current_cut
    ]);

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
                        {{-- <input type="hidden" name="params" value="{{ $setting_price['max'] }}"/> --}}
                        <input type="hidden" name="search" value="{{ $url_all_cut_input }}"/>

                </div>
                <button id="filter_price" type="submit">Lọc</button> 
            </form>
        </div>
    </div>
</div>
