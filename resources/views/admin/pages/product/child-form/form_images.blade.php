@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttributes = config('zvn.template.form_input');
    $formLabelAttributes = config('zvn.template.form_label');

    $inputHiddenID = Form::hidden('id', $item['id'] ?? '');

    $arr      = [];
    $elements = [[
        'label'   => Form::label('', '', $formLabelAttributes),
        'element' => '<div class="needsclick dropzone" id="document-dropzone"></div>',
        'type'    => 'full-12'
    ]];

    $elements = array_merge($elements,$arr);
    array_push($elements, [
        'element' => $inputHiddenID . Form::submit('Save', [
            'class' => 'btn btn-danger',
            'id'    => 'submit',
            'name'  => 'changeDropzone'
        ]),
        'type'    => 'btn-submit'
    ]);
@endphp
{{--@dd($elements)--}}
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        @include('admin.templates.x_title', ['title' => 'Hình Ảnh Sản Phẩm'])
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