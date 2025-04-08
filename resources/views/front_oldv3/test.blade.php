<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secure PDF Viewer with Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous"
        referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf_viewer.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf_viewer.js"></script>
<style type="text/css">
    .fixed-top {
    z-index: 1030;
}

.input-group {
    max-width: 400px;
}
.page{
    margin-bottom:10px !important;
}
.border-none{
  border:none;
}

</style>


</head>
<body style="background-color:grey">
<div class="container-fluid">
    <!-- Search box -->
<!--     <div class="row justify-content-center ">
        <div class="col-md-8" >
            <div class="input-group mb-3">
                <input id="searchBox" type="text" class="form-control" placeholder="Search..." oninput="searchDocument()">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" onclick="searchDocument()">Search</button>
                    <button class="btn btn-outline-secondary" onclick="searchNext()">Next</button>
                    <button class="btn btn-outline-secondary" onclick="searchPrev()">Previous</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
                <span id="zoomValue">100%</span>
                <input type="range" id="zoom" name="cowbell" min="100" max="150" value="100" step="10" >
        </div>
    </div>

 -->


<div class="fixed-top border-bottom" style="background-color: #375a78;">
    <div class="container">
        <div class="row align-items-center py-2">

            <!-- Search Controls -->
            <div class="col-md-6">
                <div class="input-group">
                    <input id="searchBox" type="text" class="form-control" placeholder="Search..." oninput="searchDocument()">
                    {{-- <div class="input-group-append">
                        <button class="btn btn-outline-secondary" onclick="searchDocument()">Search</button>
                        <button class="btn btn-outline-secondary" onclick="searchNext()">Next</button>
                        <button class="btn btn-outline-secondary" onclick="searchPrev()">Previous</button>
                    </div> --}}
                </div>
            </div>

           

            <!-- Pagination Controls -->
            <div class="col-md-3 ">
                <button id="previous" class="border-none"  onclick="goToPreviousPage()"><i class="fas fa-arrow-alt-circle-left"></i></button>
                <span id="currentPage">1</span> of <span id="totalPages">1</span>
                <button id="next" class="border-none" onclick="goToNextPage()"><i class="fas fa-arrow-alt-circle-right"></i></button>
            </div>

             <!-- Zoom Controls -->
            <div class="col-md-3 text-end">
                <span id="zoomValue">100%</span>
                <input type="range" id="zoom" name="zoom" min="100" max="180" value="100" step="20" >
            </div>

        </div>
    </div>
</div>

<!-- Rest of your content goes here -->



    <!-- PDF Viewer -->
    <div class="row justify-content-center m-auto mt-5">
        <div class="pdf_content col-md-12">
            <div style="position: relative;"> <!-- This div will be the relative container -->
                <div id="viewerContainer" style="width: 100%;  position: absolute;">
                    <div id="viewer" class="pdfViewer"></div>
                </div>
            </div>
        </div>
    </div>

</div>



<script>
     pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';
    // Initialize PDFJS
    const DEFAULT_URL = '{{ route('serve.pdf', ['token' => $token]) }}'; 
const DEFAULT_SCALE = 1;
var resolution = 5; // Increase this value for better clarity

const container = document.getElementById('viewerContainer');
const eventBus = new pdfjsViewer.EventBus();

const pdfLinkService = new pdfjsViewer.PDFLinkService({
    eventBus: eventBus
});

const pdfFindController = new pdfjsViewer.PDFFindController({
    linkService: pdfLinkService,
    eventBus: eventBus
});

const pdfViewer = new pdfjsViewer.PDFViewer({
    container: container,
    eventBus: eventBus,
    linkService: pdfLinkService,
    findController: pdfFindController,
    renderer: 'canvas',
    enhanceTextSelection: true,
     //defaultZoomValue: DEFAULT_SCALE, // This sets the default zoom level
});



pdfLinkService.setViewer(pdfViewer);
pdfFindController.setDocument(null);
pdfViewer.setDocument(null);
pdfLinkService.setDocument(null, null);



