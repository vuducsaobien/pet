@extends('admin.main')
@php

    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label');
    $formCkeditor  = config('zvn.template.form_ckeditor');
    $class         = 'form-control col-md-6 col-xs-12';
    
    // Format Time When Edit
    if ( !empty($item['created']) ) {
        $item['created'] = date(config('zvn.format.long_time_format'), strtotime($item['created']));
    }

    $statusValue = ['active' => config('zvn.template.status.active.name'), 'inactive' => config('zvn.template.status.inactive.name')];
    $starValue   = [5 => '5 sao', 4 => '4 sao', 3 => '3 sao', 2 => '2 sao', 1 => '1 sao'];

    $inputHiddenID    = Form::hidden('id', @$item['id']);
    $inputHiddenThumb = Form::hidden('thumb_current', @$item['thumb']);
    $inputCreated    = '
        <div class="input-group date" id="datetimepicker_start">
            <input type="text" name="created" class="'.$class.'" value="'.@$item['created'].'" />
            <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    ';

    $elements = [[
            'label'   => Form::label('name', 'Tên KH', $formLabelAttr),
            'element' => Form::text('name', @$item['name'],  $formInputAttr )
        ],[
            'label'   => Form::label('email', 'Email', $formLabelAttr),
            'element' => Form::email('email', @$item['email'],  $formInputAttr )
        ],[
            'label'   => Form::label('product_code', 'Mã SP', $formLabelAttr),
            'element' => Form::text('product_code', @$item['product_code'],  $formInputAttr )
        ],[
            'label'   => Form::label('message', 'Message', $formLabelAttr),
            'element' => Form::textArea('message', @$item['message'],  $formCkeditor )
        ],[
            'label'   => Form::label('star', 'Số Sao', $formLabelAttr),
            'element' => Form::select('star', $starValue, @$item['star'], $formInputAttr)
        ],[
            'label'   => Form::label('status', 'Status', $formLabelAttr),
            'element' => Form::select('status', $statusValue, @$item['status'], $formInputAttr)
        ],[
            'label'   => Form::label('created', 'Ngày Tạo', $formLabelAttr),
            'element' => $inputCreated
        ],[
            'element' => $inputHiddenID . $inputHiddenThumb . Form::submit('Save', ['class'=>'btn btn-success']),
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
