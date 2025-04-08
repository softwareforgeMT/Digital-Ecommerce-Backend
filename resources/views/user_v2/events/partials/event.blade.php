  <div class="mb-4">
        <div class="card team__cards  ts-card--career h-90 ts-rounded-12 overflow-hidden ">

            <div class="card-img-top-container-wrapper">
                <div class="card-img-top-container">
                    <img class="card-img-top img-fluid h-100 object-cover"
                        src="{{ Helpers::image($data->photo, 'events/') }}" alt="Card image cap">
                </div>
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
                <div>
                    <h3 class="fs-3 text-black fw-bold mb-2" style="min-height: 54px">{{ $data->name }}</h3>
                    <p class="card-text text-black mb-3 ">
                        {{ Carbon\Carbon::parse($data->event_date_time)->format('F d, h:i A') }} <br />
                        Online Conference 
                        <br>
                        Event Type: {{$data->event_type}}
                        {{-- {{ $data->meeting_id }} --}}
                    </p>
                </div>

                <div class="text-center">


                    <div class="d-flex justify-content-between align-items-center">
                        @if ($data->CareerEventRegistration()->count() > 0)
                            <div class="avatar-group justify-content-center">
                                @foreach ($data->CareerEventRegistration->take(4) as $registration)
                                    <div class="avatar-group-item">
                                        <a href="javascript: void(0);" class="d-inline-block"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                            data-bs-original-title="Stine Nielsen">
                                            <img src="{!! Helpers::image($registration->user ? $registration->user->photo : '', 'user/avatar/', 'user.png') !!}" alt=""
                                                class="rounded-circle avatar-xxs">
                                        </a>
                                    </div>
                                @endforeach
                                @if ($data->CareerEventRegistration()->count() > 4)
                                    <div class="avatar-group-item">
                                        <a href="javascript: void(0);">
                                            <div class="avatar-xxs">
                                                <span
                                                    class="avatar-title rounded-circle bg-info text-white">
                                                    {{ $data->CareerEventRegistration()->count() - 4 }}
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        @endif
                        <div class="ms-auto">
                            <a href="{{ route('user.events.show', $data->slug) }}"
                                class="btn btn-outline-secondary waves-effect waves-light  ts-rounded-06">Book Now
                                <i class="ri-arrow-right-line align-middle ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>