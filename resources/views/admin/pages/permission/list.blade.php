@php
    use App\Helpers\Template;
    use App\Helpers\HightLight;
    // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;
@endphp

<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">#</th>
                    <th class="column-title">Tên Quyền</th>
                    <th class="column-title">Link Route</th>
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Taọ Mới</th>
                    <th class="column-title">Chỉnh Sửa</th>
                    <th class="column-title">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if(count($items) > 0)
                    @foreach($items as $key => $item)
                        @php
                            $index           = $key + 1;
                            $name            = HightLight::show($item['name'], $params['search'], 'name');
                            $route           = HightLight::show($item['route_name'], $params['search'], 'route_name');
                            $status          = Template::showItemStatus($controllerName, $item['id'], $item['status']);
                            $createdHistory  = Template::showItemHistory($item['created_by'], $item['created']);
                            $modifiedHistory = Template::showItemHistory($item['modified_by'], $item['modified']);
                            $actionButtons   = Template::showButtonAction($controllerName, $item['id']);
                        @endphp
                        <tr>
                            <td>{{ $index }}</td>
                            <td>{!! $name !!}</td>
                            <td>{!! $route !!}</td>
                            <td class="status-{{$item['id']}}">{!! $status !!}</td>
                            <td>{!! $createdHistory !!}</td>
                            <td class="modified-{{$item->id}}">{!! $modifiedHistory !!}</td>
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
