@extends('news.main')
@section('content')
    @php
        $login    = false;
        $userInfo = null;
        if ( !empty(session()->get('userInfo')) ) {
            $login    = true;
            $userInfo = session()->get('userInfo');
        }

        $cartCheck = false;
        $cart      = null;
        if ( !empty(session()->get('cart')) ) {
            $cartCheck = true;
            $cart      = session()->get('cart');
        }
    @endphp

    <!-- breadcumb -->
    @include('news.templates.breadcumb', ['name' => 'Checkout'])

    <div class="checkout-area pt-95 pb-70">
        <div class="container">
            <h3 class="page-title">checkout</h3>
            <div class="row">
                <div class="col-lg-9">
                    <div class="checkout-wrapper">
                        <div id="faq" class="panel-group">

                            <!-- Checkout Method -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-1">Xác Minh Thông Tin Nhận Hàng</a></h5>
                                </div>
                                <div id="payment-3" class="panel-collapse collapse show">
                                    <div class="panel-body">
                                        <div class="row">
                                            @include('news.pages.checkout.child-index.checkout')
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    
                            <!-- Payment -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-5">Phương Thức Thanh Toán</a></h5>
                                </div>
                                <div id="payment-4" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="payment-info-wrapper">
                                            @include('news.pages.checkout.child-index.payment')
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Order -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title"><span>3</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-6">Danh Sách Đặt Hàng</a></h5>
                                </div>
                                {{-- <div id="payment-6" class="panel-collapse collapse"> --}}
                                <div id="payment-5" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="order-review-wrapper">
                                            <div class="order-review">
                                                @include('news.pages.checkout.child-index.order')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                        </div>
                    </div>
                </div>

                
                <!-- PROGRESS -->
                @include('news.pages.checkout.child-index.progress')

            </div>
        </div>
    </div>

@endsection
        
