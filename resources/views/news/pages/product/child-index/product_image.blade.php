@php
    use App\Helpers\Template;

    $thumb = $items['list_images'];
    $count = count($thumb);
    $path  = "images/product/";

    if ($count > 0) {
        $pathFirst  = $path . $thumb[0]['name'];
        $xhtmlImage = '';
    }

    // echo '<pre style="color:red";>$items=== '; print_r($items);echo '</pre>';
    // echo '<pre style="color:red";>$thumb=== '; print_r($thumb);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;

@endphp


<div class="col-lg-6 col-md-6">
    <div class="product-details-img">

        @if ( $count > 0 )

            <img id="zoompro" src=" {{ asset(''.$pathFirst.'') }} " 
                data-zoom-image="   {{ asset(''.$pathFirst.'') }} " alt="zoom"/>
            
            @if ( $count > 1 )

                @php
                    // unset($thumb[0]);
                @endphp

                <div id="gallery" class="mt-12 product-dec-slider owl-carousel">
                    <div class="owl-stage" style="transform: translate3d(-581px, 0px, 0px); transition: all 0s ease 0s; width: 1889px;">

                        @foreach($thumb as $item)
                            @php
                                // echo '<pre style="color:red";>$item === '; print_r($item);echo '</pre>';
                            @endphp

                            <div class="owl-item cloned" style="width: 133.25px; margin-right: 12px;">
                                <a       data-image=" {{ asset(''.$path.$item['name'].'') }} " 
                                    data-zoom-image=" {{ asset(''.$path.$item['name'].'') }} ">
                                    <img        src=" {{ asset(''.$path.$item['name'].'') }} " alt="">
                                </a>
                            </div>

                            {{-- <div class="owl-item active" style="width: 133.25px; margin-right: 12px;">
                                <a       data-image=" {{ asset(''.$path.$item['name'].'') }} " 
                                    data-zoom-image=" {{ asset(''.$path.$item['name'].'') }} ">
                                    <img        src=" {{ asset(''.$path.$item['name'].'') }} " alt="">
                                </a>
                            </div>         --}}

                        @endforeach

                    </div>
                </div>


            @endif

        @endif

    </div>
</div>