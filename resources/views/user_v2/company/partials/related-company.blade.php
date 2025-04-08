<div class="card  ts-rounded-12 overflow-hidden">
    <a class="card mb-0 shadow-none border-bottom rounded-0 bg-primary px-2 " href="#">
        <div class="card-body">
            <h4 class="text-white mb-0">Related Employ Guide</h4>
            {{-- <p class="fs-5 mb-0 text-muted">{{ $relatedcompany->small_description }}</p> --}}
        </div>
    </a>
    <div class="px-2" data-simplebar style="height: 290px;">
        @foreach ($relatedcompanies as $relatedcompany)
            <a class="card mb-0 shadow-none border-bottom rounded-0"
                href="{{ route('user.company.show', $relatedcompany->slug) }}">
                <div class="card-body">
                    <h4 class="mb-0">{{ $relatedcompany->name }}</h4>
                    {{-- <p class="fs-5 mb-0 text-muted">{{ $relatedcompany->small_description }}</p> --}}
                </div>
            </a>
        @endforeach
    </div>
</div>
