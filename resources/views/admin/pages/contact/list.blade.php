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
                    <th class="column-title">Contact Info</th>
                    <th class="column-title">Lời nhắn</th>
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Thời gian</th>
                    <th class="column-title">IP Address</th>
                </tr>
            </thead>
            <tbody>
                @if(count($items) > 0)
                    @foreach($items as $key => $val)
                        @php
                            $index          = $key + 1;
                            $name           = HightLight::show($val['name'], $params['search'], 'name');
                            $email          = HightLight::show($val['email'], $params['search'], 'email');
                            $phone          = HightLight::show($val['phone'], $params['search'], 'phone');
                            $message        = HightLight::show($val['message'], $params['search'], 'message');
                            $status         = Template::showItemStatus($controllerName, $val['id'], $val['status']);
                            $time           = $val['time'];
                            $ipAddress      = $val['ip_address'];
                        @endphp
                        <tr>
                            <td>{{ $index }}</td>
                            <td style="min-width: 150px; width: 20%">
                                <p><strong>Name: </strong>{!! $name !!}</p>
                                <p><strong>Email: </strong>{!! $email !!}</p>
                                <p><strong>Phone: </strong>{!! $phone !!}</p>
                            </td>
                            <td style="min-width: 300px; width: 40%">{!! $message !!}</td>
                            <td class="status-{{$val['id']}}">{!! $status !!}</td>
                            <td>{{ $time }}</td>
                            <td>{{ $ipAddress }}</td>
                        </tr>
                    @endforeach
                    
                @else
                    @include('admin.templates.list_empty', ['colspan' => 6])
                @endif
            </tbody>
        </table>
    </div>
</div>
