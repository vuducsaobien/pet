@php
    use App\Helpers\Template as Template;
    use App\Helpers\Hightlight as Hightlight;
@endphp
<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">#</th>
                    <th class="column-title">Tên Khách Hàng</th>
                    <th class="column-title">Tên Sản Phẩm</th>
                    <th class="column-title">Message</th>
                    <th class="column-title">Star</th>
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Tạo mới</th>
                    <th class="column-title">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if (count($items) > 0)
                    @foreach ($items as $key => $val)
                        @php
                            $index           = $key + 1;
                            $class           = ($index % 2 == 0) ? "even" : "odd";
                            $id              = $val['id'];

                            $name            = Hightlight::show($val['name'], $params['search'], 'customer_name');
                            $message         = Hightlight::show($val['message'], $params['search'], 'message');
                            $product         = Hightlight::show($val['product_name'], $params['search'], 'product_name');
                            $star            = Hightlight::show($val['star'], $params['search'], 'star');
                            $message         = Hightlight::show($val['message'], $params['search'], 'message');
                            $status          = Template::showItemStatus($controllerName, $id, $val['status']); ;
                            $createdHistory  = Template::showItemHistory($val['created_by'], $val['created']);
                            $modifiedHistory = Template::showItemHistory($val['modified_by'], $val['modified']);
                            $listBtnAction   = Template::showButtonAction($controllerName, $id);
                        @endphp

                        <tr class="{{ $class }} pointer">
                            <td >{{ $index }}</td>
                            <td width="10%"><p>{!! $name !!}</p></td>
                            <td width="20%"><p>{!! $product !!}</p></td>
                            <td>{!! $message !!}</td>
                            <td>{!! $star !!}</td>
                            <td>{!! $status !!}</td>
                            <td>{!! $createdHistory !!}</td>

                            <td class="last">{!! $listBtnAction !!}</td>
                        </tr>
                    @endforeach
                @else
                    @include('admin.templates.list_empty', ['colspan' => 6])
                @endif
            </tbody>
        </table>
    </div>
</div>
           