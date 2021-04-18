@php
    use App\Helpers\Template;
    use App\Helpers\HightLight;
    // echo '<pre style="color:red";>$items === '; print_r($items->toArray());echo '</pre>';    
@endphp

<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">#</th>
                    <th class="column-title">Tên Group</th>
                    <th class="column-title">Tên Các Quyền</th>
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if(count($items) > 0)
                    @foreach($items as $key => $item)
                        @php
                            $index         = $key + 1;
                            $name          = $item['name'];
                            $permission    = $stringPer[$key];
                            $status        = Template::showItemStatus($controllerName, $item['id'], $item['status']);
                            $actionButtons = Template::showButtonAction($controllerName, $item['id']);
                        @endphp
                        <tr>
                            <td>{{ $index }}</td>
                            <td>{!! $name !!}</td>
                            <td>{!! $permission !!}</td>
                            <td class="status-{{$item['id']}}">{!! $status !!}</td>
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
