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
                    <th class="column-title">Tên</th>
                    <th class="column-title">Nội Dung</th>
                    <th class="column-title">Thứ Tự</th>
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Hành động</th>
                </tr>
            </thead>
            <tbody>

                @if (count($items) > 0)
                    @foreach ($items as $key => $val)
                        @php
                            $index         = $key + 1;
                            $class         = ($index % 2 == 0) ? "even" : "odd";
                            $id            = $val['id'];

                            $name          = Hightlight::show($val['name'], $params['search'], 'name');
                            $content       = Hightlight::show($val['content'], $params['search'], 'content');
                            $status        = Template::showItemStatus($controllerName, $id, $val['status']);
                            $ordering      = Template::showItemOrdering($controllerName, $val['ordering'], $id);
                            $listBtnAction = Template::showButtonAction($controllerName, $id);
                        @endphp

                        <tr class="{{ $class }} pointer">

                            <td >{{ $index }}</td>
                            <td width="20%"><p>{!! $name !!}</p></td>
                            <td width="40%">{!! $content !!}</td>
                            <td>{!! $ordering   !!}</td>
                            <td>{!! $status !!}</td>
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
