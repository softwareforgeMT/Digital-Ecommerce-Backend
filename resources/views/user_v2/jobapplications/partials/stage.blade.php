    <div class="p-1 pb-4 pt-0">
        <div class="team-settings">
            <div class="row g-0">
                <div class="col">
                    <div class="btn nav-btn">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="user-chat-nav d-flex">
                    </div>

                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <div class="p-3 text-center1 mb-2">
        <h2 class="text-white mb-0">{{$stage->jobApplication->company?$stage->jobApplication->company->name:''}}</h2>
        <small class="text-white">{{ $stage->jobApplication->service_line }}, {{ $stage->jobApplication->location }}</small>
         {{-- <h3>{{$stage->jobApplication->service_line}}</h3> --}}
    </div>


<div class="d-flex gap-2 p-2 flex-wrap">
        <!-- Display Resume if available -->
    @if (!empty($stage->jobApplication->resume))
            <a download="true" class="btn btn-primary btn-sm" href="{!! Helpers::image($stage->jobApplication->resume, 'job/applicationsfiles/') !!}" target="_blank">
                <i class="ri-download-line me-1"></i> Download Resume
            </a>
    @endif

    <!-- Display Instruction Form if available -->
    @if (!empty($stage->jobApplication->instruction_form))
            <a download="true" class="btn btn-primary btn-sm" href="{!! Helpers::image($stage->jobApplication->instruction_form, 'job/applicationsfiles/') !!}" target="_blank">
                <i class="ri-download-line me-1"></i> Download Instruction Form
            </a>
    @endif

    <!-- Display Motivation Letter if available -->
    @if (!empty($stage->jobApplication->motivation_letter))
            <a download="true" class="btn btn-primary btn-sm" href="{!! Helpers::image($stage->jobApplication->motivation_letter, 'job/applicationsfiles/') !!}" target="_blank">
                <i class="ri-download-line me-1"></i> Download Motivation Letter
            </a>
    @endif

</div>

<div class="stage-content p-2">
    <h5><strong>Stage Name:</strong> {{ $stage->stage_name }}</h5>
    <p><strong>Status:</strong> {{ $stage->status }}</p>
    <p><strong>Last Date:</strong> {{ $stage->last_date }}</p>
    <p><strong>Details:</strong> {{ $stage->details }}</p>



    
    <!-- Display admin documents if available -->
    @if (!empty($stage->admin_docs) && count(json_decode($stage->admin_docs, true)) > 0)
        <h6><strong>Admin Documents:</strong></h6>
        <ul>
            @foreach (json_decode($stage->admin_docs, true) as $adminDoc)
                <li>
                    <a download="true" href="{!! Helpers::image($adminDoc, 'job/applicationsfiles/') !!}" target="_blank">{{ $adminDoc }}</a>
                </li>
            @endforeach
        </ul>
    @endif

    <!-- Allow users to upload files if user_docs_allowed is true -->
    @if ($stage->user_docs_required)
        <h6><strong>Upload Documents:</strong></h6>
        <form action="{{ route('user.jobapplicationstage.document') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="stage_id" value="{{ $stage->id }}">
            <div class="mb-3">
                <label for="user_docs" class="form-label">Select File:</label>
                <input type="file" class="form-control" id="user_docs" name="user_docs[]" required multiple>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    @endif

    @if (!empty($stage->user_docs) && count(json_decode($stage->user_docs, true)) > 0)
        <h6 class="mt-2"><strong>Your Uploaded Documents:</strong></h6>
        <ul>
            @foreach (json_decode($stage->user_docs, true) as $userDoc)
                <li>
                    <a download="true" href="{!! Helpers::image($userDoc, 'job/applicationsfiles/') !!}" target="_blank">{{ $userDoc }}</a>
                </li>
            @endforeach
        </ul>
    @endif


</div>


