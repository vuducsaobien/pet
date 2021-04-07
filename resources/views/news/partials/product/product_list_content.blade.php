@php
    // echo '<pre style="color:red";>$items === Product list COntent '; print_r($items);echo '</pre>';    
    // echo '<h3>Die is Called ProductImage</h3>';die;
@endphp

<div class="product-list-content">
    <h4><a href="{{ $linkProduct }}">{{ $name }}</a></h4>
    <div class="product-price">
        {!! $htmlPrice !!}
    </div>

    {!! $short_description !!}
    @include('news.partials.product.product_list_action', ['quantity' => $quantity])
</div>
