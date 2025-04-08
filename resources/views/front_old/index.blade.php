@extends('front.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/front/pages/index.min.css') }}" />
@endsection
@section('content')
    <!-- ********************************[ HERO SECTION  ]************************************* -->
    <div class="container ts-sec-mb-lg pt-08">
        <div class="row w-100 mx-0 row-cols-lg-2">
            <div class="ts-font-poppins mb-lg-0 mb-08">
                <h1 class="fw-bold ts-heading-01 mb-05">
                    Connecting Employs <span>with Employers</span>
                </h1>
                <img class="mb-08" loading="lazy" width="300" src="{{ asset('assets/images/front/img/arrow-line.svg') }}"
                    alt="..." />
                <p class="ts-desc-03 ts-text-Rhythm mb-07">
                    Ap Team är en modern digital plattform byggd av e-handlare för
                    e-handlare med uppdraget att hjälpa entreprenörer att starta och
                    växa framgångsrika företag.
                </p>

                <div class="d-flex justify-content-start">
                    <a href="#" class="ts-btn-05 rounded-3">Get Started</a>
                </div>
            </div>
            <div>
                <img class="w-100" loading="lazy" src="{{ asset('assets/images/front/img/hero.jpg') }}" alt="..." />
            </div>
        </div>
    </div>
    <!-- ********************************[   ]************************************* -->
    <div class="container mb-lg-14 mb-10">
        <div class="text-center ts-font-poppins mx-w-662 mx-auto ts-sec-mb-sm">
            <h1 class="fw-bold ts-heading-03 mb-lg-10 mb-07">
                Ap Steps <span>for process</span>
            </h1>
            <p class="ts-desc-04 ts-text-Rhythm">
                Ap Team är en modulär och dynamisk plattform med automatiserade
                processer för smidigare lärningssätt. Med hjälp av vår produkt vill vi
                att vem som helst ska kunna driva eget företag.
            </p>
        </div>
        <div class="ts-find-card-group">
            <div class="ts-jobs-card">
                <div class="ts-text-fff mb-3">
                    <h1 class="text-white ts-font-poppins fw-semibold ts-heading-05 mb-3">
                        Finding your dream job
                    </h1>
                    <p class="ts-font-manrope ts-desc-04">
                        Finding the information or the companies Information here help you
                        apply the job.
                    </p>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="#" class="ts-btn-05" data-bs-toggle="modal" data-bs-target="#exampleModal">View
                        Details</a>
                    <!-- Modal -->

                    <div class="modal modal-xl fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-modal="true" role="dialog">
                        <div class="modal-dialog ts-modal-dialog">
                            <div class="ts-modal ts-bg-fff position-relative">
                                <button class="btn ts-modal-btn-close p-0" data-bs-dismiss="modal">
                                    <img width="25" src="{{ URL::asset('assets/images/front/icon/close-circle.svg') }}"
                                        alt="..." />
                                </button>
                                <button
                                    class="btn btn-secondary ts-btn-modal-controller ts-btn-modal-controller__left opacity-25"
                                    data-bs-target="#exampleModal4" data-bs-toggle="modal" data-bs-dismiss="modal" disabled>
                                    &lt;
                                </button>
                                <button class="btn btn-secondary ts-btn-modal-controller ts-btn-modal-controller__right"
                                    data-bs-target="#exampleModal2" data-bs-toggle="modal" data-bs-dismiss="modal">
                                    &gt;
                                </button>
                                <div class="row row-cols-xl-2 w-100 mx-0">
                                    <div class="ts-modal-content ts-text-Rhythm ts-font-poppins ts-desc-04">
                                        <h1 class="mb-lg-08 mb-06 ts-modal-title ts-font-poppins fw-bold ts-heading-05">
                                            <span class="ts-modal-number me-lg-4 me-2">1</span>
                                            Know your Dream Company
                                        </h1>
                                        <p class="mb-lg-09 mb-07">
                                            Once chosen the targeted company , you are required to
                                            prepare the following documents.
                                        </p>
                                        <ul class="mb-lg-07 mb-06">
                                            <li>Resume</li>
                                            <li>Cover Letter</li>
                                            <li>Motivation Letter</li>
                                        </ul>
                                        <p class="mb-lg-06 mb-04">Become our Member to</p>
                                        <p class="mb-lg-11 mb-08">
                                            Get free samples and templates for these documents.
                                        </p>
                                        <div class="d-flex justify-content-end">
                                            <a href="./login.html" class="ts-btn-06">Login</a>
                                        </div>
                                    </div>

                                    <div class="ts-modal-video">
                                        <div class="ratio ratio-16x9">
                                            <iframe class="w-100" src="https://www.youtube.com/embed/TjhFu5VUv5I"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ts-Application-card">
                <div class="ts-text-fff">
                    <h1 class="text-white ts-font-poppins fw-semibold ts-heading-05 mb-3">
                        Preparing for Application
                    </h1>
                    <p class="ts-font-manrope ts-desc-04">
                        Preparing the document for the job application such as CV , resume
                        and motivation letter
                    </p>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="#" class="ts-btn-05" data-bs-toggle="modal" data-bs-target="#exampleModal2">View
                        Details</a>
                    <!-- Modal -->

                    <div class="modal modal-xl fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-modal="true" role="dialog">
                        <div class="modal-dialog ts-modal-dialog">
                            <div class="ts-modal ts-bg-fff position-relative">
                                <button class="btn ts-modal-btn-close p-0" data-bs-dismiss="modal">
                                    <img width="25" src="{{ asset('assets/images/front/icon/close-circle.svg') }}"
                                        alt="..." />
                                </button>
                                <button class="btn btn-secondary ts-btn-modal-controller ts-btn-modal-controller__left"
                                    data-bs-target="#exampleModal" data-bs-toggle="modal" data-bs-dismiss="modal">
                                    &lt;
                                </button>
                                <button class="btn btn-secondary ts-btn-modal-controller ts-btn-modal-controller__right"
                                    data-bs-target="#exampleModal3" data-bs-toggle="modal" data-bs-dismiss="modal">
                                    &gt;
                                </button>
                                <div class="row row-cols-xl-2 w-100 mx-0">
                                    <div class="ts-modal-content ts-text-Rhythm ts-font-poppins ts-desc-04">
                                        <h1 class="mb-lg-08 mb-06 ts-modal-title ts-font-poppins fw-bold ts-heading-05">
                                            <span class="ts-modal-number me-lg-4 me-2">2</span> Know
                                            your Dream Company
                                        </h1>
                                        <p class="mb-06">
                                            Once completed/passed the application, the first stage
                                            of online assessment often refer to
                                        </p>
                                        <ul class="mb-07">
                                            <li>Immersive Online Assessment</li>
                                            <li>Game-based Online Assessment</li>
                                        </ul>
                                        <p class="mb-lg-06 mb-04">Become our Member to</p>
                                        <ul class="mb-07">
                                            <li>
                                                Practice up-to-date real quiz banks for your targeted
                                                companies ( SHL ; e-cut;)
                                            </li>
                                            <li>
                                                Practice with simulated game system (phymetrics game ,
                                                Plum Discovery, Peak Performance, etc; )
                                            </li>
                                        </ul>
                                        <div class="d-flex justify-content-end">
                                            <a href="./login.html" class="ts-btn-06">Login</a>
                                        </div>
                                    </div>

                                    <div class="ts-modal-video">
                                        <div class="ratio ratio-16x9">
                                            <iframe class="w-100" src="https://www.youtube.com/embed/TjhFu5VUv5I"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ts-quiz-card">
                <div class="ts-text-fff">
                    <h1 class="text-white ts-font-poppins fw-semibold ts-heading-05 mb-3">
                        Practicing with Online Quiz
                    </h1>
                    <p class="ts-font-manrope ts-desc-04">
                        Practicing the online assessment , job simulation and assessment
                        center with our quiz bank
                    </p>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="#" class="ts-btn-05" data-bs-toggle="modal" data-bs-target="#exampleModal3">View
                        Details</a>
                    <!-- Modal -->

                    <div class="modal modal-xl fade" id="exampleModal3" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
                        <div class="modal-dialog ts-modal-dialog">
                            <div class="ts-modal ts-bg-fff position-relative">
                                <button class="btn ts-modal-btn-close p-0" data-bs-dismiss="modal">
                                    <img width="25"
                                        src="{{ URL::asset('assets/images/front/icon/close-circle.svg') }}"
                                        alt="..." />
                                </button>
                                <button class="btn btn-secondary ts-btn-modal-controller ts-btn-modal-controller__left"
                                    data-bs-target="#exampleModal2" data-bs-toggle="modal" data-bs-dismiss="modal">
                                    &lt;
                                </button>
                                <button class="btn btn-secondary ts-btn-modal-controller ts-btn-modal-controller__right"
                                    data-bs-target="#exampleModal4" data-bs-toggle="modal" data-bs-dismiss="modal">
                                    &gt;
                                </button>
                                <div class="row row-cols-xl-2 w-100 mx-0">
                                    <div class="ts-modal-content ts-text-Rhythm ts-font-poppins ts-desc-04">
                                        <h1 class="mb-lg-08 mb-06 ts-modal-title ts-font-poppins fw-bold ts-heading-05">
                                            <span class="ts-modal-number me-lg-4 me-2">3</span> Know
                                            your Dream Company
                                        </h1>
                                        <p class="mb-06">
                                            Once completed/passed the application, the first stage
                                            of online assessment often refer to
                                        </p>
                                        <ul class="mb-lg-07 mb-06">
                                            <li>Immersive Online Assessment</li>
                                            <li>Game-based Online Assessment</li>
                                        </ul>
                                        <p class="mb-06">Become our Member to</p>

                                        <ul class="mb-05">
                                            <li>
                                                Practice up-to-date real quiz banks for your targeted
                                                companies ( SHL ; e-cut;)
                                            </li>
                                            <li>
                                                Practice with simulated game system (phymetrics game ,
                                                Plum Discovery, Peak Performance, etc; )
                                            </li>
                                        </ul>
                                        <div class="d-flex justify-content-end">
                                            <a href="./login.html" class="ts-btn-06">Login</a>
                                        </div>
                                    </div>

                                    <div class="ts-modal-video">
                                        <div class="ratio ratio-16x9">
                                            <iframe class="w-100" src="https://www.youtube.com/embed/TjhFu5VUv5I"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ts-Communication-card">
                <div class="ts-text-fff">
                    <h1 class="text-white ts-font-poppins fw-semibold ts-heading-05 mb-3">
                        Network Communication
                    </h1>
                    <p class="ts-font-manrope ts-desc-04">
                        Finding the networking communication in your career circle
                    </p>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="#" class="ts-btn-05" data-bs-toggle="modal" data-bs-target="#exampleModal4">View
                        Details</a>
                    <!-- Modal -->

                    <div class="modal modal-xl fade" id="exampleModal4" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
                        <div class="modal-dialog ts-modal-dialog">
                            <div class="ts-modal ts-bg-fff position-relative">
                                <button class="btn ts-modal-btn-close p-0" data-bs-dismiss="modal">
                                    <img width="25"
                                        src="{{ URL::asset('assets/images/front/icon/close-circle.svg') }}"
                                        alt="..." />
                                </button>
                                <button class="btn btn-secondary ts-btn-modal-controller ts-btn-modal-controller__left"
                                    data-bs-target="#exampleModal3" data-bs-toggle="modal" data-bs-dismiss="modal">
                                    &lt;
                                </button>
                                <button
                                    class="btn btn-secondary ts-btn-modal-controller ts-btn-modal-controller__right opacity-25"
                                    data-bs-target="#exampleModal1" data-bs-toggle="modal" data-bs-dismiss="modal"
                                    disabled>
                                    &gt;
                                </button>
                                <div class="row row-cols-xl-2 w-100 mx-0">
                                    <div class="ts-modal-content ts-text-Rhythm ts-font-poppins ts-desc-04">
                                        <h1 class="mb-lg-08 mb-06 ts-modal-title ts-font-poppins fw-bold ts-heading-05">
                                            <span class="ts-modal-number me-lg-4 me-2">4</span> Know
                                            your Dream Company
                                        </h1>
                                        <p class="mb-07">
                                            The next stage often refers to an interview,
                                        </p>
                                        <p class="mb-04">Become our Member to</p>

                                        <ul class="mb-lg-10 mb-08">
                                            <li class="mb-04">
                                                Ptactive with Hire Vue interview questions via video
                                                Recording Function
                                            </li>
                                            <li class="mb-04">
                                                Get loads of Case Study samples and instructions
                                            </li>
                                            <li class="mb-04">
                                                Book 1-to-1 / 1-to-N interview Couch
                                            </li>
                                        </ul>

                                        <div class="d-flex justify-content-end">
                                            <a href="./login-signup.html" class="ts-btn-06">Login</a>
                                        </div>
                                    </div>

                                    <div class="ts-modal-video">
                                        <div class="ratio ratio-16x9">
                                            <iframe class="w-100" src="https://www.youtube.com/embed/TjhFu5VUv5I"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
