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
                    <th class="column-title">Tên Mã Giảm Giá</th>
                    <th class="column-title">Số Lần Sử Dụng</th>
                    <th class="column-title">Số tiền giảm</th>
                    <th class="column-title">Số % Giảm</th>
                    <th class="column-title">Số tiền Áp Dụng</th>
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
                            $index    = $key + 1;
                            $class    = ($index % 2 == 0) ? "even" : "odd";
                            $id       = $val['id'];
                            $code     = Hightlight::show($val['code'], $params['search'], 'code');
                            $times    = Hightlight::show($val['times'], $params['search'], 'times');
                            $price    = $val['price'] ? '- ' . Template::format_price($val['price']) : '';
                            $percent  = $val['percent'] ? "-  {$val['percent']} %" : '';
                            $accepted = Template::format_price($val['min_price']);
                            $accepted = $val['min_price'] ? '<i class="fa fa-long-arrow-up"></i> '.$accepted .'' : '';

                            $date_start      = Template::showItemHistory(null, $val['date_start'], 'only_time');
                            $date_end        = Template::showItemHistory(null, $val['date_end'], 'only_time');
                            $status          = Template::showItemStatus($controllerName, $id, $val['status']); ;
                            $createdHistory  = Template::showItemHistory($val['created_by'], $val['created']);
                            $modifiedHistory = Template::showItemHistory($val['modified_by'], $val['modified']);
                            $listBtnAction   = Template::showButtonAction($controllerName, $id);
                        @endphp

                        <tr class="{{ $class }} pointer">
                            <td >{{ $index }}</td>
                            <td width="10%">
                                 {!! $code !!}
                            </td>

                            <td  width="5%">{!! $times !!}</td>
                            <td  width="10%">{!! $price !!}</td>
                            <td>{{ $percent }}</td>
                            
                            <td  width="10%">
                                {!! $accepted !!}
                            </td>

                            <td>{!! $date_start !!}</td>
                            <td>{!! $date_end !!}</td>

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
           