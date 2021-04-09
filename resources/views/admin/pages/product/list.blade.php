@php
    use App\Helpers\Template;
    use App\Helpers\HightLight;

@endphp

<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">STT</th>
                    <th class="column-title">Tên</th>
                    <th class="column-title">Thứ tự</th>
                    <th class="column-title">Hình ảnh</th>
                    <th class="column-title">Price</th>
                    <th class="column-title">Giá Còn Lại</th>
                    <th class="column-title">Category</th>
                    <th class="column-title">Status</th>
                    <th class="column-title">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if(count($items) > 0)
                    @php
                        $iconMinus = '<i class="fa fa-minus" style="color:red;"></i> ';
                    @endphp

                    @foreach($items as $key => $item)
                        @php
                            $index      = $key + 1;
                            $code       = HightLight::show($item['product_code'], $params['search'], 'product_code');
                            $name       = HightLight::show($item['name'], $params['search'], 'name');
                            $slug       = HightLight::show($item['slug'], $params['search'], 'slug');
                            $ordering   = Template::showItemOrdering($controllerName, $item['ordering'], $item['id']);
                            $category   = Form::select('category_id', $itemsCategory, $item['category_id'], [
                                'class'    => 'form-control select-ajax',
                                'data-url' => route("$controllerName/change-category", [
                                    'id'          => $item->id,
                                    'category_id' => 'value_new'
                                ])
                            ]);
                            $status        = Template::showItemStatus($controllerName, $item->id, $item['status']);
                            $actionButtons = Template::showButtonAction($controllerName, $item['id']);

                            $price       = $item['price'] ?? '';
                            $sale        = $item['sale'];
                            $price_sale  = $item['price_sale'];

                            $price_until = Template::format_price($price - $price_sale);
                            $price       = Template::format_price($price);

                            if ( $sale > 0 ) {
                                $priceMinus = $iconMinus . "$sale %";
                            }else{
                                $priceMinus = $iconMinus . Template::format_price($price_sale);
                            }
                        @endphp
                        <tr>
                            <td>{{$index}}</td>
                            <td width="15%">
                                <p>Tên Sp: {!! $name !!}</p>
                                <p><i>Mã Sản Phẩm: </i> {!! $code !!}</p>
                                <p><i>Đường Dẫn: </i> {!! $slug !!}</p>
                            </td>
                            <td>{!! $ordering !!}</td>
                            <td>
                                <img width="120" height="" src="{{$item->thumb}}" alt="">
                            </td>

                            <td width="15%">
                                {!! $price !!}
                                <p>{!! $priceMinus !!}</p>
                            </td>
                            <td width="10%"><span style="color:green;">{!! $price_until !!}</span></td>
                            <td>{!! $category !!}</td>
                            <td>{!! $status !!}</td>
                            <td class="last">{!! $actionButtons !!}</td>
                        </tr>
                    @endforeach

                @else
                    @include('admin.templates.list_empty', ['colspan' => 6])
                @endif
            </tbody>
        </table>
    </div>
</div>
