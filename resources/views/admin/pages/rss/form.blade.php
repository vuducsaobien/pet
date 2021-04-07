@extends('admin.main')
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formTitle = isset($item['id']) ? 'Chỉnh sửa' : 'Thêm mới';
    $formInputAttributes = config('zvn.template.form_input');
    $formLabelAttributes = config('zvn.template.form_label');
    
    $statusValues = ['default' => 'Select status', 'active' => config('zvn.template.status.active.name'), 'inactive' => config('zvn.template.status.inactive.name')];
    $sourceValues = ['default' => 'Select source'] + array_combine(array_keys(config('zvn.template.rss_source')), array_column(config('zvn.template.rss_source'), 'name'));

    $inputHiddenID              = Form::hidden('id', $item['id'] ?? '');
    $inputHiddenThumbCurrent    = Form::hidden('thumb_current', $item['thumb'] ?? '');
    $elements = [
        [
            'label'     => Form::label('name', 'Name', $formLabelAttributes),
            'element'   => Form::text('name', $item['name'] ?? '', $formInputAttributes)
        ],
        [
            'label'     => Form::label('link', 'Link', $formLabelAttributes),
            'element'   => Form::text('link', $item['link'] ?? '', $formInputAttributes)
        ],
        [
            'label'     => Form::label('source', 'Source', $formLabelAttributes),
            'element'   => Form::select('source', $sourceValues, $item['source'] ?? 'default', $formInputAttributes)
        ],
        [
            'label'     => Form::label('status', 'Status', $formLabelAttributes),
            'element'   => Form::select('status', $statusValues, $item['status'] ?? 'default', $formInputAttributes)
        ],
        [
            'element'   => $inputHiddenID . Form::submit('Save', ['class' => 'btn btn-success']),
            'type'      => 'btn-submit'
        ]
    ]
@endphp
@section('content')
    @include('admin.templates.page_header', ['pageIndex' => false])
    @include('admin.templates.error')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => $formTitle])
                <div class="x_content">
                    {!! Form::open([
                        'url' => route("$controllerName/save"), 
                        'method' => 'POST', 
                        'files' => true, 
                        'class' => 'form-horizontal form-label-left',
                        'id' => 'main-form'
                    ]) !!}
                        {!! FormTemplate::show($elements) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

