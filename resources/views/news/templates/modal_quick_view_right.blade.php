@php
    use App\Helpers\URL;

    // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;

    $linkCart = URL::linkProduct(null, 'addToCart');
@endphp

<div class="qwick-view-right">
    <div class="qwick-view-content">
        <h3></h3>
        <div class="product-price" data-price="" id="product_price">
        </div>
        <div class="product-rating">
            <i class="icon-star theme-color"></i>
            <i class="icon-star theme-color"></i>
            <i class="icon-star theme-color"></i>
            <i class="icon-star"></i>
            <i class="icon-star"></i>
        </div>

        {{-- <p>Lorem ipmagna aation .</p> --}}
        <div class="product-short-description"></div>

        <div class="quick-view-select">
        </div>

        <div class="quickview-plus-minus">
            <div class="cart-plus-minus">
                <input type="text" value="2" name="qtybutton" class="cart-plus-minus-box">
            </div>
            <div class="quickview-btn-cart">
                <a class="btn-style addtocart-btn" href="{{ $linkCart }}">Thêm vào Giỏ Hàng</a>
                {{-- <a class="btn-style addtocart-btn" href="">Thêm vào Giỏ Hàng</a> --}}
            </div>
            <div class="quickview-btn-wishlist">
                <a class="btn-hover" href="#"><i class="ti-heart"></i></a>
            </div>
        </div>
        
    </div>
</div>
