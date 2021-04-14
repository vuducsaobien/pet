@php
    $total = '';
    if ($cartCheck) {
        $total = 0;
        foreach ($cart as $key => $value) {
            $total += $value['quantity'];
        }
    }

@endphp

<div class="header-search same-style">
    <button class="search-toggle">
        <i class="icon-magnifier s-open"></i>
        <i class="ti-close s-close"></i>
    </button>
    <div class="search-content">
        <form action="#">
            <input type="text" placeholder="Search">
            <button>
                <i class="icon-magnifier"></i>
            </button>
        </form>
    </div>
</div>

<div class="header-login same-style">
    @if (!$login)
        <a href="{{ route('auth/login') }}"><i class="icon-user icons"></i></a>
    @else
        <a href="{{ route('dashboard') }}"><i class="icon-user icons"></i></a>
    @endif
</div>

@php
    $hidden = 'hidden';
    if($cartCheck) $hidden = '';
@endphp

<div class="header-cart same-style">

    <button class="icon-cart">
        <i class="icon-handbag"></i>
        <span class="count-style">{{ $total }}</span>
    </button>

    <div class="shopping-cart-content">
        {{-- <ul>@include('news.elements.header.header_ajax')</ul> --}}

        <div class="shopping-cart-btn">
            <a href="{{ route('cartFront') }}">history cart</a>
            <a {{ $hidden }} href="{{ route('cartFront') }}">view cart</a>
            {{-- <a {{ $hidden }} href="{{ route('checkout') }}">checkout</a> --}}
        </div>
    </div>

</div>
