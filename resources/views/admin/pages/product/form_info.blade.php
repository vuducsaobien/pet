
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr = config('zvn.template.form_input_no_padding');
    $formLabelAttr = config('zvn.template.form_label_no_padding');
    $formCkeditor  = config('zvn.template.form_ckeditor');


    $statusValue      = ['default' => 'Select status', 'active' => config('zvn.template.status.active.name'), 'inactive' => config('zvn.template.status.inactive.name')];

    $inputHiddenID = Form::hidden('id', $item['id'] ?? '');


    $elements = [
        [
            'label'   => Form::label('name', 'Name', $formLabelAttr),
            'element' => Form::text('name', $item['name'], $formInputAttr ),
            'type'=>'full'
        ],
        [
            'label'   => Form::label('slug', 'Slug', $formLabelAttr),
            'element' => Form::text('slug', $item['slug'],  $formInputAttr ),
            'type'=>'full'

        ],
/*         [
            'label'     => Form::label('logo', 'Ảnh đại diện', $formLabelAttr),
            'element'   => Template::showFileManager($item['thumb'] ?? ''),
            'type'=>'full'

        ],
*/        [
            'label'   => Form::label('description', 'Description', $formLabelAttr),
            'element' => Form::textArea('description', @$item['description'],  $formCkeditor ),
            'type'=>'full'

        ],


        [
            'element' => $inputHiddenID .  Form::submit('Save', ['class'=>'btn btn-danger', 'name' => 'changeInfo']),
            'type'    => "btn-submit"
        ]
    ];
@endphp


<div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
        @include('admin.templates.x_title', ['title' => 'Thông tin cơ bản'])
        <div class="x_content">
            {{ Form::open([
                'method'         => 'POST', 
                'url'            => route("$controllerName/change-info"),
                'accept-charset' => 'UTF-8',
                'enctype'        => 'multipart/form-data',
                'class'          => 'form-horizontal form-label-left',
                'id'             => 'main-form' ])  }}
                {!! FormTemplate::show($elements)  !!}
            {{ Form::close() }}
        </div>
    </div>
</div>
