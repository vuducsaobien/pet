@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttributes = config('zvn.template.form_input');
    $formLabelAttributes = config('zvn.template.form_label');

    $elements = [
        [
            'label'     => Form::label('username', 'Tài khoản', $formLabelAttributes),
            'element'   => Form::email('username', $item['username'] ?? '', $formInputAttributes)
        ],
        [
            'label'     => Form::label('password', 'Mật khẩu', $formLabelAttributes),
            'element'   => Form::text('password', $item['password'] ?? '', $formInputAttributes)
        ],
        [
            'element'   => Form::submit('Lưu', ['class' => 'btn btn-success']),
            'type'      => 'btn-submit'
        ]
    ]
@endphp
<div class="x_panel">
    @include('admin.templates.x_title', ['title' => 'Tài khoản'])
    <div class="x_content">
        {!! Form::open([
            'url' => route("$controllerName/email_account_setting"), 
            'method' => 'POST',
            'class' => 'form-horizontal form-label-left',
            'id' => 'setting-email-account-form'
        ]) !!}
            {!! FormTemplate::show($elements) !!}
        {!! Form::close() !!}
    </div>
</div>