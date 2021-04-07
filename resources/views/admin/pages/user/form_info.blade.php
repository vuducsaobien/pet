
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label');

    $statusValue      = ['default' => 'Select status', 'active' => config('zvn.template.status.active.name'), 'inactive' => config('zvn.template.status.inactive.name')];

    $inputHiddenID    = Form::hidden('id', $item['id']);
    $inputHiddenAvatar = Form::hidden('avatar_current', $item['thumb']);

    $elements = [
        [
            'label'   => Form::label('username', 'UserName', $formLabelAttr),
            'element' => Form::text('username', $item['username'], $formInputAttr )
        ],[
            'label'   => Form::label('email', 'Email', $formLabelAttr),
            'element' => Form::text('email', $item['email'],  $formInputAttr )
        ],[
            'label'   => Form::label('fullname', 'Fullname', $formLabelAttr),
            'element' => Form::text('fullname', $item['fullname'],  $formInputAttr )
        ],[
            'label'   => Form::label('status', 'Status', $formLabelAttr),
            'element' => Form::select('status', $statusValue, $item['status'], $formInputAttr)
        ],[
            'label'   => Form::label('thumb', 'thumb', $formLabelAttr),
            'element'   => Template::showFileManager($item['thumb'] ?? '')

        ],[
            'element' => $inputHiddenID . $inputHiddenAvatar .  Form::submit('Save', ['class'=>'btn btn-success', 'name' => 'taskEditInfo']),
            'type'    => "btn-submit"
        ]
    ];
@endphp


<div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
        @include('admin.templates.x_title', ['title' => 'Form Edit Info'])
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
