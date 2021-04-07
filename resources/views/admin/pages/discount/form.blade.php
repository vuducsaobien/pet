@extends('admin.main')
@php

    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label');
    $formCkeditor  = config('zvn.template.form_ckeditor');
    $class = 'form-control col-md-6 col-xs-12';

    $statusValue      = ['active' => config('zvn.template.status.active.name'), 'inactive' => config('zvn.template.status.inactive.name')];

    $inputHiddenID    = Form::hidden('id', @$item['id']);
    $inputHiddenThumb = Form::hidden('thumb_current', @$item['thumb']);
    $inputPrice       = '<input type="text" name="price" class="money '.$class.' " value="'.@$item['price'].'"/>';
    $inputPercent     = '<input type="text" name="percent" class="percent '.$class.' " value="'.@$item['percent'].'"/>';
    $inputAccepted    = '<input type="text" name="min_price" class="accepted '.$class.' " value="'.@$item['min_price'].'"/>';
    $inputDateStart   = '
        <div class="input-group date" id="datetimepicker_start">
            <input type="text"  name="date_start" class="'.$class.'" value="'.@$item['date_start'].'" />
            <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    ';
    $inputDateEnd   = '
        <div class="input-group date" id="datetimepicker_end">
            <input type="text"  name="date_end" class="'.$class.'" value="'.@$item['date_end'].'" />
            <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    ';

    
    $elements = [[
            'label'   => Form::label('code', 'Tên Mã Giảm Giá', $formLabelAttr),
            'element' => Form::text('code', @$item['code'],  $formInputAttr )
        ],[
            'label'   => Form::label('times', 'Số Lần Sử Dụng', $formLabelAttr),
            'element' => Form::number('times', @$item['times'],  $formInputAttr )
        ],[
            'label'   => Form::label('price', 'Số Tiền Giảm Giá (Nghìn Đồng)', $formLabelAttr),
            // 'element' => Form::text('price', @$item['price'],  $formInputAttr )
            'element' => $inputPrice
        ],[
            'label'   => Form::label('percent', 'Số Tiền Giảm Giá ( % )', $formLabelAttr),
            // 'element' => Form::text('percent', @$item['percent'],  $formInputAttr )
            'element' => $inputPercent
        ],[
            'label'   => Form::label('min_price', 'Số Tiền Áp Dụng (Nghìn Đồng Trở Lên)', $formLabelAttr),
            // 'element' => Form::text('min_price', @$item['min_price'],  $formInputAttr )
            'element' => $inputAccepted
        ],[
            'label'   => Form::label('date_start', 'Ngày Bắt Đầu', $formLabelAttr),
            'element' => $inputDateStart
            // date('Y-m-d H:i:s');
        ],[
            'label'   => Form::label('date_end', 'Ngày Kết Thúc', $formLabelAttr),
            'element' => $inputDateEnd
        ],[
            'label'   => Form::label('status', 'Status', $formLabelAttr),
            'element' => Form::select('status', $statusValue, @$item['status'], $formInputAttr)
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
