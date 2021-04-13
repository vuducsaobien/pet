@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formCKEditorAttributes = config('zvn.template.form_ckeditor');
    $formLabelAttributes    = config('zvn.template.form_label');

    // echo '<pre style="color:red";>$item === '; print_r($item);echo '</pre>';
    // echo '<h3>Die is Called </h3>';die;

    $elements = [[
            'label'     => Form::label('setting-policy-terms-of-use', 'Điều Khoản Sử Dụng', $formLabelAttributes),
            'element'   => Form::textarea('setting-policy-terms-of-use', @$item['setting-policy-terms-of-use'], $formCKEditorAttributes)
        ],[
            'label'     => Form::label('setting-policy-exchange', 'Chính Sách Đổi Hàng', $formLabelAttributes),
            'element'   => Form::textarea('setting-policy-exchange', @$item['setting-policy-exchange'], $formCKEditorAttributes)
        ],[
            'label'     => Form::label('setting-policy-shopping-guide', 'Hướng Dẫn Mua Hàng', $formLabelAttributes),
            'element'   => Form::textarea('setting-policy-shopping-guide', @$item['setting-policy-shopping-guide'], $formCKEditorAttributes)
        ],[
            'label'     => Form::label('setting-policy-business-conception', 'Quan Điểm Kinh Doanh', $formLabelAttributes),
            'element'   => Form::textarea('setting-policy-business-conception', @$item['setting-policy-business-conception'], $formCKEditorAttributes)
        ],[
            'element'   => Form::submit('Lưu', ['class' => 'btn btn-success']),
            'type'      => 'btn-submit'
    ]]
@endphp

<div class="x_panel">
    <div class="x_content">
        {!! Form::open([
            'url' => route("$controllerName/policy_setting"), 
            'method' => 'POST', 
            'class' => 'form-horizontal form-label-left',
            'files' => true,
            'id' => 'main-form'
        ]) !!}
            {!! FormTemplate::show($elements) !!}
        {!! Form::close() !!}
    </div>
</div>

