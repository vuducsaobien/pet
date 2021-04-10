$(document).ready(function() {
	
	if( controllerName == 'product' )
	{
    //     console.log('controllerName = ' + controllerName);
    //     console.log('product_id = ' + product_id);
    //     console.log('link_product_image = ' + link_product_image);
    //     console.log('link_product_get_image = ' + link_product_get_image);

        var uploadedDocumentMap = {};
        Dropzone.options.documentDropzone = {

            url               : link_product_image,
            addRemoveLinks    : true,
            dictDefaultMessage: '<i class="fa fa-3x fa-upload" aria-hidden="true"></i>',
            thumbnailWidth    : "250",
            thumbnailHeight   : "250",
            headers           : {
                'X-CSRF-TOKEN': token
            },
            success: function (file, response) {
                // console.log(file);
                // console.log(response);
                
                uploadedDocumentMap[file.name] = response
                file.nameImage = Dropzone.createElement("<input type='hidden'   name='nameImage[]' value='" + response + "'  />");
                file.previewElement.appendChild(file.nameImage);
            },
            error: function (file, response) {
                // console.log(file, response);

            },
            removedfile: function (file) {
                file.previewElement.remove()

                $('form').find('input[name="nameImage[]"][value="' + uploadedDocumentMap[file.name] + '"]').remove()
            },

            init: function (file) 
            {
                if ( product_id !== null ) {
                    mockFile = $.get( link_product_get_image , function (data) 
                    {

                        const myDropzone = Dropzone.forElement(".dropzone");
                        // console.log('data = ' + data);

                        $.each(JSON.parse((data)), function (i, mockFile) 
                        {
                            var name = mockFile.name;
                            var val = mockFile.alt ? mockFile.alt : "";
                            var url = link_product + '/' + name;
                            // console.log(mockFile);
                            // console.log('name = ' + name);
                            // console.log('url = ' + url);

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

                }

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
                items      : '.dz-preview',
                cursor     : 'move',
                opacity    : 0.5,
                containment: '.dropzone',
                distance   : 20,
                tolerance  : 'pointer'
            });



        })

	}

});