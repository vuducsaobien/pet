<style>
    input[type='checkbox']{
        margin: 10px 0 0;
    }
</style>
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr = config('zvn.template.form_input_no_padding');
    $formLabelAttr = config('zvn.template.form_label_no_padding');


    $statusValue      = ['default' => 'Select status', 'active' => config('zvn.template.status.active.name'), 'inactive' => config('zvn.template.status.inactive.name')];

    $inputHiddenID = Form::hidden('id', $item['id'] ?? '');


    $elements = [
        [
            'label'   => Form::label('status', 'Status', $formLabelAttr),
            'element' => Form::select('status', $statusValue, @$item['status'],  $formInputAttr)
        ],
/*        [
            'label'   => Form::label('special', 'Special', $formLabelAttr),
            'element' => Form::checkbox('special', @$item['special'],@$item['special']==1?true:false).'   Là sản phẩm đặc biệt'
        ],
*/        [
            'element' => $inputHiddenID .  Form::submit('Save', ['class'=>'btn btn-danger', 'name' => 'changeSpecial']),
            'type'    => "btn-submit"
        ]
    ];
@endphp


<div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
        @include('admin.templates.x_title', ['title' => 'Tính năng đặc biệt'])
        <div class="x_content">
            {{ Form::open([
                'method'         => 'POST', 
                'url'            => route("$controllerName/change-special"),
                'accept-charset' => 'UTF-8',
                'enctype'        => 'multipart/form-data',
                'class'          => 'form-horizontal form-label-left',
                'id'             => 'main-form' ])  }}
                {!! FormTemplate::show($elements)  !!}
            {{ Form::close() }}
        </div>
    </div>
</div>
