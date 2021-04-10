@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr        = config('zvn.template.form_input_no_padding');
    $formInputAttrMoney   = config('zvn.template.form_input_no_padding_money');
    $formInputAttrPercent = config('zvn.template.form_input_no_padding_percent');
    $formLabelAttr        = config('zvn.template.form_label_no_padding');
    $formCkeditor         = config('zvn.template.form_ckeditor');
    $class                = 'form-control col-md-10 col-xs-12';

    $statusValue     = ['active' => config('zvn.template.status.active.name'), 'inactive' => config('zvn.template.status.inactive.name')];
    $inputHiddenID   = Form::hidden('id', $item['id'] ?? '');
    $inputHiddenTask = Form::hidden('task_change', 'change-general');

    $inputPriceUlti = '<input type="text" name="price_until" disabled
    class="money ' .$class.'" value="'.@$item['price_until'].'"/>';

    $inputOrdering = '<input type="number" name="ordering" 
    class="'.$class.'" value="'.@$item['ordering'].'" min="1"/>';

    $elements = [[
            'label'   => Form::label('name', 'Name', $formLabelAttr),
            'element' => Form::text('name', $item['name'], $formInputAttr ),
            'type'    => 'full'
        ],[
            'label'   => Form::label('slug', 'Slug', $formLabelAttr),
            'element' => Form::text('slug', $item['slug'],  $formInputAttr ),
            'type'    => 'full'
        ],[
            'label'   => Form::label('category_id', 'Category', $formLabelAttr),
            'element' => Form::select('category_id', $itemsCategory, @$item['category_id'],  $formInputAttr),
            'type'    => 'full'
        ],[
            'label'   => Form::label('price', 'Giá Gốc (VND) - A1', $formLabelAttr),
            'element' => Form::text('price', @$item['price'], $formInputAttrMoney ),
            'type'    => 'full'
        ],[
            'label'   => Form::label('price_sale', 'Giảm Giá theo Tiền Mặt (- VND) - A2', $formLabelAttr),
            'element' => Form::text('price_sale', @$item['price_sale'],  $formInputAttrMoney ),
            'type'    => 'full'
        ],[
            'label'   => Form::label('sale', 'Giảm Giá theo % (- %) - A3', $formLabelAttr),
            'element' => Form::text('sale', @$item['sale'],  $formInputAttrPercent ),
            'type'    => 'full'
        ],[
            'label'   => Form::label('price_until', 'Giá Cuối Cùng (= VND) - A4', $formLabelAttr),
            'element' => $inputPriceUlti,
            'type'    => 'full'
        ],[
            'label'   => Form::label('ordering', 'Ordering', $formLabelAttr),
            'element' => $inputOrdering,
            'type'    => 'full'
        ],[
            'label'   => Form::label('short_description', 'Short Description', $formLabelAttr),
            'element' => Form::textArea('short_description', @$item['short_description'],  $formCkeditor ),
            'type'    => 'full'
        ],[
            'label'   => Form::label('description', 'Description', $formLabelAttr),
            'element' => Form::textArea('description', @$item['description'],  $formCkeditor ),
            'type'    => 'full'
        ],[
            'element' => $inputHiddenID . $inputHiddenTask . Form::submit('Save', [
                'class' => 'btn btn-danger'
            ]),
            'type'    => "btn-submit"
    ]];
@endphp


<div class="col-md-12 col-sm-12 col-xs-12">
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
