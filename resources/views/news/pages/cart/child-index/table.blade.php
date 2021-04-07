@php
    use App\Helpers\Template;
    use App\Helpers\URL;
@endphp

@if( !empty($items) )
    @foreach($items as $key => $value)
        @php
            $id                = $value['id'];
            // $linkModal         = URL::linkModal($id);
            $linkProduct       = URL::linkProduct($value, 'index');
            $thumb           = $value['thumb'];
            // $name            = $value['name'];
            $name            = $value['name'] . '. ';
            $quantity        = $value['quantity'];
            $price           = Template::format_price($value['price'], 'vietnamese dong');
            $total_price     = Template::format_price($value['price'] * $quantity, 'vietnamese dong');
            $attribute       = $value['attribute'];
            $attribute_value = $value['attribute_value'];
            $strAttrb        = '';
            foreach ($attribute as $keyChild => $value) {
                $strAttrb .= "$value: $attribute_value[$keyChild] - ";
            }
            $strAttrb = substr($strAttrb, 0, -3) . '.';

        @endphp

        <div class="product-width col-lg-6 col-xl-4 col-md-6 col-sm-6">
            <div class="product-wrapper mb-10">
                <tr id="{{ $key }}">
                    <td class="product-thumbnail">
                        <a href="{{ $linkProduct }}"><img height="150px" src="{{ asset($thumb) }}" alt=""></a>
                    </td>

                    {{-- <td class="product-name"><a href="{{ $linkProduct }}">{{ $name }}</a></td> --}}
                    <td class="product-name"><a href="{{ $linkProduct }}">{{ $name . $strAttrb }}</a></td>

                    {{-- <td class="product-name">
                        <ul id="product-attribute">
                            <li>
                                <a>Dry Dog Food</a>
                                <a>Dry Dog Food</a>
                            </li>
                        </ul>
                    </td> --}}

                    <td class="product-price-cart"><span class="amount">{!! $price !!}</span></td>
                    <td class="product-quantity">
                        <div class="cart-plus-minus">
                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="{{ $quantity }}">
                        </div>
                    </td>
                    <td class="product-subtotal">{!! $total_price !!}</td>
                    <td class="product-remove"><a href="#"><i class="ti-trash"></i></a></td>
                </tr>  
            </div>
        </div>

    @endforeach
@endif
