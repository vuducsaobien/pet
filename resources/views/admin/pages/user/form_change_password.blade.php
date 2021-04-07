
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label_edit');

    $inputHiddenID    = Form::hidden('id', $item['id']);

    $elements = [
        [
            'label'   => Form::label('password', 'Password', $formLabelAttr),
            'element' => Form::password('password', $formInputAttr),
        ],[
            'label'   => Form::label('password_confirmation', 'Password Confirmation ', $formLabelAttr),
            'element' => Form::password('password_confirmation', $formInputAttr),
        ],[
            'element' => $inputHiddenID . Form::submit('Save', ['class'=>'btn btn-success', 'name' => 'taskChangePassword']),
            'type'    => "btn-submit-edit"
        ]
    ];
@endphp


<div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
        @include('admin.templates.x_title', ['title' => 'Form Change Password'])
        <div class="x_content">
            {{ Form::open([
                'method'         => 'POST', 
                'url'            => route("$controllerName/change-password"),
                'accept-charset' => 'UTF-8',
                'enctype'        => 'multipart/form-data',
                'class'          => 'form-horizontal form-label-left',
                'id'             => 'main-form' ])  }}
                {!! FormTemplate::show($elements)  !!}
            {{ Form::close() }}
        </div>
    </div>
</div>
