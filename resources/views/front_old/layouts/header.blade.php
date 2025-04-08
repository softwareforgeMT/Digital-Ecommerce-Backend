<div class="ts-bg-fff">
    <div class="container ts-navbar">
        <nav class="navbar navbar-expand-xl">
            <div class="container-fluid">
                <a class="navbar-brand p-0" href="./index.html">
                    <img class="w-100 h-100" loading="lazy" src="{{ asset('assets/images/front/img/logo.svg') }}"
                        alt="..." />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ts-navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                        <li class="nav-item">
                            <a class="nav-link ts-font-poppins ts-desc-07 ts-text-081131 ts-fw-medium"
                                aria-current="page" href="{{ route('front.index') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ts-font-poppins ts-desc-07 ts-text-081131 ts-fw-medium"
                                aria-current="page" href="{{ route('front.employ.guide') }}">Employs Guide</a>
                        </li>
                        <!-- <li class="nav-item">
                <a
                  class="nav-link ts-font-poppins ts-desc-07 ts-text-081131 ts-fw-medium"
                  aria-current="page"
                  href="#"
                  >Assessment Helper</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link ts-font-poppins ts-desc-07 ts-text-081131 ts-fw-medium"
                  aria-current="page"
                  href="#"
                  >Interview Assistant</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link ts-font-poppins ts-desc-07 ts-text-081131 ts-fw-medium"
                  aria-current="page"
                  href="#"
                  >Network Connection</a
                >
              </li> -->
                        <li class="nav-item">
                            <div class="d-flex gap-3 ms-3">
                                <a class="ts-btn-01" href="{{ route('front.pricing') }}">Become a Member</a>
                                @if (auth()->check())
                                    {{-- <a class="ts-btn-02" href="javascript:void();"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Log Out </a>
                                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form> --}}
                                    <a class="ts-btn-02" href="{{ route('user.dashboard') }}"> Dashboard </a>
                                @else
                                    <a class="ts-btn-02" href="{{ route('user.login') }}"> Log in </a>
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
