@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttributes = config('zvn.template.form_input_tags');
    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttributes = config('zvn.template.form_label');
    $placementValue=['after'=>'Sau nội dung','before'=>'Sau tiêu đề'];
    
    $elements = [
        [
            'label'     => Form::label('facebook', 'Select app', $formLabelAttributes),
            'element'   => Form::checkbox('app[]','facebook',@in_array('facebook',@$item['app']))
                        .sprintf("  <img width=15 src='%s' /> facebook <br />",asset('images/logo/facebook.png'))
                        .Form::checkbox('app[]','twitter',@in_array('twitter',@$item['app']))
                        .sprintf("  <img width=25 src='%s' /> twitter <br />",asset('images/logo/twitter.png'))

                        .Form::checkbox('app[]','pinterest',@in_array('pinterest',@$item['app']))
                        .sprintf("  <img width=25 src='%s' /> pinterest",asset('images/logo/pinterest.png'))
        ],
        [
            'label'     => Form::label('page', 'Select page', $formLabelAttributes),
            'element'   => Form::checkbox('page[]','article',@in_array('article',@$item['page']))
                        ." Article <br />".
                        Form::checkbox('page[]','product',@in_array('product',@$item['page']))
                        ." Product <br />"

        ],

        [
            'label'   => Form::label('placement', 'Placement', $formLabelAttributes,@$item['placement']),
            'element' => Form::select('placement', $placementValue, @$item['placement'],  $formInputAttr)
        ],
        [
            'element'   => Form::submit('Lưu', ['class' => 'btn btn-success']),
            'type'      => 'btn-submit'
        ]
    ]
@endphp
@section('css')
@stop
<div class="x_panel">
    <div class="x_content">

        {!! Form::open([
            'url' => route("$controllerName/share_setting"),
            'method' => 'POST',
            'id' => 'main-form',
            'class' => 'form-horizontal form-label-left',
        ]) !!}
        {!! FormTemplate::show($elements) !!}
        {!! Form::close() !!}
    </div>
</div>

@section('script')
@stop