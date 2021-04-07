
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
            'label'   => Form::label('seo_title', 'SEO title', $formLabelAttr),
            'element' => Form::text('seo_title', @$item['seo_title'],  $formInputAttr ),

        ],
        [
            'label'   => Form::label('seo_meta', 'SEO meta', $formLabelAttr),
            'element' => Form::text('seo_meta', @$item['seo_meta'],  $formInputAttr ),

        ],
        [
            'label'   => Form::label('seo_description', 'SEO description', $formLabelAttr),
            'element' => Form::text('seo_description', @$item['seo_description'],  $formInputAttr ),

        ],


        [
            'element' => $inputHiddenID .  Form::submit('Save', ['class'=>'btn btn-danger', 'name' => 'changeSeo']),
            'type'    => "btn-submit"
        ]
    ];
@endphp


<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        @include('admin.templates.x_title', ['title' => 'Tối ưu bộ máy tìm kiếm google'])
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
