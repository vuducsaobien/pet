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
                    <th class="column-title">Status</th>
                    <th class="column-title">Ordering</th>
                    <th class="column-title">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if(count($items) > 0)
                    @foreach($items as $key => $item)


                        @php
                            $index          = $key + 1;
                            $name           = HightLight::show($item['name'], $params['search'], 'name');
                            $ordering           = Template::showItemOrdering($controllerName,$item['ordering'],$item->id);
                            $status          = Template::showItemStatus($controllerName,$item->id,$item->status);
                            $actionButtons  = Template::showButtonAction($controllerName, $item['id']);
                        @endphp
                        <tr>
                            <td>{{$index}}</td>
                            <td>{!! $name !!}</td>
                            <td>{!! $status !!}</td>
                            <td width="30%">{!! $ordering !!}</td>
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
