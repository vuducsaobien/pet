@extends('admin.main')
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttributes = config('zvn.template.form_input');
    $formLabelAttributes = config('zvn.template.form_label');
    
    $statusValues   = [
        'active'   => config('zvn.template.status.active.name'),
        'inactive' => config('zvn.template.status.inactive.name')
    ];

    $inputHiddenID = Form::hidden('id', @$item['id']);

    $elements = [[
            'label'     => Form::label('controller', 'Tên Controller Dev', $formLabelAttributes),
            'element'   => Form::text('controller', @$item['controller'], $formInputAttributes)
        ],[
            'label'     => Form::label('name', 'Tên Controller Hiển Thị', $formLabelAttributes),
            'element'   => Form::text('name', @$item['name'], $formInputAttributes)
        ],[
            'label'     => Form::label('status', 'Status', $formLabelAttributes),
            'element'   => Form::select('status', $statusValues, $item['status'], $formInputAttributes)
        ],[
            'element'   => $inputHiddenID . Form::submit('Save', ['class' => 'btn btn-success']),
            'type'      => 'btn-submit'
    ]]
@endphp

@section('content')
    @include('admin.templates.page_header', ['pageIndex' => false])
    @include('admin.templates.error')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => 'Form'])
                <div class="x_content">
                    {!! Form::open([
                        'url'    => route("$controllerName/save"),
                        'method' => 'POST',
                        'files'  => true,
                        'class'  => 'form-horizontal form-label-left',
                        'id'     => 'main-form'
                    ]) !!}
                        {!! FormTemplate::show($elements) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

