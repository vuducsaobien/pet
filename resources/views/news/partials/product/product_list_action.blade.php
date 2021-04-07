@php
    use App\Helpers\URL;

    // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;

    // echo '<pre style="color:red";>$array === '; print_r($array);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;
    $linkCart = URL::linkProduct(null, 'addToCart');
@endphp

<div class="product-list-action">
    
    @if ($quantity > 0)
        <div class="product-list-action-left">
            <a class="addtocart-btn" title="Add to cart" href="{{ $linkCart }}"><i class="ion-bag"></i> Thêm vào Giỏ Hàng</a>
        </div>
    @endif
        
    @if($quickview == true)
        <div class="product-list-action-right">
            <a title="Wishlist" href="#"><i class="ti-heart"></i></a>
            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ti-plus"></i></a>
        </div>
    @endif
</div>

