
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr = config('zvn.template.form_input_no_padding');
    $formLabelAttr = config('zvn.template.form_label_no_padding');




    $inputHiddenID = Form::hidden('id', $item['id'] ?? '');

   

    $elements = [
         [
            'label'   => Form::label('category_id', 'Category', $formLabelAttr),
            'element' => Form::select('category_id', $itemsCategory, @$item['category_id'],  $formInputAttr)
        ],
      

        [
            'element' => $inputHiddenID .  Form::submit('Save', ['class'=>'btn btn-danger', 'name' => 'changeCategory']),
            'type'    => "btn-submit"
        ]
    ];
@endphp


<div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
        @include('admin.templates.x_title', ['title' => 'Thuộc danh mục'])
        <div class="x_content">
            {{ Form::open([
                'method'         => 'POST', 
                'url'            => route("$controllerName/change-category-edit"),
                'accept-charset' => 'UTF-8',
                'enctype'        => 'multipart/form-data',
                'class'          => 'form-horizontal form-label-left',
                'id'             => 'main-form' ])  }}
                {!! FormTemplate::show($elements)  !!}
            {{ Form::close() }}
        </div>
    </div>
</div>
