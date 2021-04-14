@php
    use App\Helpers\Template;
    use App\Helpers\URL;
    use App\Models\UserModel;


    // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';

    // echo '<pre style="color:red";>$login === '; print_r($login);echo '</pre>';
    // echo '<pre style="color:red";>$userInfo === '; print_r($userInfo);echo '</pre>';
    // echo '<pre style="color:red";>$cart === '; print_r($cart);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;

    // $id        = $userInfo['id'];
    // $username  = $userInfo['username'];
    // $fullname  = $userInfo['fullname'];
    // $email     = $userInfo['email'];
    // $userModel = new UserModel();
    // $items     = $userModel->getItem($username, ['task' => 'news-get-user-info']);
    // $phone     = $items['phone'];
    // $address   = $items['address'];
    $cart      = json_encode($cart);

@endphp

<div class="billing-back-btn">
    <span>
        Quên giỏ hàng ?
        <a id="back_cart" href="{{ route('cartFront') }}"> Quay lại & Chỉnh sửa lại Giỏ Hàng.</a>

    </span>
    <div class="billing-btn" id="submit_cart">
        <form action="{{ route('cart/order') }}" method="POST">
            @csrf

            {{-- <input type = "hidden" name = "info[user_id]" value    = ""> --}}
            <input type = "hidden" id="email" name = "info[email]" value      = "">
            <input type = "hidden" id="name" name = "info[name]" value       = "">
            <input type = "hidden" id="phone" name = "info[phone]" value      = "">
            <input type = "hidden" id="address" name = "info[address]" value    = "">
            <input type = "hidden" id=""       name = "info[payment_id]" value = "1" id       = "payment"   >
            <input type = "hidden" id="ship"       name = "info[ship]" value       = "">
            <input type = "hidden" id=""       name = "info[quantity]" value   = "{{$total_quantity}}">
            <input type = "hidden" id=""       name = "info[amount]" value     = "{{$total}}">
            <input type = "hidden" id=""       name = "cart" value             = "{{$cart}}">

            <button class="checkout-btn" id="payment-5" type="submit">Xác Nhận Thanh Toán</button>
        </form>

    </div>
</div>
