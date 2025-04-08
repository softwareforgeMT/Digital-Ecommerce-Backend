        <div class="aptf_sidebar_menu card apt-rounded-10 apt-box-shadow " >
            {{-- <div class="position-relative"> --}}
                {{-- <div class="target-element__circle trigger-element"></div> --}}
            {{-- </div> --}}
            
            <div class="p-3">
                <a href="#hero" class="aptf_menu">
                    <img src="{{ asset('assets/front/images/logo_mini.png') }}">
                </a>
                <hr class="mb-0 pb-0">
            </div>
            
            <div class="card-body aptf_menu_list mb-3">    
                <a href="#empoyer_guide" class="aptf_menu">Employer Guide</a>
                <img  src="{{ asset('assets/front/images/arrow.png') }}">
                <!--li end-->

                <a href="#job_searching" class="aptf_menu">Job Searching</a>
                <img  src="{{ asset('assets/front/images/arrow.png') }}">
                <!--li end-->

                <a href="#quiz_practice" class="aptf_menu">Quiz Practice</a>
                <img  src="{{ asset('assets/front/images/arrow.png') }}">
                <!--li end-->

                <a href="#interview_learning" class="aptf_menu">Interview Learning</a>
                <!--li end-->
            </div>
        </div>
@pushOnce('partial_script')    
<script type="text/javascript">

document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.querySelector(".aptf_sidebar_menu");
    const triggerElement = document.querySelector(".trigger-element");
     // Add a trigger element to hover over

    // Function to show the sidebar
    function showSidebar() {
        sidebar.style.right = "0";
    }

    // Function to toggle the sidebar
    function toggleSidebar() {
        if(sidebar.style.right=== "10px"){
            sidebar.style.right = "-90px";
        }else{
            sidebar.style.right = "10px";
        }
        
    }

    // Event listeners for hover
    triggerElement.addEventListener("click", toggleSidebar);
});
</script>
@endpushOnce    


