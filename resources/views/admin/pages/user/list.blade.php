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
                    <th class="column-title">User Info</th>
                    <th class="column-title">Permission Default Group</th>
                    <th class="column-title">Permission Deny User</th>
                    <th class="column-title">Permission Add User</th>
                    <th class="column-title">Level</th>
                    <th class="column-title">Trạng thái</th>
                    {{-- <th class="column-title">Tạo mới</th>
                    <th class="column-title">Chỉnh sửa</th> --}}
                    <th class="column-title">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if (count($items) > 0)
                    @foreach ($items as $key => $val)
                        @php
                            $index              = $key + 1;
                            $class              = ($index % 2 == 0) ? "even" : "odd";
                            $id                 = $val['id'];
                            $username           = Hightlight::show($val['username'], $params['search'], 'username');
                            $fullname           = Hightlight::show($val['fullname'], $params['search'], 'fullname');
                            $email              = Hightlight::show($val['email'], $params['search'], 'email');
                            $permissionGroup    = $list_permission_group['permission_group'][$key];
                            $permissionUserDeny = $list_permission_user['permission_id_deny'][$key];
                            $permissionUserAdd  = $list_permission_user['permission_id_add'][$key];
                            $group              = $list_permission_group['group_name'][$key];
                            $level              = Template::showItemSelect($controllerName, $id, $val['level'], 'level');
                            $avatar             = Template::showItemThumb($controllerName, $val['thumb'], $val['name']);
                            $status             = Template::showItemStatus($controllerName, $id, $val['status']); ;
                            $createdHistory     = Template::showItemHistory($val['created_by'], $val['created']);
                            $modifiedHistory    = Template::showItemHistory($val['modified_by'], $val['modified']);
                            $listBtnAction      = Template::showButtonAction($controllerName, $id);
                        @endphp

                        <tr class="{{ $class }} pointer">
                            <td >{{ $index }}</td>
                            <td width="13%">
                                <p>Username: {!! $username !!}</p>
                                <p>{!! $email !!}</p>
                                <p>Fullname: {!! $fullname !!}</p>
                                <p>Group: {!! $group !!}</p>
                                {!! $avatar !!}
                            </td>

                            <td width="20%">{!! $permissionGroup !!}</td>
                            <td width="20%">{!! $permissionUserDeny !!}</td>
                            <td width="20%">{!! $permissionUserAdd !!}</td>

                            <td width="20%">{!! $level !!}</td>
                            <td>{!! $status !!}</td>
                            {{-- <td>{!! $createdHistory !!}</td>
                            <td>{!! $modifiedHistory !!}</td> --}}
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
           