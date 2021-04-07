@php
    use App\Helpers\Template;
    
    $grand_total = "0 <u>đ</u>";
    $fee         = $grand_total;

    if (!empty($cart)) {
        $grand_total = 0;
        foreach ($cart as $key => $value) {
        $grand_total += $value['total_price'];
        }
    }

    if (!empty($cart)) {
        $grand_total = Template::format_price( $grand_total, 'vietnamese dong');
    }

@endphp

<div class="col-lg-4 col-md-12">
    <div class="grand-totall">
        <span id="grand_total">Tổng Giá Sản Phẩm:   <span>{!! $grand_total !!}</span></span>
        <span>Phí Vận Chuyển: + <span id="fee">{!! $fee !!}</span></span>
        <span>Mã Giảm Giá: -  <span id="coupon">{!! $fee !!}</span></span>
        <h5>Tổng Cộng: {!! $grand_total !!}</h5>
        <a id="checkout" href="{{ route('checkout') }}">Đi đến Trang Thanh Toán</a>
    </div>
</div>
