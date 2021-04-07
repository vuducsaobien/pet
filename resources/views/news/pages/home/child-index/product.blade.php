@php
    use App\Helpers\Template;
    use App\Helpers\URL;
@endphp

@foreach($items as $key => $value)
    @php
        $id          = $value['id'];
        $linkModal   = URL::linkModal($id);
        $thumb       = $value['thumb'];
        $name        = $value['name'];
        $htmlPrice   = Template::caculatorPriceFrontend($value['price'], $value['price_sale'], $value['sale']);
        $linkProduct = URL::linkProduct($value, 'index');

    @endphp

    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">

        <div class="product-wrapper mb-10">

            @include('news.partials.product.product_image', ['linkProduct' => $linkProduct])
            @include('news.partials.product.product_content')

        </div>
    </div>
@endforeach