pdfjsLib.getDocument(DEFAULT_URL).promise.then((pdfDocument) => {
    pdfViewer.setDocument(pdfDocument);
    pdfFindController.setDocument(pdfDocument);
    pdfLinkService.setDocument(pdfDocument, null);

    // Display total number of pages
    document.getElementById('totalPages').textContent = pdfDocument.numPages;

    // Update current page display when the page changes
    pdfViewer.eventBus.on('pagechanging', (evt) => {
        document.getElementById('currentPage').textContent = evt.pageNumber;
    });

    pdfDocument.getPage(1).then(function(page) {
        // Render at a higher scale for quality
        var viewport = page.getViewport({ scale: DEFAULT_SCALE });
        pdfViewer.currentScaleValue = DEFAULT_SCALE; // Set the scale
        
    });
});

// currentPDF.file.getPage(currentPDF.currentPage).then((page) => {
//         var context = viewer.getContext('2d');
//         var viewport = page.getViewport({ scale: currentPDF.zoom, });
//         viewer.height = viewport.height;
//         viewer.width = viewport.width;

//         var renderContext = {
//             canvasContext: context,
//             viewport: viewport
//         };
//         page.render(renderContext);
//     });


function searchDocument() {
    const query = document.getElementById('searchBox').value;
    pdfFindController.executeCommand('find', {
        caseSensitive: false,
        findPrevious: undefined,
        highlightAll: true,
        phraseSearch: true,
        query: query
    });
}

function searchNext() {
    const query = document.getElementById('searchBox').value;
    pdfFindController.executeCommand('findagain', { query: query, findPrevious: false });
}

function searchPrev() {
    const query = document.getElementById('searchBox').value;
    pdfFindController.executeCommand('findagain', { query: query, findPrevious: true });
}


eventBus.on('updatefindcontrolstate', (event) => {
    if (event.source === pdfFindController && event.state.findPrevious === undefined) {
        console.log(event);
        //scrollToSearchResult(event.state);
    }
});

// Scroll to the location of the found term
eventBus.on('updatefindmatchescount', ({ matchesCount }) => {
    console.log(matchesCount);
    if (matchesCount.matchFound) {
        
    }
});

function scrollToSearchResult(state) {
    console.log(state);
    if (state.matchesCount > 0) {
        const pageIndex = state.selected.pageIdx;
        const matchIndex = state.selected.matchIdx;

        // Delay scrolling to allow text layer rendering
        setTimeout(() => {
            const pageView = pdfViewer.getPageView(pageIndex);
            if (pageView && pageView.textLayer) {
                const textLayer = pageView.textLayer;
                const matchDiv = textLayer.textDivs[matchIndex];
                if (matchDiv) {
                    matchDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }
        }, 200); // Adjust timeout as needed
    }
}


document.getElementById('zoom').addEventListener('input', function() {
    // Get the zoom value from the slider
    var zoomValue = this.value;
    console.log(zoomValue/100);
    // Update the PDF viewer's scale
    pdfViewer.currentScaleValue = zoomValue / 100;

    // Update the display of the zoom value
    document.getElementById('zoomValue').textContent = zoomValue + '%';
});

function goToPage(pageNumber) {
    if (pageNumber >= 1 && pageNumber <= pdfViewer.pagesCount) {
        pdfViewer.currentPageNumber = pageNumber; // set the current page
        // Scroll to the page
        document.getElementById('currentPage').textContent = pdfViewer.currentPageNumber;
        var pageView = pdfViewer.getPageView(pageNumber - 1);
        if (pageView) {
            pageView.div.scrollIntoView({ behavior: "smooth" });
        }
    }
     
}

function goToPreviousPage() {
    goToPage(pdfViewer.currentPageNumber - 1);
}

function goToNextPage() {
    goToPage(pdfViewer.currentPageNumber + 1);
}





</script>

</body>
</html>
