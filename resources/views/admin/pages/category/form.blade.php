@extends('admin.main')
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label');

    $statusValue      = [
        'active'   => config('zvn.template.status.active.name'),
        'inactive' => config('zvn.template.status.inactive.name')
    ];
    $is_homeValue      = [
        'yes' => config('zvn.template.is_home.yes.name'),
        'no'  => config('zvn.template.is_home.no.name')
    ];
    $displayValue      = [
        'list' => config('zvn.template.display.list.name'),
        'grid' => config('zvn.template.display.grid.name')
    ];

    $inputHiddenID    = Form::hidden('id', @$item['id']);

    $elements = [[
            'label'   => Form::label('name', 'Name', $formLabelAttr),
            'element' => Form::text('name', @$item['name'], $formInputAttr )
        ],[
            'label'   => Form::label('slug', 'Slug', $formLabelAttr),
            'element' => Form::text('slug', @$item['slug'],  $formInputAttr )
        ],[
            'label'   => Form::label('parent_id', 'Parent', $formLabelAttr),
            'element' => Form::select('parent_id', $nodes, @$item['parent_id'], $formInputAttr)
        ],[
            'label'   => Form::label('status', 'Status', $formLabelAttr),
            'element' => Form::select('status', $statusValue, @$item['status'], $formInputAttr)
        ],[
            'label'   => Form::label('is_home', 'Hiển thị Ngoài Trang Chủ', $formLabelAttr),
            'element' => Form::select('is_home', $is_homeValue, @$item['is_home'], $formInputAttr)
        ],[
            'label'   => Form::label('display', 'Hiển Thị Kiểu', $formLabelAttr),
            'element' => Form::select('display', $displayValue, @$item['display'], $formInputAttr)
        ],[
            'label'   => Form::label('thumb', 'Hình Ảnh', $formLabelAttr),
            'element' => Template::showFileManager($item['thumb'] ?? '')
        ],[
            'element' => $inputHiddenID . Form::submit('Save', ['class'=>'btn btn-success']),
            'type'    => "btn-submit"
    ]];
@endphp

@section('content')
    @include ('admin.templates.page_header', ['pageIndex' => false])
    @include ('admin.templates.error')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => 'Form'])
                <div class="x_content">
                    {{ Form::open([
                        'method'         => 'POST', 
                        'url'            => route("$controllerName/save"),
                        'accept-charset' => 'UTF-8',
                        'enctype'        => 'multipart/form-data',
                        'class'          => 'form-horizontal form-label-left',
                        'id'             => 'main-form' ])  }}
                        {!! FormTemplate::show($elements)  !!}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
