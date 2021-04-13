@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttributes = config('zvn.template.form_input');
    $formLabelAttributes = config('zvn.template.form_label');
    
    $elements = [[
            'label'     => Form::label('link', 'Link Playlist Youtube', $formLabelAttributes),
            'element'   => Form::text('link', $link ?? '', $formInputAttributes)
        ],[
            'element'   => Form::submit('Save', ['class' => 'btn btn-success']),
            'type'      => 'btn-submit'
    ]];
@endphp

{!! Form::open([
    'url'    => route("$controllerName/save"),
    'method' => 'POST',
    'files'  => true,
    'class'  => 'form-horizontal form-label-left',
    'id'     => 'main-form'
]) !!}
    {!! FormTemplate::show($elements) !!}
{!! Form::close() !!}
