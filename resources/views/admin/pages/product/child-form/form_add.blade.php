@extends('admin.main')

@php

    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr       = config('zvn.template.form_input');
    $formLabelAttributes = config('zvn.template.form_label');
    $formLabelAttr       = config('zvn.template.form_label');
    $class               = 'form-control col-md-6 col-xs-12';

    $inputHiddenID = Form::hidden('id', $item['id'] ?? '');
    $inputPrice    = '<input type="text" name="price" 
    class="money '.$class.' " value="'.@$item['price'].'"/>';
    $inputOrdering = '<input type="number" name="ordering" 
    class="'.$class.'" value="1" min="1"/>';

    $elements = [[
            'label'   => Form::label('name', 'Name', $formLabelAttr),
            'element' => Form::text('name', $item['name'] ?? '', $formInputAttr)
        ],[
            'label'   => Form::label('slug', 'Slug', $formLabelAttr),
            'element' => Form::text('slug', $item['slug']??"",  $formInputAttr ),
        ],[
            'label'   => Form::label('category_id', 'Category', $formLabelAttr),
            'element' => Form::select('category_id', $itemsCategory, @$item['category_id'],  $formInputAttr)
        ],[
            'label'   => Form::label('price', 'Price (VND)', $formLabelAttr),
            'element' => $inputPrice
        ],[
            'label'   => Form::label('ordering', 'Ordering', $formLabelAttributes),
            'element' => $inputOrdering
        ],[
            'label'   => Form::label('', 'Thư viện hình ảnh', $formLabelAttributes),
            'element' => '<div class="needsclick dropzone" id="document-dropzone"></div>',
        ],[
            'element' => $inputHiddenID.Form::submit('Lưu', ['class' => 'btn btn-success']),
            'type'    => 'btn-submit'
    ]];
@endphp

@section('content')
    @include('admin.templates.page_header', ['pageIndex' => false])
    @include('admin.templates.error')

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => 'Add New Product'])
                <div class="x_content">
                    {!! Form::open([
                        'url' => route("$controllerName/save"),
                        'method' => 'POST',
                        'files' => true,
                        'class' => 'form-horizontal form-label-left',
                        'id' => 'main-form'
                    ]) !!}
                    {!! FormTemplate::show($elements) !!}
                    {!! Form::close() !!}


                </div>
            </div>
        </div>

@endsection
