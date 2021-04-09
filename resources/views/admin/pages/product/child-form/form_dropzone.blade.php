@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttributes = config('zvn.template.form_input');
    $formLabelAttributes = config('zvn.template.form_label');

    

    $inputHiddenID = Form::hidden('id', $item['id'] ?? '');
    $arr=[];

    $elements = [

        [
            'label'     => Form::label('', '', $formLabelAttributes),
            'element'   => '<div class="needsclick dropzone" id="document-dropzone"></div>',
            'type'=>'full-12'
        ],

    ];
    $elements=array_merge($elements,$arr);
    array_push($elements,[
            'element'   => $inputHiddenID . Form::submit('Save', ['class' => 'btn btn-danger','id'=>'submit', 'name' => 'changeDropzone']),
            'type'      => 'btn-submit'
        ]);
@endphp
{{--@dd($elements)--}}
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            @include('admin.templates.x_title', ['title' => 'Thư viện hình ảnh'])
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
</div>

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>

        var uploadedDocumentMap = {};
        Dropzone.options.documentDropzone = {

            url: '{{ route('product/image') }}',
            addRemoveLinks: true,
            dictDefaultMessage: '<i class="fa fa-3x fa-upload" aria-hidden="true"></i>',
            thumbnailWidth:"250",
            thumbnailHeight:"250",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                console.log(response);
                
                uploadedDocumentMap[file.name] = response
                file.nameImage = Dropzone.createElement("<input type='hidden'   name='nameImage[]' value='" + response + "'  />");
                file.previewElement.appendChild(file.nameImage);
            },
            error: function (file, response) {
                console.log(file, response);

            },
            removedfile: function (file) {
                file.previewElement.remove()

                $('form').find('input[name="nameImage[]"][value="' + uploadedDocumentMap[file.name] + '"]').remove()
            },
            init: function (file) {

                @isset($item['id'])

                    mockFile = $.get('{{route('product/get-image',$item['id'])}}', function (data) {

                    const myDropzone = Dropzone.forElement(".dropzone");


                    $.each(JSON.parse((data)), function (i, mockFile) {
                        var name = mockFile.name;
                        var val = mockFile.alt ? mockFile.alt : "";
                        var url = '{{ asset("/images/product") }}' + '/' + name

                        myDropzone.options.addedfile.call(myDropzone, mockFile);
                        myDropzone.options.thumbnail.call(myDropzone, mockFile, url);
                        mockFile.previewElement.classList.add('dz-success');
                        mockFile.previewElement.classList.add('dz-complete');
                        mockFile.alt = Dropzone.createElement("<input type='text'  name='alt[]' value='" + val + "'  />");
                        mockFile.previewElement.appendChild(mockFile.alt);
                        mockFile.nameImage = Dropzone.createElement("<input type='hidden'   name='nameImage[]' value='" + name + "'  />");
                        mockFile.previewElement.appendChild(mockFile.nameImage);
                    });


                });
                @endisset

            this.on("addedfile", function (file) {
                caption = file.caption ? file.caption : "";
                file._captionBox = Dropzone.createElement("<input type='text'  id='" + file.filename + "' name='alt[]' value='" + caption + "'  />");
                file.previewElement.appendChild(file._captionBox);
            });
            }

        }

        /*================================= di chuyen hinh anh su dung jquery ui sortable =============================*/
        $(function () {
            $(".dropzone").sortable({
                items: '.dz-preview',
                cursor: 'move',
                opacity: 0.5,
                containment: '.dropzone',
                distance: 20,
                tolerance: 'pointer'
            });



        })
</script>
@stop