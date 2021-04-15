<div class="col-lg-12 col-md-12">
    <div class="checkout-register">
        <h5 class="checkout-sub-title">Form Thông Tin</h5>
        <p>Nhập Tên, Địa Chỉ ... Vào Form</p>
        <form name="customer">
            @csrf
            <label> Họ & Tên </label>
            <input type="text" name="name">

            <label> Email Address </label>
            <input type="email" name="email">

            <label> Số Điện Thoại </label>
            <input type="number" name="phone">

            <label id="address"> Địa Chỉ Chính Xác Tại </label>
            <input type="text" name="address">

            <div class="billing-back-btn">
                <div class="billing-btn">
                    <button id="payment-3" class="checkout-btn" type="submit">Xác Nhận</button>

                    {{-- <button id="payment-3">Continue</button> --}}
                </div>
            </div>
        </form>



    </div>
</div>

