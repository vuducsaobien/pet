@php
    use App\Helpers\Template;
    // echo '<pre style="color:red";>$itemsBestDeal === '; print_r($itemsBestDeal);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;
    $countdown = date('Y/m/d', strtotime(config('zvn.format.count_down')));
    $htmlPrice = Template::caculatorPriceFrontend(
        $itemsBestDeal['price'], $itemsBestDeal['price_sale'], $itemsBestDeal['sale'], 2
    );

@endphp
<div class="deal-area bg-img pt-95 pb-100">
    <div class="container">
        <div class="section-title text-center mb-50">
            <h4>Best Product</h4>
            <h2>Deal of the Week</h2>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="deal-img wow fadeInLeft">
                    <a href="#"><img src="{{ asset('news/images/banner/banner-2.png') }}" alt=""></a>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="deal-content">
                    <h3><a href="#">{{ $itemsBestDeal['name'] }}</a></h3>
                    <div class="deal-pro-price">
                        {!! $htmlPrice !!}
                    </div>
                    {!! $itemsBestDeal['short_description'] !!}
                    <div class="timer timer-style">
                        <div data-countdown="{{ $countdown }}"></div>
                    </div>
                    <div class="discount-btn mt-35">
                        <a class="btn-style" href="#">SHOP NOW</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
