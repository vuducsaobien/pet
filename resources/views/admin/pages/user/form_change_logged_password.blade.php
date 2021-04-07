@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttributes = config('zvn.template.form_input');
    $formLabelAttributes = config('zvn.template.form_label');

    $elements = [
        [
            'label'     => Form::label('old_password', 'Old Password', $formLabelAttributes),
            'element'   => Form::password('old_password', $formInputAttributes)
        ],
        [
            'label'     => Form::label('password', 'New Password', $formLabelAttributes),
            'element'   => Form::password('password', $formInputAttributes)
        ],
        [
            'label'     => Form::label('password_confirmation', 'New Password Confirmation', $formLabelAttributes),
            'element'   => Form::password('password_confirmation', $formInputAttributes)
        ],
        [
            'element'   => Form::submit('Save', ['class' => 'btn btn-success', 'name' => 'taskChangeLoggedPassword']),
            'type'      => 'btn-submit'
        ]
    ]
@endphp

@extends('admin.main')

@section('content')
    @include('admin.templates.page_header', ['pageIndex' => false])
    @include('admin.templates.error')

    <div class="row">
        <div class="col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => 'Change Password'])
                <div class="x_content">
                    {!! Form::open([
                        'url' => route("$controllerName/post-change-logged-password"), 
                        'method' => 'POST',
                        'class' => 'form-horizontal form-label-left',
                        'id' => 'change-pass-form'
                    ]) !!}
                        {!! FormTemplate::show($elements) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection







