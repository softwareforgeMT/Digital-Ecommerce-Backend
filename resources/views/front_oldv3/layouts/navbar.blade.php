            <nav class="navbar navbar-expand-lg navbar-landing fixed-top {{isset($homecheck)?'homepage__navbar':'apt-bg-primary'}}" id="navbar">
                <div class="container">
                    <div class="d-inline-flex align-items-center">
                        <button class="apt-nav-btn navbar-toggler py-0 fs-20 me-1 " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                                <i class="mdi mdi-menu"></i>
                        </button>
                        <a class="navbar-brand" href="{{ route('front.index') }}">
                            <img src="{{asset('assets/front/images/logo.png')}}" class="card-logo card-logo-dark" alt="logo dark" >
                            <img src="{{asset('assets/front/images/logo.png')}}" class="card-logo card-logo-light" alt="logo light"
                                >
                        </a>
                    </div>
                   

                    <div class="d-flex justify-content-end align-items-center" id="navbarSupportedContent">
                        <ul class="collapse navbar-collapse navbar-nav mx-auto mt-2 mt-lg-0" id="navbar-example1">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->route() ? (request()->route()->getName() === 'front.index' ? ' active' : '') : '' }}" href="{{ route('front.index') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->route() ? (request()->route()->getName() === 'front.company.index' ? ' active' : '') : '' }}" href="{{ route('front.company.index') }}">Employee Guide</a>
                            </li>
                            
                        </ul>
                        
                        @if(Auth::check())
                            <div class="ms-3">
                                <a href="{{ route('user.dashboard') }}" class="btn btn-primary apt-btn-primary apt-rounded-10"> Dashboard</a>
                            </div>
                        @else
                            <div class="ms-3">
                                <a href="{{ route('user.login') }}" class="btn btn-primary apt-btn-primary apt-rounded-10">Login In</a>
                            </div>
                        @endif
                    </div>

                </div>
            </nav>
            <!-- end navbar -->

             <!-- Mobile Nav sidebar -->
            <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Menu</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="mobile-navbar">
                        {{-- <ul class="list-unstyled1"> --}}
                        <ul class="navbar-nav mx-auto mt-2 mt-lg-0" id="navbar-example">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('front.index') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('front.company.index') }}">Employee Guide</a>
                            </li>
                            
                        </ul>

                    </div>
                    <hr>
                </div>
            </div>

