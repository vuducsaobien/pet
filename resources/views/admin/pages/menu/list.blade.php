@php
    use App\Helpers\Template;
    use App\Helpers\HightLight;

@endphp

<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">#</th>
                    <th class="column-title">Tên hiển thị</th>
                    <th class="column-title">Link</th>
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Sắp xếp</th>
                    <th class="column-title">Menu Type</th>
                    <th class="column-title">Link Type</th>
                    <th class="column-title">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if(count($items) > 0)
                    @foreach($items as $key => $item)
                        @php


                            $index          = $key + 1;
                            $name           = HightLight::show($item['name'], $params['search'], 'name');
                            $link           = HightLight::show($item['link'], $params['search'], 'link');
                            $link           =Template::showItemLink($controllerName, $item['link'], $item['id']);
                            $status         = Template::showItemStatus($controllerName, $item['id'], $item['status']);
                            $ordering       = Template::showItemOrdering($controllerName, $item['ordering'], $item['id']);
                            $menuType       = Template::showItemSelect($controllerName, $item['id'], $item['type_menu'], 'type_menu');
                            $linkType       = Template::showItemSelect($controllerName, $item['id'], $item['type_link'], 'type_link');
                            $actionButtons  = Template::showButtonAction($controllerName, $item['id']);
                        @endphp
                        <tr>
                            <td>{{ $index }}</td>
                            <td>{!! $name !!}</td>
                            <td>{!! $link !!}</td>
                            <td class="status-{{$item['id']}}">{!! $status !!}</td>
                            <td>{!! $ordering !!}</td>
                            <td>{!! $menuType !!}</td>
                            <td>{!! $linkType !!}</td>
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
