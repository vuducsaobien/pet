
@php
    // echo '<pre style="color:red";>$itemsMenu === '; print_r($itemsMenu);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;
@endphp
<div class="footer-content">
    <ul>
        <li><a href="{{ route('about/web') }}">Về Marten</a></li>
        <li><a href="{{ route('policy/use') }}">Điều Khoản Sử Dụng</a></li>
        <li><a href="{{ route('policy/exchange') }}">Chính Sách Đổi Hàng</a></li>
        <li><a href="{{ route('policy/shopping') }}">Hướng Dẫn Mua Hàng</a></li>
        <li><a href="{{ route('policy/business') }}">Quan Điểm Kinh Doanh</a></li>
        <li><a href="{{ route('contact/web') }}">Liên Hệ với Chúng Tôi</a></li>
    </ul>
</div>
