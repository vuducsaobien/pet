@php
    use App\Helpers\Template;
    use App\Helpers\URL;

    // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
    // echo '<pre style="color:red";>$cart === '; print_r($cart);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;
    $total_quantity = 0;
    $total          = 0;
    if( !empty($items) ){
        foreach($items as $key => $value){
        $quantity        = $value['quantity'];
        $total_quantity += $quantity;
        $total          += $value['price'] * $quantity;
        }
        $totalFormat = Template::format_price($total, 'vietnamese dong');
    }

@endphp

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th class="width-1">Tên Sản Phẩm</th>
                <th class="width-2">Giá</th>
                <th class="width-3">Số lượng</th>
                <th class="width-4">Tổng Giá Tiền</th>
            </tr>
        </thead>

        <tbody>
            @include('news.pages.checkout.child-index.order.table', [
                'total_quantity' => $total_quantity,
                'total'          => $totalFormat,
            ])
        </tbody>

    </table>
</div>

@include('news.pages.checkout.child-index.order.confirm_order', [
    'total_quantity' => $total_quantity,
    'total'          => $total,
])
