<div class="mb-4">
    <div id="employGuide{{ $data->slug }}" class="position-relative card-animate">
       {{--  <div class="fs-1 ts-heart-container-wrapper position-absolute z-10 pt-2 ps-2 mt-4 ms-4 ">
            @include('includes.favorite', ['favdata' => $data, 'type' => 'Company'])
        </div> --}}
        <a href="{{ route('front.company.show', $data->slug) }}">
            <div class="ratio ratio-1x1">
                <div
                    class="card gap-2 p-3 py-2 d-flex justify-content-center align-items-center shadow-lg ts-rounded-12 text-center apt-box-shadow">
                    <img class=" w-100 w-sm-3522 mb-3" src="{!! Helpers::image($data->logo, 'company/logo/') !!}" alt="...">
                     
                   {{--  <div>
                        <h4 class="mb-0">{{ $data->name }}</h4>
                        <p class="mb-0">{{ $data->small_description }}</p>
                    </div> --}}
                </div>
            </div>
        </a>
    </div>
</div>