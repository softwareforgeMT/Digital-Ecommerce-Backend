@pushOnce('partial_css')
<style type="text/css">

.apt-box-shadow1{
    box-shadow: 0px 4px 10px -4px rgb(22 65 109 / 50%);

/*  box-shadow: 0px 0px 10px rgb(22 65 109 / 50%); ;*/
}
.pdf_file_images img{
    margin-bottom:10px;
}

.pdf__book{
    overflow-y: scroll;
    height: unset !important;
/*    min-height*/
}
 .pdf__page_number{
    background: #fcb95a;
    border-radius: 50%;
    color: white;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    bottom: 13px;
    left: 5px;
 }  
 .pdf__sidebar_pagination{

 } 
.pdf__sidebar_pagination .page-item:first-child .page-link {
    border-radius: 0px;
    margin-left: -1px;
}
.pdf__sidebar_pagination .page-item .page-link {
    border-radius: 0px;
    border:none;
    border-bottom:1px solid #e9ebec;
}
.locked-page {
    width: 100%;
    height: 900px; /* Adjust based on your needs */
    background: #e0e0e0; /* A light gray background */
    filter: blur(5px);
    margin-bottom: 10px;
}

.lock-icon {
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 100px;
    color: #8a9090;
}


</style>
@endpushOnce
 <div class="card-body border-0 w-100 pdf__book scrollspy-example" 
    style="max-height: 630px; " data-bs-spy="scroll" data-bs-target="#list-example" data-bs-offset="0" >
    <div class="pdf_file_images simplebar-content-wrapper11"  >
        @if(!isset($partial_pdf))
        <div class="pdf__loader text-center"> 
            <h3 class="text-muted">Loading ...</h3>
        </div>
        @endif
            @if ($quiz->pdf_images)
                @foreach (json_decode($quiz->pdf_images) as $key => $pdf_image)
                    <div id="page{{ $key + 1 }}" class="pdf-image-page position-relative" style="display:{{isset($partial_pdf)?'':'none'}};" data-page="{{ $key + 1 }}">
                        <!-- If user has no access, show the dummy locked div, otherwise show the image -->
                        @if(!$UserAccess && ($key + 1) > $quiz->free_demo_pages)
                            <div class="locked-page"></div>
                            <div class="lock-icon position-absolute">
                                <i class="ri-lock-fill ml-2"></i>
                            </div>
                        @else
                            <div class="position-absolute pdf__page_number" style="display:{{isset($partial_pdf)?'':'none'}};" >{{ $key+1 }}</div>
                            <img class="w-100 apt-box-shadow1 rounded-2" src="{{ Helpers::image($pdf_image, 'quiz/pdf_images/') }}">
                        @endif
                        {{-- <div class="position-absolute pdf__page_number" style="display:none;" >{{ $key+1 }}</div>
                        <img class="w-100" src="{{ Helpers::image($pdf_image, 'quiz/pdf_images/') }}"> --}}
                    </div>

                @endforeach
            @else
              <div class="text-center">
                  <h3>No Data Found</h3>
              </div>
            @endif

    </div>
</div>
