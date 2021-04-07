@extends('news.main')
@section('content')
    @php
        $login = false;
        if ( !empty(session()->get('userInfo')) ) {
            $login    = true;
            $userInfo = session()->get('userInfo');
        }

        $cartCheck = false;
        if ( !empty(session()->get('cart')) ) {
            $cartCheck = true;
            $cart      = session()->get('cart');
        }
    @endphp

    <!-- breadcumb -->
    @include('news.templates.breadcumb', ['name' => 'Cart Page'])

    <div class="cart-main-area pt-95 pb-100">
        <div class="container">
            <h3 class="page-title">Giỏ Hàng của Bạn</h3>
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                    <form action="#">
                        <div class="table-content table-responsive">
                            <!-- Table -->
                            <table>
                                <thead>
                                    <tr>
                                        <th>Hình Ảnh</th>
                                        <th>Tên Sản Phẩm</th>
                                        {{-- <th>Thuộc Tính</th> --}}
                                        <th>Giá Sản Phẩm</th>
                                        <th>Số Lượng</th>
                                        <th>Tổng Giá Tiền</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @include('news.pages.cart.child-index.table')
                                </tbody>
                            </table>
                        </div>

                        <!-- Buttons -->
                        @include('news.pages.cart.child-index.buttons')
                    </form>

                    <div class="row">
                        <!-- ship -->
                        <div class="col-lg-4 col-md-6">
                            <div class="cart-tax">
                                <h4 class="cart-bottom-title">Phí Vận Chuyển</h4>
                                <div class="tax-wrapper">
                                    <p>Lựa chọn địa chỉ vận chuyển đến.</p>
                                    <div class="tax-select-wrapper">
                                        @include('news.pages.cart.child-index.ship')
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <!-- discount -->
                        @include('news.pages.cart.child-index.discount')

                        <!-- total -->
                        @include('news.pages.cart.child-index.total')
                    </div>

                </div>
                
            </div>
        </div>
    </div>

@endsection
        
