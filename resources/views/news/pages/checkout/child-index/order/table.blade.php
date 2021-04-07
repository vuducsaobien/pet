@php
    use App\Helpers\Template;
    use App\Helpers\URL;

    // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
    // echo '<pre style="color:red";>$cart === '; print_r($cart);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;
@endphp

@if(!empty($items))
    @foreach($items as $key => $value)
    @php
        $thumb              = $value['thumb'];
        $name               = $value['name'] . '. ';
        $quantity           = $value['quantity'];
        $price              = Template::format_price($value['price'], 'vietnamese dong');
        $total_price_number = $value['price'] * $quantity;
        $total_price        = Template::format_price($total_price_number, 'vietnamese dong');
    
        $attribute           = $value['attribute'];
        $attribute_value     = $value['attribute_value'];
        $strAttrb            = '';
        foreach ($attribute as $keyChild => $value) {
            $strAttrb .= "$value: $attribute_value[$keyChild] - ";
        }
        $strAttrb = substr($strAttrb, 0, -3) . '.';
    @endphp
    <tr>
        <td>
            <div class="o-pro-dec">
                <p>{{ $name }}</p>
                <p>{{ $strAttrb }}</p>
            </div>
        </td>
        <td>
            <div class="o-pro-price">
                {!! $price !!}
            </div>
        </td>
        <td>
            <div class="o-pro-qty">
                <p>{{ $quantity }}</p>
            </div>
        </td>
        <td>
            <div class="o-pro-subtotal">
                {!! $total_price !!}
            </div>
        </td>
    </tr>
    @endforeach
    
    
@endif

<tr>
    <td>
        <div class="o-pro-price">
            <p>Tổng</p>
        </div>
    </td>
    <td>
        <div class="o-pro-price">
            <p></p>
        </div>
    </td>
    <td>
        <div class="o-pro-price">
            <p>{{ $total_quantity }}</p>
        </div>
    </td>
    <td>
        <div class="o-pro-price">
            <p>{!! $total !!}</p>
        </div>
    </td>
</tr>

<tfoot>
    <tr>
        <td colspan="3">Tổng Giá Tiền</td>
        <td colspan="1">= {!! $total !!}</td>
    </tr>
    <tr class="tr-f">
        <td colspan="3">Phí Vận Chuyển</td>
        <td id="check-out-fee" colspan="1">- 0 <u>đ</u></td>
    </tr>
    <tr class="tr-f">
        <td colspan="3">Mã Giảm Giá</td>
        <td id="check-out-coupon" colspan="1">- 0 <u>đ</u></td>
    </tr>
    <tr>
        <td colspan="3">Tổng Số Tiền Cần Thanh Toán</td>
        <td id="grand_total_ship" colspan="1">- 0 <u>đ</u></td>
    </tr>
</tfoot>