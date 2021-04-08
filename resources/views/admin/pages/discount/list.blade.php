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
                    <th class="column-title">Số tiền giảm</th>
                    <th class="column-title">Số % Giảm</th>
                    <th class="column-title">Số Lần Sử Dụng Cho Phép</th>
                    <th class="column-title">Số Lần Đã Sử Dụng</th>
                    <th class="column-title">Số tiền Nhỏ Nhất Cho Phép</th>
                    <th class="column-title">Số tiền Lớn Nhất Cho Phép</th>
                    <th class="column-title">Date start</th>
                    <th class="column-title">Date end</th>
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if (count($items) > 0)
                    @php
                        $iconUp = '<i class="fa fa-long-arrow-up" style="color:green;"></i> ';
                        $iconDown = '<i class="fa fa-long-arrow-down" style="color:red;"></i> ';
                        $iconMinus = '<i class="fa fa-minus" style="color:red;"></i> ';

                    @endphp
                    @foreach ($items as $key => $val)
                        @php
                            $index    = $key + 1;
                            $class    = ($index % 2 == 0) ? "even" : "odd";
                            $id       = $val['id'];

                            $code          = Hightlight::show($val['code'], $params['search'], 'code');
                            $price         = $val['price'] ? $iconMinus . Template::format_price($val['price']) : '';
                            $percent       = $val['percent'] ? $iconMinus . "{$val['percent']} %" : '';
                            $times_used   = Hightlight::show($val['times_used'], $params['search'], 'times_used');
                            $total_times  = Hightlight::show($val['total_times'], $params['search'], 'total_times');
                            $accepted_min = $iconUp . Template::format_price($val['min_price']);
                            $accepted_max = $iconDown . Template::format_price($val['max_price']);
                            $date_start    = Template::showItemHistory(null, $val['date_start'], 'only_time');
                            $date_end      = Template::showItemHistory(null, $val['date_end'], 'only_time');
                            $status        = Template::showItemStatus($controllerName, $id, $val['status']); ;
                            $listBtnAction = Template::showButtonAction($controllerName, $id);
                        @endphp

                        <tr class="{{ $class }} pointer">
                            <td >{{ $index }}</td>
                            <td width="10%">
                                 {!! $code !!}
                            </td>

                            <td  width="15%">{!! $price !!}</td>
                            <td width="10%">{!! $percent !!}</td>
                            <td  width="5%">{!! $total_times !!}</td>
                            <td  width="5%">{!! $times_used !!}</td>

                            <td  width="10%">{!! $accepted_min !!}</td>
                            <td  width="10%">{!! $accepted_max !!}</td>

                            <td>{!! $date_start !!}</td>
                            <td>{!! $date_end !!}</td>

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
           