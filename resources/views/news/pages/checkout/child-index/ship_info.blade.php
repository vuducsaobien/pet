@php
    use App\Models\UserModel;

    $username  = $userInfo['username'];
    $userModel = new UserModel();
    $items     = $userModel->getItem($username, ['task' => 'news-get-user-info']);
    $phone     = $items['phone'];
    $address   = $items['address'];

    // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;

@endphp

<div class="shipping-info-2">
    <span> Địa chỉ sẽ đến đây. </span>
    <span>SDT: 0{{ $phone }} </span>
</div>
<div class="edit-address">
    <a href="#">Edit Address</a>
</div>
<div class="billing-select">
    <input type="text" placeholder="Địa Chỉ Nhận Hàng" value="{{ $address }}" name="address">

    {{-- <select class="email s-email s-wid">
        <option>Select Your Address</option>
        <option>Add New Address</option>
        <option>Boot Experts, Bangladesh</option>
    </select> --}}

</div>

{{-- <div class="ship-wrapper">
    <div class="single-ship">
        <input type="checkbox" checked="" value="address" name="address">
        <label>Use Billing Address</label>
    </div>
</div> --}}

<div class="billing-back-btn">
    <div class="billing-btn">
        <button id="payment-3" type="submit">Continue</button>
    </div>
</div>

