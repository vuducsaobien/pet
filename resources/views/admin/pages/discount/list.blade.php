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
                    <th class="column-title">{{$controllerName}} Name</th>
                    <th class="column-title">Date start</th>
                    <th class="column-title">Date end</th>
                    <th class="column-title">Trạng thái</th>
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
                            $code            = Hightlight::show($val['code'], $params['search'], 'type');
                            $date_start     = Hightlight::show($val['date_start'], $params['search'], 'date_start');
                            $date_end            = Hightlight::show($val['date_end'], $params['search'], 'date_end');
                            $star=$val['star'];
                            $status          = Template::showItemStatus($controllerName, $id, $val['status']); ;
                            $createdHistory  = Template::showItemHistory($val['created_by'], $val['created']);
                            $modifiedHistory = Template::showItemHistory($val['modified_by'], $val['modified']);
                            $listBtnAction   = Template::showButtonAction($controllerName, $id);
                        @endphp

                        <tr class="{{ $class }} pointer">
                            <td >{{ $index }}</td>
                            <td width="20%">
                                 {!! $code !!}
                                
                            </td>
                            <td>{{$date_start}}</td>
                            <td>{{$date_end}}</td>

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
           