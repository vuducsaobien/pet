@php
    use App\Helpers\Template;
    use App\Helpers\URL;
    // echo '<pre style="color:red";>$items === '; print_r($items['related']);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;
@endphp

@foreach($items['related'] as $key => $value)
    @php
        $id          = $value['id'];
        $linkModal   = URL::linkModal($id);
        $thumb       = $value['thumb'];
        $name        = $value['name'];
        $htmlPrice   = Template::caculatorPriceFrontend($value['price'], $value['price_sale'], $value['sale']);
        $linkProduct = URL::linkProduct($value, 'index');
    @endphp

    <div class="product-wrapper">
        @include('news.partials.product.product_image', ['linkProduct' => $linkProduct])
        @include('news.partials.product.product_content')
    </div>    

@endforeach

