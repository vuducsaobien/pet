@php
    use App\Helpers\Template;
@endphp

@if($item['detail'])
    @foreach($item['detail'] as $key => $val)
        @php
            $class        = $key %2 == 0 ? "even" : "odd";

            $product_code = $val['product_code'];
            $name         = $val['name'];
            $attribute    = $val['detail'];
            $thumb        = $val['thumb'];
            $thumb        = $val['thumb'];
            $quantity     = $val['quantity'];
            $price        = Template::format_price($val['price'] / $quantity, 'vietnamese dong');
            $total        = Template::format_price($val['price'], 'vietnamese dong');
        @endphp

        <tr class="{{$class}} pointer">

            <td width="8%">{{$product_code}}</td>
            <td width="20%">{{$name}}</td>
            <td width="20%">{{$attribute}}</td>
            <td><img width="200px" src="{{asset($thumb)}}" alt=""> </td>
            <td width="10%">{!! $price !!}</td>
            <td width="8%">{{ $quantity }}</td>
            <td width="10%">{!! $total !!}</td>
        </tr>

    @endforeach
@endif
