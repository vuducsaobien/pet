@php
    use App\Helpers\Template as Template;
    use App\Helpers\Hightlight as Hightlight;
@endphp
<div class="x_job">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
            <tr class="headings">
                <th class="column-title">#</th>
                <th class="column-title">{{$controllerName}} Info</th>
                <th class="column-title">Trạng thái</th>
                <th class="column-title">Tạo mới</th>
                <th class="column-title">Chỉnh sửa</th>
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
                        $name            = Hightlight::show($val['name'], $params['search'], 'name');
                        $job     = Hightlight::show($val['job'], $params['search'], 'job');
                        $thumb           = asset($val['thumb']);
                        $status          = Template::showItemStatus($controllerName, $id, $val['status']); ;
                        $createdHistory  = Template::showItemHistory($val['created_by'], $val['created']);
                        $modifiedHistory = Template::showItemHistory($val['modified_by'], $val['modified']);
                        $listBtnAction   = Template::showButtonAction($controllerName, $id);
                    @endphp

                    <tr class="{{ $class }} pointer">
                        <td >{{ $index }}</td>
                        <td width="40%">
                            <p><strong>Name:</strong> {!! $name !!}</p>
                            <p><strong>Job:</strong> {!! $job!!}</p>
                            <p><img width="70" src="{{$thumb}}" alt=""></p>
                        </td>
                        <td>{!! $status !!}</td>
                        <td>{!! $createdHistory !!}</td>
                        <td>{!! $modifiedHistory !!}</td>
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
           