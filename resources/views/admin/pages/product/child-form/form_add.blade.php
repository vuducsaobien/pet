@extends('admin.main')

@php

    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttributes = config('zvn.template.form_label');
    $formLabelAttr = config('zvn.template.form_label');

    $inputHiddenID = Form::hidden('id', $item['id'] ?? '');

    $thumb = $item['thumb'] ?? '';
    $thumbElement = sprintf('
    <div class="input-group">
        <span class="input-group-btn">
            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
            <i class="fa fa-picture-o"></i> Choose
            </a>
        </span>
        <input id="thumbnail" class="form-control" type="text" name="thumb" value="%s">
    </div>
    <img id="holder" src="%s" style="margin-top:15px;max-height:100px;">
    ', $thumb, asset($thumb));

    $elements = [
        [
            'label'     => Form::label('name', 'Name', $formLabelAttr),
            'element'   => Form::text('name', $item['name'] ?? '', $formInputAttr)
        ],
        [
            'label'   => Form::label('slug', 'Slug', $formLabelAttr),
            'element' => Form::text('slug', $item['slug']??"",  $formInputAttr ),


        ],
       [
            'label'   => Form::label('category_id', 'Category', $formLabelAttr),
            'element' => Form::select('category_id', $itemsCategory, @$item['category_id'],  $formInputAttr)
        ],
/*        [
            'label'   => Form::label('thumb', 'thumb', $formLabelAttr),
            'element'   => Template::showFileManager($item['thumb'] ?? '')
        ],

*/        [
            'label'     => Form::label('price', 'Price (VND)', $formLabelAttr),
            'element'   => Form::text('price', $item['price'] ?? '', $formInputAttr)
        ],
        [
            'label'     => Form::label('', 'Thư viện hình ảnh', $formLabelAttributes),
            'element'   => '<div class="needsclick dropzone" id="document-dropzone"></div>',
        ],
         [
            'element'   => $inputHiddenID.Form::submit('Lưu', ['class' => 'btn btn-success']),
            'type'      => 'btn-submit'
        ]


    ];
@endphp
{{--@dd($elements)--}}
@section('content')
    @include('admin.templates.page_header', ['pageIndex' => false])
    @include('admin.templates.error')
    <div class="row">
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
    </div>
@endsection
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

            document.getElementById("main-form2").onkeypress = function(e) {
                var key = e.charCode || e.keyCode || 0;
                if (key == 13) {
                    e.preventDefault();
                }
            }

        })
    </script>
@stop

