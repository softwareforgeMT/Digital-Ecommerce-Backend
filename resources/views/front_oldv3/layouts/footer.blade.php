<footer  class="custom-footer bg-dark1 pt-5 position-relative apt-bg-primary" style="background-image: url({{ asset('assets/front/images/bg_footer.png') }})">
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-8  ml-5">
                <h5 class="display-6 lh-base fw-bold text-white">
                    Are You Prepare to Start Your
                     <span class="apt-text-secondary2">Career Journey</span> Now?
 
                </h5>
                 <a href="{{ route('user.dashboard') }}" class="btn btn-primary apt-btn-primary w-lg apt-btn-animated apt-rounded-10 mt-3">Get Started <i class="ri-arrow-right-line align-middle ms-1"></i></a>
            </div>
            <div class="col-lg-4 text-center">
                 <h5 class="display-6 lh-base fw-bold text-white">
                    Contact us
                </h5>
                <p><a class="text-white" href="mailto:info@assessmentpass.com">info@assessmentpass.com</a></p>

                <div class=" mt-3 mt-sm-0">
                    <ul class="list-inline mb-0 footer-social-link">
                        @if($sociallinks->facebook)
                        <li class="list-inline-item">
                            <a href="{{$sociallinks->facebook}}" class="avatar-xs d-block">
                                <div class="avatar-title rounded-circle">
                                    <i class="ri-facebook-fill"></i>
                                </div>
                            </a>
                        </li>
                        @endif
                        @if($sociallinks->twitter)
                        <li class="list-inline-item">
                            <a href="{{$sociallinks->twitter}}" class="avatar-xs d-block">
                                <div class="avatar-title rounded-circle">
                                    <i class="ri-twitter-fill"></i>
                                </div>
                            </a>
                        </li>
                        @endif
                        @if($sociallinks->instagram)
                        <li class="list-inline-item">
                            <a href="{{$sociallinks->instagram}}" class="avatar-xs d-block">
                                <div class="avatar-title rounded-circle">
                                    <i class="ri-instagram-fill"></i>
                                </div>
                            </a>
                        </li>
                        @endif
                        @if($sociallinks->youtube)
                        <li class="list-inline-item">
                            <a href="{{$sociallinks->youtube}}" class="avatar-xs d-block">
                                <div class="avatar-title rounded-circle">
                                    <i class="ri-youtube-fill"></i>
                                </div>
                            </a>
                        </li>
                         @endif
                        @if($sociallinks->tiktok)
                        <li class="list-inline-item">
                            <a href="{{$sociallinks->tiktok}}" class="avatar-xs d-block">
                                <div class="avatar-title rounded-circle">
                                    <i class="bx bxl-tiktok"></i>
                                </div>
                            </a>
                        </li>
                         @endif 

                        
                    </ul>
                </div>
            </div>
        </div> 
        <div class="copy__rights text-white d-flex align-items-end pt-5 pb-1 justify-content-between ">
            <p class="mb-0">© {{now()->year}}, {{$gs->name}}. All rights reserved.</p>
            <div>
                <a class="text-white" target="_blank" href="{{route('front.page',\App\Models\Page::find(3)->slug)}}"><u>Privacy Policy</u></a> &nbsp; | &nbsp;
                <a class="text-white"  target="_blank"  href="{{route('front.page',\App\Models\Page::find(2)->slug)}}"><u>Terms of Service</u></a> 
            </div>
      
            
        </div>
    </div>
</footer>



<button onclick="topFunction()" class="btn btn-danger btn-icon landing-back-top" id="back-to-top" style="display: none;">
    <i class="ri-arrow-up-line"></i>
</button>