@pushOnce('partial_css')
<style type="text/css">
    .pdf__book {
    overflow: auto;
}
.pdf-image-page {
    transition: transform 0.3s ease;
}
.pdf__page_number{
    z-index:1;
}
</style>
@endpushOnce

<div class="col-xl-8 col-md-8 order-1 order-md-0" style="min-height: 650px">
     <div class="card ts-rounded-12 overflow-hidden">

        <div class="card-header border-0  w-100  ">

            <a href="{{ route('user.quiz.management.show', $quizbankmanagement->slug) }}"
                class="btn btn-soft-primary float-start d-flex justify-content-center align-items-center p-0  ">
                <i class=" ri-arrow-left-s-line lh-1 fs-4"></i>
            </a>
            <h4 class="fw-semibold text-center mb-0">
                {{ $quiz->title }}
                {{-- {{ $quiz->quiz_group }} --}}
            </h4>
        </div><!-- end card header -->
    </div>
    <div class="card ts-rounded-12 overflow-hidden">
        @include('user.quizmanagement.partials.pdfBased.pdf_pages')
    </div> 

</div>
<div class="col-xl-4 col-md-4 order-0 order-md-1">
    <div class="sidebar-wrapper">
        <div class="sidebar" id="stickySidebar">
            @if ($quiz->pdf_images)
            <div class="card ts-rounded-12 pt-0 overflow-hidden pdf__sidebar_pagination">
               
                <div class="card-header p-2 d-flex align-items-center justify-content-between">
                       
                        <div class="d-flex gap-2">
                            <button  id="zoomOutBtn" type="button" class="btn btn-soft-primary btn-icon waves-effect waves-light layout-rightside-btn "><i class="ri-zoom-out-line"></i></button>
                            <button  id="zoomInBtn" type="button" class="btn btn-soft-info btn-icon waves-effect waves-light layout-rightside-btn"><i class="ri-zoom-in-line"></i></button>
                        </div>
                        @if(!$UserAccess)
                            @if($canAccess)
                            <button type="button"  class="btn btn-warning  ts-rounded-06"  data-bs-toggle="modal" data-bs-target="#oneModalAllow">Activate Now</button>
                            @else
                            <a href="{{ route('user.quiz.management.show', ['quiz_management_slug' => $quizbankmanagement->slug, 'activate' => 1]) }}" class="btn btn-warning  ts-rounded-06">Active Now</a>
                            @endif
                        @endif

                       {{--  @if(auth()->user()->IsSuperUser())
                        <a target="_blank" href="{{ route('pdf.show', ['slug' => $quiz->slug]) }}" class="btn btn-warning  ts-rounded-06">Open pdf</a>
                        @endif --}}

                       
                </div>
               
                <div class="card-body"  style="max-height:350px" data-simplebar>
                   
                    <!-- Page Numbers (Generated Directly in HTML using Blade or similar) -->
                    <ul class="pagination d-block list-group " id="list-example" >
                        @foreach (json_decode($quiz->pdf_images) as $key => $pdf_image)

                     {{--   @if(!$UserAccess && $quiz->free_demo_pages<=$key+1)
                            <li class="page-item"><a class="page-link list-group-item list-group-item-action" data-pa  href="#page{{ $key + 1 }}">Page {{ $key + 1 }}</a></li>
                            @else
                            @endif --}}
  
                            <li class="page-item">
                                @if (!$UserAccess && ($key+1 > $quiz->free_demo_pages))
                                    <span class="page-link list-group-item list-group-item-action locked disabled">
                                        Page {{ $key + 1 }}
                                        <i class="ri-lock-fill ml-2"></i> <!-- locked icon -->
                                    </span>
                                @else
                                    <a class="page-link list-group-item list-group-item-action" data-pa href="#page{{ $key + 1 }}">
                                        Page {{ $key + 1 }}
                                    </a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                   
                    
                </div>
                <div class="card-footer">
                     <div class="d-flex justify-content-between">
                            <!-- Previous Button -->
                        <button id="prevPage" class="btn btn-primary" disabled>Previous</button>
                        <!-- Next Button -->
                        <button id="nextPage" class="btn btn-primary">Next</button>
                    </div>
                </div>

            </div>
            @endif
        </div>
    </div>
</div>

@pushOnce('partial_script') 
<script type="text/javascript">
    $(document).ready(function() {
        var pageNumber = 1;
        const totalPages = $('.pagination .page-item').length;
        $('.pdf__loader').hide();
        $('.pdf__page_number, .pdf-image-page').show();
        function updateNavButtons() {
            // Disable "Previous" button if on the first page
            $('#prevPage').prop('disabled', pageNumber === 1);

            // Disable "Next" button if on the last page
            $('#nextPage').prop('disabled', pageNumber === totalPages);
        }

        function scrollToPage(targetHref) {
            const targetElement = $(targetHref);
            
            if (targetElement.length) {
                const container = $('.pdf__book');
                const containerScrollTop = container.scrollTop();
                const elementOffsetTop = targetElement.position().top;

                // New scroll position is the current scroll position of the container plus the position of the target element
                const newScrollTop = containerScrollTop + elementOffsetTop;

                // container.animate({
                //     scrollTop: newScrollTop
                // }, 800);
                  // Stop any existing animations before starting a new one
                container.stop(true, true).animate({
                    scrollTop: newScrollTop
                }, 800);
            
                
                // Extracting the page number from the href attribute
                pageNumber = parseInt(targetHref.replace('#page', ''));

                // Update navigation buttons based on the current page
                updateNavButtons();
            } else {
                console.warn("Target element not found:", targetHref);
            }
        }

        $('.pagination .page-link').on('click', function(event) {
            event.preventDefault();
            scrollToPage($(this).attr('href'));
        });

        $('#prevPage').on('click', function() {
            if (pageNumber > 1) {
                scrollToPage(`#page${pageNumber - 1}`);
            }
        });

        $('#nextPage').on('click', function() {
            if (pageNumber < totalPages) {
                scrollToPage(`#page${pageNumber + 1}`);
            }
        });

        // Initialize the navigation buttons state
        updateNavButtons();
    });


    $(document).ready(function() {
        // Initial zoom level
        let zoomLevel = 1;

        // Maximum and minimum zoom levels (adjust as necessary)
        const maxZoomLevel = 2;
        const minZoomLevel = 1;

        // Function to apply the zoom
        function applyZoom() {
            $('.pdf-image-page').css({
                'transform': 'scale(' + zoomLevel + ')',
                'transform-origin': 'left top'
            });
            $('.pdf-image-page').css('margin-bottom', ((zoomLevel - 1) * $('.pdf-image-page').height()) + 'px');
        }

        // Zoom in function
        $('#zoomInBtn').click(function() {
            if (zoomLevel < maxZoomLevel) {
                zoomLevel += 0.1;  // Increase the zoom level by 0.1 (10%)
                applyZoom();
            }
        });

        // Zoom out function
        $('#zoomOutBtn').click(function() {
            if (zoomLevel > minZoomLevel) {
                zoomLevel -= 0.1;  // Decrease the zoom level by 0.1 (10%)
                applyZoom();
            }
        });
    });


</script>
@endPushOnce
