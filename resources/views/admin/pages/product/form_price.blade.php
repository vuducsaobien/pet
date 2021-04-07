
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr = config('zvn.template.form_input_no_padding');
    $formLabelAttr = config('zvn.template.form_label_no_padding');



    $inputHiddenID = Form::hidden('id', $item['id'] ?? '');


    $elements = [
        [
            'label'   => Form::label('price', 'Price (VND)', $formLabelAttr),
            'element' => Form::text('price', $item['price'], $formInputAttr ),
            'type'=>'full'
        ],
        [
            'label'   => Form::label('price_sale', 'Giá sale (VND)', $formLabelAttr),
            'element' => Form::text('price_sale', $item['price_sale'],  $formInputAttr ),
            'type'=>'full'

        ],
        [
            'element' => $inputHiddenID .  Form::submit('Save', ['class'=>'btn btn-danger', 'name' => 'changePrice']),
            'type'    => "btn-submit"
        ]
    ];
@endphp


<div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
        @include('admin.templates.x_title', ['title' => 'Giá sản phẩm'])
        <div class="x_content">
            {{ Form::open([
                'method'         => 'POST', 
                'url'            => route("$controllerName/change-price"),
                'accept-charset' => 'UTF-8',
                'enctype'        => 'multipart/form-data',
                'class'          => 'form-horizontal form-label-left',
                'id'             => 'main-form' ])  }}
                {!! FormTemplate::show($elements)  !!}
            {{ Form::close() }}
        </div>
    </div>
</div>
