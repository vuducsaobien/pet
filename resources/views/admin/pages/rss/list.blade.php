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
                    <th class="column-title">Name</th>
                    <th class="column-title">Link</th>
                    <th class="column-title">Source</th>
                    <th class="column-title">Status</th>
                    <th class="column-title">Sắp xếp</th>
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
                            $source         = HightLight::show($item['source'], $params['search'], 'source');
                            $status         = Template::showItemStatus($controllerName, $item['id'], $item['status']);
                            $ordering       = Template::showItemOrdering($controllerName, $item['ordering'], $item['id']);
                            $actionButtons  = Template::showButtonAction($controllerName, $item['id']);
                        @endphp
                        <tr>
                            <td>{{ $index }}</td>
                            <td>{!! $name !!}</td>
                            <td>{!! $link !!}</td>
                            <td>{!! $source !!}</td>
                            <td>{!! $status !!}</td>
                            <td>{!! $ordering !!}</td>
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
