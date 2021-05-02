@php
    use App\Helpers\Template;
    use App\Helpers\HightLight;
    // echo '<pre style="color:red";>$items === '; print_r($items->toArray());echo '</pre>';    
    // echo '<h3>Die is Called </h3>';die;
@endphp

<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">#</th>
                    <th class="column-title">Tên Controller Dev</th>
                    <th class="column-title">Tên Controller Hiển Thị</th>
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Tạo mới</th>
                    <th class="column-title">Chỉnh sửa</th>
                    <th class="column-title">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if(count($items) > 0)
                    @foreach($items as $key => $item)
                        @php
                            $index           = $key + 1;
                            $controller      = $item['controller'];
                            $name            = $item['name'];
                            $status          = Template::showItemStatus($controllerName, $item['id'], $item['status']);

                            $createdHistory  = Template::showItemHistory($item['created_by'], $item['created']);
                            $modifiedHistory = Template::showItemHistory($item['modified_by'], $item['modified']);
                            $actionButtons   = Template::showButtonAction($controllerName, $item['id']);
                        @endphp
                        <tr>
                            <td>{{ $index }}</td>
                            <td>{!! $controller !!}</td>
                            <td>{!! $name !!}</td>
                            <td>{!! $status !!}</td>
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
