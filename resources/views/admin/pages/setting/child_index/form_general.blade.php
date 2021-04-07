@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttributes = config('zvn.template.form_input');
    $formCKEditorAttributes = config('zvn.template.form_ckeditor');
    $formLabelAttributes = config('zvn.template.form_label');

    // echo '<pre style="color:red";>$item === '; print_r($item);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;
    $logo = $item['logo'] ?? '';
    $logoElement = sprintf('
    <div class="input-group">
        <span class="input-group-btn">
            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
            <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="thumbnail" class="form-control" type="text" name="logo" value="%s">
    </div>
    <img id="holder" src="%s" style="margin-top:15px;max-height:100px;">
    ', $logo, asset($logo));

    $elements = [[
            'label'     => Form::label('logo', 'Logo', $formLabelAttributes),
            'element'   => $logoElement
        ],[
            'label'     => Form::label('hotline', 'Hotline', $formLabelAttributes),
            'element'   => Form::text('hotline', $item['hotline'] ?? '', $formInputAttributes)
        ],[
            'label'     => Form::label('working_time', 'Thời gian làm việc', $formLabelAttributes),
            'element'   => Form::text('working_time', $item['working_time'] ?? '', $formInputAttributes)
        ],[
            'label'     => Form::label('copyright', 'Copyright', $formLabelAttributes),
            'element'   => Form::text('copyright', $item['copyright'] ?? '', $formInputAttributes)
        ],[
            'label'     => Form::label('address', 'Địa chỉ', $formLabelAttributes),
            'element'   => Form::text('address', $item['address'] ?? '', $formInputAttributes)
        ],
        [
            'label'     => Form::label('introduce', 'Giới thiệu', $formLabelAttributes),
            'element'   => Form::textarea('introduce', $item['introduce'] ?? '', $formCKEditorAttributes)
        ],
        [
            'label'     => Form::label('contact_column_1', 'Thông tin liên hệ contact cột 1', $formLabelAttributes),
            'element'   => Form::textarea('contact_column_1', $item['contact_column_1'] ?? '', $formCKEditorAttributes)
        ],
       [
            'label'     => Form::label('contact_column_2', 'Thông tin liên hệ contact cột 2', $formLabelAttributes),
            'element'   => Form::textarea('contact_column_2', $item['contact_column_2'] ?? '', $formCKEditorAttributes)
        ],
        [
            'label'     => Form::label('contact_column_3', 'Thông tin liên hệ contact cột 3', $formLabelAttributes),
            'element'   => Form::textarea('contact_column_3', $item['contact_column_3'] ?? '', $formCKEditorAttributes)
        ],
        [
            'label'     => Form::label('maps', 'Google maps', $formLabelAttributes),
            'element'   => Form::textarea('maps', $item['maps'] ?? '', $formInputAttributes)
        ],[
            'element'   => Form::submit('Lưu', ['class' => 'btn btn-success']),
            'type'      => 'btn-submit'
    ]]
@endphp

<div class="x_panel">
    <div class="x_content">
        {!! Form::open([
            'url' => route("$controllerName/general_setting"), 
            'method' => 'POST', 
            'class' => 'form-horizontal form-label-left',
            'files' => true,
            'id' => 'main-form'
        ]) !!}
            {!! FormTemplate::show($elements) !!}
        {!! Form::close() !!}
    </div>
</div>

