
@pushOnce('partial_css')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

{{-- <style type="text/css">
    .dropzone .dz-preview .dz-image img{
        width:120px;
        height:120px;
    }

</style> --}}

<style type="text/css">
  .dropzone .dz-preview .dz-image{
    width:100% !important;
  }
  .dropzone .dz-preview .dz-image img {
      width: 100% !important;
      height: 100% !important;
  }
</style>
@endPushOnce

    <div class="dropzone" style="min-height: 150px;" id="document-dropzone">
        <div class="dz-message needsclick">
            <div class="mb-1">
                <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
            </div>

            <h5>Drop files here or click to upload.</h5>
        </div>
    </div>

@pushOnce('partial_script')    
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

    <script>
      // function dropzoneInit(){
      //    alert(2);
      //     var uploadedDocumentMap = {}
      //     Dropzone.options.documentDropzone = {
      //       url: '{{route('dropzone.storeMedia')}}',
      //       maxFilesize: 200, // MB
      //       addRemoveLinks: true,
      //       acceptedFiles: '{{config('fileformats.galleryimages')}}' + ',{{config('fileformats.galleryvideos')}}',
      //       headers: {
      //         'X-CSRF-TOKEN': "{{ csrf_token() }}"
      //       },
      //       success: function (file, response) {
      //         $('form').append('<input type="hidden" name="gallery[]" class="galimages" value="' + response.name + '">')
      //         uploadedDocumentMap[file.name] = response.name
      //       },
            
      //       removedfile: function (file) {
      //         file.previewElement.remove()
      //         var name = ''
      //         if (typeof file.file_name !== 'undefined') {
      //           name = file.file_name
      //         } else {
      //           name = uploadedDocumentMap[file.name]        
      //         }
      //         $('form').find('input[class="galimages"][value="' + name + '"]').remove()
      //       },
      //       init: function () {
      //       @if(isset($data) && $data->gallery)           
      //           var files = {!! $data->gallery !!};
      //           var theis=this;
      //           var videoFormats = {!! json_encode(config('fileformats.video')) !!};
      //           files.forEach(function(file, index) {
      //               var filename= "{{ url('/') }}"+'/assets/dynamic/images/quiz/gallery/'+file;
      //               var fileExtension = filename.split('.').pop().toLowerCase();
      //               var isVideo = videoFormats.indexOf(fileExtension) >= 0;
      //               var thumbnailImage = isVideo ? "{{ asset('/images/video.png') }}" : filename;
      //               var filedata = { name:filename, file_name:file, size: 12345 };
      //               theis.options.addedfile.call(theis, filedata);
      //               theis.options.thumbnail.call(theis, filedata, thumbnailImage);
      //               filedata.previewElement.classList.add('dz-complete');
      //               $('form').append('<input type="hidden" name="old[]" class="galimages" value="' +file+ '">');
      //           });
      //       @endif
      //       },
      //     }
      // }  
    function initializeDropzone(element) {
      if (element.length) {
        var uploadedDocumentMap = {};
        var dropzone = new Dropzone(element.get(0), {
          url: '{{route('dropzone.storeMedia')}}',
          maxFilesize: 200, // MB
          addRemoveLinks: true,
          acceptedFiles:  '{{config('fileformats.galleryimages')}}' + ',{{config('fileformats.galleryvideos')}}',
          headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
          },
          success: function (file, response) {
            $('form').append('<input type="hidden" name="gallery[]" class="galimages" value="' + response.name + '">')
            uploadedDocumentMap[file.name] = response.name
          },
          removedfile: function (file) {
            file.previewElement.remove()
            var name = ''
            if (typeof file.file_name !== 'undefined') {
              name = file.file_name
            } else {
              name = uploadedDocumentMap[file.name]        
            }
            $('form').find('input[class="galimages"][value="' + name + '"]').remove()
          },
          init: function () {
            // initialize any existing files
            @if(isset($data) && $data->gallery)           
              var files = {!! $data->gallery !!};
              var theis=this;
              var videoFormats = {!! json_encode(config('fileformats.video')) !!};
              files.forEach(function(file, index) {
                var filename= "{{ url('/') }}"+'/assets/dynamic/images/quiz/gallery/'+file;
                var fileExtension = filename.split('.').pop().toLowerCase();
                var isVideo = videoFormats.indexOf(fileExtension) >= 0;
                var thumbnailImage = isVideo ? "{{ asset('/images/video.png') }}" : filename;
                var filedata = { name:filename, file_name:file, size: 12345 };
                theis.options.addedfile.call(theis, filedata);
                theis.options.thumbnail.call(theis, filedata, thumbnailImage);
                filedata.previewElement.classList.add('dz-complete');
                $('form').append('<input type="hidden" name="old[]" class="galimages" value="' +file+ '">');
              });
            @endif
          }
        });
      }
    }
    // Call the function to initialize Dropzone when the page is loaded
    initializeDropzone($('#document-dropzone'));
     

    </script>
    
@endPushOnce