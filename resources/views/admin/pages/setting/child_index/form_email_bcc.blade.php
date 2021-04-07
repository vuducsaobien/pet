@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttributes = config('zvn.template.form_input');
    $formLabelAttributes = config('zvn.template.form_label');

    $elements = [
        [
            'label'     => Form::label('bcc', ' ', $formLabelAttributes),
            'element'   => Form::textarea('bcc', $item['bcc'] ?? '', ['class' => 'tags form-control'])
        ],
        [
            'element'   => Form::submit('Lưu', ['class' => 'btn btn-success', 'name' => 'email_bcc_task']),
            'type'      => 'btn-submit'
        ]
    ]
@endphp
<div class="x_panel">
    @include('admin.templates.x_title', ['title' => 'BCC'])
    <div class="x_content">
        {!! Form::open([
            'url' => route("$controllerName/email_bcc_setting"), 
            'method' => 'POST',
            'class' => 'form-horizontal form-label-left',
            'id' => 'setting-email-bcc-form'
        ]) !!}
            {!! FormTemplate::show($elements) !!}
        {!! Form::close() !!}
    </div>
</div>

