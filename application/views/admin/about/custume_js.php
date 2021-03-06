<script>
	function readURL(input) {
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();

	    reader.onload = function(e) {
	      $('#blah').attr('src', e.target.result);
	    }

	    reader.readAsDataURL(input.files[0]); // convert to base64 string
	  }
	}

	$("#imgInp").change(function() {
	  readURL(this);
	});
</script>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

<script src="<?php echo $this->config->item('admin_source'); ?>plugins/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('admin_source'); ?>plugins/tinymce/tinymce.min.js"></script>

<script>
    $(document).ready(function () {
        if($("#elm1").length > 0){
            tinymce.init({
                selector: "textarea#elm1",
                theme: "modern",
                entity_encoding : "raw",
                height:300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor",
                    "image code"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
                image_title: true,
                images_upload_url :'tiny_upload',
                automatic_uploads: true,
                file_picker_types: 'image',
                images_upload_handler : function(blobInfo, success, failure) {
            			var xhr, formData;
            			xhr = new XMLHttpRequest();
            			xhr.withCredentials = true;
            			xhr.open('GET', 'tiny_upload');

            			xhr.onload = function() {
            				var json;

            				if (xhr.status != 200) {
            					failure('HTTP Error: ' + xhr.status);
            					return;
            				}

            				json = JSON.parse(xhr.responseText);

            				if (!json || typeof json.file_path != 'string') {
            					failure('Invalid JSON: ' + xhr.responseText);
            					return;
            				}

            				success(json.file_path);
            			};

            			formData = new FormData();
            			formData.append('file', blobInfo.blob(), blobInfo.filename());

            			xhr.send(formData);
            		},
                file_picker_callback: function(cb, value, meta) {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');

                    input.onchange = function() {
                      var file = this.files[0];
                      var reader = new FileReader();

                      reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        // call the callback and populate the Title field with the file name
                        cb(blobInfo.blobUri(), { title: file.name });
                      };
                      reader.readAsDataURL(file);
                    };

                    input.click();
                  },
                 style_formats: [
                    {title: 'Bold text', inline: 'b'},
                    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                    {title: 'Example 1', inline: 'span', classes: 'example1'},
                    {title: 'Example 2', inline: 'span', classes: 'example2'},
                    {title: 'Table styles'},
                    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                ]

            });
        }
    });
</script>

<script>
    $(document).ready(function () {
        if($("#elm2").length > 0){
            tinymce.init({
                selector: "textarea#elm2",
                theme: "modern",
                entity_encoding : "raw",
                height:300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor",
                    "image code"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
                image_title: true,
                images_upload_url :'tiny_upload',
                automatic_uploads: true,
                file_picker_types: 'image',
                images_upload_handler : function(blobInfo, success, failure) {
            			var xhr, formData;
            			xhr = new XMLHttpRequest();
            			xhr.withCredentials = true;
            			xhr.open('GET', 'tiny_upload');

            			xhr.onload = function() {
            				var json;

            				if (xhr.status != 200) {
            					failure('HTTP Error: ' + xhr.status);
            					return;
            				}

            				json = JSON.parse(xhr.responseText);

            				if (!json || typeof json.file_path != 'string') {
            					failure('Invalid JSON: ' + xhr.responseText);
            					return;
            				}

            				success(json.file_path);
            			};

            			formData = new FormData();
            			formData.append('file', blobInfo.blob(), blobInfo.filename());

            			xhr.send(formData);
            		},
                file_picker_callback: function(cb, value, meta) {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');

                    input.onchange = function() {
                      var file = this.files[0];
                      var reader = new FileReader();

                      reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        // call the callback and populate the Title field with the file name
                        cb(blobInfo.blobUri(), { title: file.name });
                      };
                      reader.readAsDataURL(file);
                    };

                    input.click();
                  },
                 style_formats: [
                    {title: 'Bold text', inline: 'b'},
                    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                    {title: 'Example 1', inline: 'span', classes: 'example1'},
                    {title: 'Example 2', inline: 'span', classes: 'example2'},
                    {title: 'Table styles'},
                    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                ]

            });
        }
    });
</script>
