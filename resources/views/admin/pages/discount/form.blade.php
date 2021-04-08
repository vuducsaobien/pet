@extends('admin.main')
@php

    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label');
    $formCkeditor  = config('zvn.template.form_ckeditor');
    
    if ( !empty($item['date_start']) ) {
        $item['date_start'] = date(config('zvn.format.long_time_format'), strtotime($item['date_start']));
    }
    if ( !empty($item['date_end']) ) {
        $item['date_end'] = date(config('zvn.format.long_time_format'), strtotime($item['date_end']));
    }

    $class         = 'form-control col-md-6 col-xs-12';

    $statusValue      = ['active' => config('zvn.template.status.active.name'), 'inactive' => config('zvn.template.status.inactive.name')];

    $inputHiddenID     = Form::hidden('id', @$item['id']);
    $inputHiddenThumb  = Form::hidden('thumb_current', @$item['thumb']);
    $inputPrice        = '<input type="text" name="price" class="money '.$class.' " value="'.@$item['price'].'"/>';
    $inputPercent      = '<input type="text" name="percent" class="percent '.$class.' " value="'.@$item['percent'].'"/>';
    $inputAccepted_min = '<input type="text" name="min_price" class="accepted_min '.$class.' " value="'.@$item['min_price'].'"/>';
    $inputAccepted_max = '<input type="text" name="max_price" class="accepted_max '.$class.' " value="'.@$item['max_price'].'"/>';
    $inputDateStart    = '
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
            'label'   => Form::label('price', 'Số Tiền Giảm (Nghìn Đồng) - A1', $formLabelAttr),
            'element' => $inputPrice
        ],[
            'label'   => Form::label('percent', 'Hoặc Giảm Giá theo % - A2', $formLabelAttr),
            'element' => $inputPercent
        ],[
            'label'   => Form::label('min_price', 'Số Tiền Nhỏ Nhất Cho Phép - B1 (Nghìn Đồng Trở Lên)', $formLabelAttr),
            'element' => $inputAccepted_min
        ],[
            'label'   => Form::label('max_price', 'Số Tiền Lớn Nhất Cho Phép - B2 (Nghìn Đồng Trở Xuống)', $formLabelAttr),
            'element' => $inputAccepted_max
        ],[
            'label'   => Form::label('total_times', 'Số Lần Sử Dụng Cho Phép', $formLabelAttr),
            'element' => Form::number('total_times', @$item['total_times'],  $formInputAttr )
        ],[
            'label'   => Form::label('date_start', 'Ngày Bắt Đầu - C1', $formLabelAttr),
            'element' => $inputDateStart
        ],[
            'label'   => Form::label('date_end', 'Ngày Kết Thúc - C2', $formLabelAttr),
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
