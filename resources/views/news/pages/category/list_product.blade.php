@php
    use App\Helpers\Template;
    use App\Helpers\Hightlight;
    use App\Helpers\URL;
    // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;
@endphp

@foreach($items as $key => $value)
    @php
        $id                = $value['id'];
        $linkModal         = URL::linkModal($id);
        $linkProduct       = URL::linkProduct($value, 'index');
        $thumb             = $value['thumb'];
        $name              = Hightlight::showFrontend($value['name'], $search_name);
        $quantity          = $value['quantity'];
        $short_description = $value['short_description'];
        $htmlPrice         = Template::caculatorPriceFrontend($value['price'], $value['price_until']);
        
    @endphp

    <div class="product-width col-lg-6 col-xl-4 col-md-6 col-sm-6">
        <div class="product-wrapper mb-10">

            @include('news.partials.product.product_image', ['linkProduct' => $linkProduct])

            @php
                $hiddenGrid = null;
                $hiddenList = null;

                if ($display == 'grid') {
                    $hiddenList = 'hidden';
                } else {
                    $hiddenGrid = 'hidden';
                }
            @endphp

            <div class="product-content" $hiddenGrid>
                <h4><a href="{{ $linkProduct }}">{!! $name !!}</a></h4>
                <div class="product-price">
                    {!! $htmlPrice !!}
                </div>
            </div>

            <div class="product-list-content" $hiddenList>
                <h4><a href="{{ $linkProduct }}">{!! $name !!}</a></h4>
                <div class="product-price">
                    {!! $htmlPrice !!}
                </div>
            
                {!! $short_description !!}
                @include('news.partials.product.product_list_action', [
                    'quantity'  => $quantity,
                    'quickview' => true
                    ])
            </div>

        </div>
    </div>
@endforeach
