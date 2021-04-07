@php

    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttributes = config('zvn.template.form_input');
    $formLabelAttributes = [
            'class' => 'control-label col-md-1 col-sm-3 col-xs-12'
        ];
    $form_tag=config('zvn.template.form_tag');



    $inputHiddenID = Form::hidden('id', $item['id'] ?? '');
    $arr=[];

    foreach ($attribute as $attr) {

        $name=$attr['name'];
        $id=$attr['id'];
        $value=isset($newArr[$id])?$newArr[$id]:'';

         $arr[]=[
            'label'   => Form::label($name, ucfirst($name), $formLabelAttributes),
            'element'   => Form::text("attribute[$id]",$value , $form_tag),
        ];
    }



    $elements = [];
    $elements=array_merge($elements,$arr);
    array_push($elements,[
            'element'   => $inputHiddenID . Form::submit('Save', ['class' => 'btn btn-danger', 'name' => 'changeAttribute']),
            'type'      => 'btn-submit'
        ]);
@endphp

<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        @include('admin.templates.x_title', ['title' => 'Thay đổi thuộc tính'])
        <div class="x_content">
            {{ Form::open([
                'method'         => 'POST',
                'url'            => route("$controllerName/change-attribute"),
                'accept-charset' => 'UTF-8',
                'enctype'        => 'multipart/form-data',
                'class'          => 'form-horizontal form-label-left',
                'id'             => 'main-form2' ])  }}
            {!! FormTemplate::show($elements)  !!}
            {{ Form::close() }}
        </div>
    </div>
</div>
</div>
@section('script')
    <script>
        document.getElementById("main-form2").onkeypress = function(e) {
            var key = e.charCode || e.keyCode || 0;
            if (key == 13) {
                e.preventDefault();
            }
        }
    </script>
@stop