@php
    use App\Helpers\Template;

    // echo '<pre style="color:red";>$item === '; print_r($items);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;

    $name              = $items['name'];
    $sku               = $items['product_code'];
    $short_description = $items['short_description'];
    $price_sale        = $items['price_sale'];
    $htmlPrice         = Template::caculatorPriceFrontend($items['price'], $price_sale, $items['sale']);
    $htmlAtribute      = Template::getHtmlAttribute($items['id'], $items['attribute'], $items['list_attribute']);

@endphp

@include('news.pages.product.child-index.product_image')

<div class="col-lg-6 col-md-6">
    <div class="product-details-content">

        <h2>{{ $name }}</h2>
        <p>
            @isset($share_setting)
                {!! Template::share($share_setting,URL::current(),'product','before') !!}
            @endisset
        </p>
        @include('news.partials.product.product_rating')

        <div data-price="{{ $price_sale }}" id="product_price" class="product-price">{!! $htmlPrice !!}</div>

        @include('news.partials.product.product_stock', ['quantity' => $items['quantity']])

        <div class="sku"><span>SKU#: {{$sku}}</span></div>

        {!! $short_description !!}
        {!! $htmlAtribute !!}

        <div class="quality-wrapper mt-30 product-quantity">
            <label>Qty:</label>
            <div class="cart-plus-minus">
                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
            </div>
        </div>

        @include('news.partials.product.product_list_action', ['quantity' => $items['quantity'], 'quickview' => false])

        <div class="social-icon mt-30">
            @isset($share_setting)
                {!! Template::share($share_setting,URL::current(),'product','after') !!}
            @endisset
        </div>

    </div>
</div>