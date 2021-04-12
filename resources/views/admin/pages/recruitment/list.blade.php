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
                    <th class="column-title">Hình ảnh</th>
                    <th class="column-title">Tên</th>
                    <th class="column-title">Slug</th>
                    <th class="column-title">Description</th>
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
                            $slug          = Hightlight::show($val['slug'], $params['search'], 'slug');
                            $description   = Hightlight::show($val['description'], $params['search'], 'description');
                            $thumb         = Template::showItemThumb($controllerName, $val['thumb'], $val['name']);
                            $status        = Template::showItemStatus($controllerName, $id, $val['status']);
                            $ordering      = Template::showItemOrdering($controllerName, $val['ordering'], $id);
                            $listBtnAction = Template::showButtonAction($controllerName, $id);
                        @endphp

                        <tr class="{{ $class }} pointer">

                            <td >{{ $index }}</td>
                            <td width="15%"><p>{!! $thumb !!}</p></td>
                            <td width="15%"><p>{!! $name !!}</p></td>
                            <td width="10%">{!! $slug   !!}</td>
                            <td>{!! $description !!}</td>
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
