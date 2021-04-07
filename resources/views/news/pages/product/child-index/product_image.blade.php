@php
    use App\Helpers\Template;

    $thumb = $items['list_images'];
    $count = count($thumb);
    $path = "images/product_image/";

    if ($count > 0) {
        $pathFirst = $path . $thumb[0]['name'];

        $xhtmlImage = '';
    }

    // echo '<pre style="color:red";>$thumb=== '; print_r($thumb);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;

@endphp


<div class="col-lg-6 col-md-6">
    <div class="product-details-img">

        @if ( $count > 0 )

            <img id="zoompro" src=" {{ asset(''.$pathFirst.'') }} " 
                data-zoom-image="   {{ asset(''.$pathFirst.'') }} " alt="zoom"/>
            
            @if ( $count > 1 )
                {{-- @php
                    unset($thumb[0]);
                    // echo '<pre style="color:red";>$thumb === '; print_r($thumb);echo '</pre>';
                    $xhtmlImage .= '<div id="gallery" class="mt-12 product-dec-slider owl-carousel">';
                    foreach ($thumb as $key => $value) {
                        $pathSecond = $path . $value['name'];
                        $xhtmlImage .= '
                            <a data-image=" {{ asset('.$pathSecond.') }} " data-zoom-image=" {{ asset('.$pathSecond.') }} ">
                                <img src=" {{ asset('.$pathSecond.') }} " alt="">
                            </a>
                        ';
                    }
                    $xhtmlImage .= '</div>';
                    
                @endphp --}}

                @php
                    unset($thumb[0]);
                @endphp

                <div id="gallery" class="mt-12 product-dec-slider owl-carousel">
                    @foreach($thumb as $item)
                        <a       data-image=" {{ asset(''.$path.$item['name'].'') }} " 
                            data-zoom-image=" {{ asset(''.$path.$item['name'].'') }} ">
                            <img        src=" {{ asset(''.$path.$item['name'].'') }} " alt="">
                        </a>
                    @endforeach
                </div>


            @endif

            {{-- {!! $xhtmlImage !!} --}}



        @endif

    </div>
</div>
