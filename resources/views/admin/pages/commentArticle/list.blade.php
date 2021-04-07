@php
    use App\Helpers\Template as Template;
    use App\Helpers\URL;
    use App\Helpers\Hightlight as Hightlight;
@endphp
<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">#</th>
                    <th class="column-title">Name</th>
                    <th class="column-title">Message</th>
                    <th class="column-title">Thuộc về bài viết</th>
                    <th class="column-title">Trạng thái</th>
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
                            $name            = Template::showNestedSetName($val['name'], $val['depth']);
                            $status          = Template::showItemStatus($controllerName, $id, $val['status']);
                            $message=$val['message'];
                            $isHome          = Template::showItemIsHome($controllerName, $id, $val['is_home']);
                            $display         = Template::showItemSelect($controllerName, $id, $val['display'], 'display');
                            $createdHistory  = Template::showItemHistory($val['created_by'], $val['created']);
                            $modifiedHistory = Template::showItemHistory($val['modified_by'], $val['modified']);
                            $listBtnAction   = Template::showButtonAction($controllerName, $id);
                            $article=$val['article'];
                        @endphp

                        <tr class="{{ $class }} pointer">
                            <td >{{ $index }}</td>
                            <td width="25%">{!! $name !!}</td>
                            <td>{!! $message !!}</td>
                            <td><a href="{{URL::linkArticle($article)}}"><i>{!! $article->name !!}</i></a></td>
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
