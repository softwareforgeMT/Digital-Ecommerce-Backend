@extends('user.layouts.master')
@section('title')
    @lang('translation.home')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Pages
        @endslot
        @slot('title')
            Help
        @endslot
    @endcomponent

    <div class="row mt-2">
        <div class="col-lg-12">
            {{-- <div class="card rounded-0 bg-soft-success mx-n4 mt-n4 border-top">
                <div class="px-4">
                    <div class="row">
                        <div class="col-xxl-5 align-self-center">
                            <div class="py-4 ">
                                <h4 class="display-6 coming-soon-text">Help</h4>
                                <p class="text-success fs-15 mt-3">If you don't find your answer in the list,
                                    you can always contact us or email us. We will answer you shortly!</p>
                                <div class="hstack flex-wrap gap-2">
                                    <button type="button" class="btn btn-primary btn-label rounded-pill"><i
                                            class="ri-mail-line label-icon align-middle rounded-pill fs-16 me-2"></i> Email
                                        Us</button>
                                    <button type="button" class="btn btn-info btn-label rounded-pill"><i
                                            class="ri-twitter-line label-icon align-middle rounded-pill fs-16 me-2"></i>
                                        Send Us Tweet</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 ms-auto">
                            <div class="mb-n5 pb-1 faq-img d-none d-xxl-block">
                                <img src="{{ URL::asset('assets/images/faq-img.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div> --}}
            <!-- end card -->

            <div class="row justify-content-evenly">
                <div class="col-lg-4">
                    <div class="mt-3">
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-shrink-0 me-1">
                                <i class="ri-question-line fs-24 align-middle text-success me-1"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="fs-16 mb-0 fw-semibold">General Questions</h5>
                            </div>
                        </div>

                        <div class="accordion accordion-border-box" id="genques-accordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="genques-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#genques-collapseOne" aria-expanded="true"
                                        aria-controls="genques-collapseOne">
                                        What is the accuracy rate of the quiz banks?
                                    </button>
                                </h2>
                                <div id="genques-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="genques-headingOne" data-bs-parent="#genques-accordion">
                                    <div class="accordion-body">
                                        Quiz banks on AssessmentPass has covered past 4 years materials and collected current assessment materials. We persist in providing the latest materials by updating the quiz banks weekly so our members can practice with the real assessments quizes*.


                                        *The accuracy rate is 85%-90% by estimation.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="genques-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#genques-collapseTwo" aria-expanded="false"
                                        aria-controls="genques-collapseTwo">
                                         What is the refund policy?

                                    </button>
                                </h2>
                                <div id="genques-collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="genques-headingTwo" data-bs-parent="#genques-accordion">
                                    <div class="accordion-body">
                                       
                                       
                                        <ol>
                                            <li><strong>General Provisions:</strong><br>
                                            All purchases made on AssessmentPass are subject to this Refund Policy.<br>
                                            By making a purchase on our website, you agree to this Refund Policy.</li>
                                            
                                            <li><strong>Refund Eligibility:</strong><br>
                                            Refunds are only available for purchases made directly through <a href="http://www.assessmentpass.com">www.assessmentpass.com</a>.<br>
                                            To be eligible for a refund, you must submit your request within 14 days of the purchase date.<br>
                                            Refunds are only granted if the user account associated with the purchase has not been used or accessed.</li>
                                            
                                            <li><strong>Services Not Eligible for Refunds:</strong><br>
                                            Personalized coaching sessions, once they have been conducted.<br>
                                            Any service or product that has been used or accessed, except as specified in the eligibility criteria above.</li>
                                            
                                            <li><strong>Refund Process:</strong><br>
                                            To request a refund, please contact us at <a href="mailto:contact@assessmentpass.com">contact@assessmentpass.com</a> with your order details and reason for the refund request.<br>
                                            Once we receive your request, our team will review it and inform you of the decision within 7 business days.<br>
                                            If your refund is approved, it will be processed, and a credit will be applied to your original method of payment within 14 business days.</li>
                                            
                                            <li><strong>Exceptions:</strong><br>
                                            Any abuse or misuse of our services may result in the refusal of a refund.<br>
                                            AssessmentPass reserves the right to refuse a refund if the request does not comply with this policy.</li>
                                            
                                            <li><strong>Changes to the Refund Policy:</strong><br>
                                            We reserve the right to modify this Refund Policy at any time. Any changes will be effective immediately upon posting on our website.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="genques-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#genques-collapseThree" aria-expanded="false"
                                        aria-controls="genques-collapseThree">
                                        How can I upgrade?
                                    </button>
                                </h2>
                                <div id="genques-collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="genques-headingThree" data-bs-parent="#genques-accordion">
                                    <div class="accordion-body">
                                       

                                        You can upgrade the membership plan by simply adding your wanted package to the cart on "Upgrade Now" Page. More importantly, accounts upgrade only requires our members to pay the membership package price difference*. In this case, our members DO NOT need to always purchase the membership on original price if you already become our member.


                                        *This rule can only applied to accounts' valid period.
                                    </div>
                                </div>
                            </div>
                           {{--  <div class="accordion-item">
                                <h2 class="accordion-header" id="genques-headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#genques-collapseFour" aria-expanded="false"
                                        aria-controls="genques-collapseFour">
                                        Where can I get some ?
                                    </button>
                                </h2>
                                <div id="genques-collapseFour" class="accordion-collapse collapse"
                                    aria-labelledby="genques-headingFour" data-bs-parent="#genques-accordion">
                                    <div class="accordion-body">
                                        Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in
                                        faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi
                                        consectetuer lacinia. Nam pretium turpis et arcu arcu tortor, suscipit eget,
                                        imperdiet nec, imperdiet iaculis aliquam ultrices mauris.
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <!--end accordion-->
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mt-3">
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-shrink-0 me-1">
                                <i class="ri-user-settings-line fs-24 align-middle text-success me-1"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="fs-16 mb-0 fw-semibold">Manage Account</h5>
                            </div>
                        </div>

                        <div class="accordion accordion-border-box" id="manageaccount-accordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="manageaccount-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#manageaccount-collapseOne" aria-expanded="false"
                                        aria-controls="manageaccount-collapseOne">
                                        What is the Access Role?
                                    </button>
                                </h2>
                                <div id="manageaccount-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="manageaccount-headingOne" data-bs-parent="#manageaccount-accordion">
                                    <div class="accordion-body">
                                        

All our members can only access to one position in one employer when practicing "Quiz Practice" module within 6 months considering all employers only allows one position application per recruitment cycle. Also, in order to prevent peer-to-peer plagiarism. In this case, all our members should be fully aware of the entry of quiz banks for each single employer.


                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="manageaccount-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#manageaccount-collapseTwo" aria-expanded="true"
                                        aria-controls="manageaccount-collapseTwo">
                                        What is the Referral Policy?
                                    </button>
                                </h2>
                                <div id="manageaccount-collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="manageaccount-headingTwo" data-bs-parent="#manageaccount-accordion">
                                    <div class="accordion-body">

                                        AssessmentPass encourage all our members to recommend us to any individuals/institutions that is interested in our services. You can get financial rewards if any purchase has applied your own referral code (UID stated on profile page) or referral link which will be automatically collected in Your "Earnings"*. Meanwhile, customers who apply the referral code will also be eligible for a 5% discounts.


                                       <p><strong>Financial Rewards Rule:</strong></p>

                                        <ul>
                                          <li>Sales Amount: 0-1000 GBP - 15% Rewards</li>
                                          <li>Sales Amount: 1000 GBP-8000 GBP - 25% Rewards</li>
                                          <li>Sales Amount: Above 8000 GBP - 40% Rewards</li>
                                        </ul>

                                        <p>One example:</p>

                                        <p>If sales amount (in which had applied your referral code) is 10000 GBP, you will get financial rewards at 1000 x 15% + (8000-1000) x 25% + (10000-8000) x 40% = 2700 GBP in your Earnings.</p>

                                        <p><strong>For more information regarding how to withdraw the financial rewards, please go to my documents and download "Withdrawal Instruction" PDF file for one step by step guidance.</strong></p>


                                    </div>
                                </div>
                            </div>
                            {{-- <div class="accordion-item">
                                <h2 class="accordion-header" id="manageaccount-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#manageaccount-collapseThree" aria-expanded="false"
                                        aria-controls="manageaccount-collapseThree">
                                        Why do we use it ?
                                    </button>
                                </h2>
                                <div id="manageaccount-collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="manageaccount-headingThree"
                                    data-bs-parent="#manageaccount-accordion">
                                    <div class="accordion-body">
                                        he wise man therefore always holds in these matters to this principle of selection:
                                        he rejects pleasures to secure other greater pleasures, or else he endures pains to
                                        avoid worse pains.But I must explain to you how all this mistaken idea of denouncing
                                        pleasure and praising pain was born and I will give you a complete.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="manageaccount-headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#manageaccount-collapseFour" aria-expanded="false"
                                        aria-controls="manageaccount-collapseFour">
                                        What is Lorem Ipsum ?
                                    </button>
                                </h2>
                                <div id="manageaccount-collapseFour" class="accordion-collapse collapse"
                                    aria-labelledby="manageaccount-headingFour" data-bs-parent="#manageaccount-accordion">
                                    <div class="accordion-body">
                                        Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in
                                        faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi
                                        consectetuer lacinia. Nam pretium turpis et arcu arcu tortor, suscipit eget,
                                        imperdiet nec, imperdiet iaculis aliquam ultrices mauris.
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <!--end accordion-->
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mt-3">
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-shrink-0 me-1">
                                <i class="ri-shield-keyhole-line fs-24 align-middle text-success me-1"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="fs-16 mb-0 fw-semibold">Privacy &amp; Security</h5>
                            </div>
                        </div>

                        <div class="accordion accordion-border-box" id="privacy-accordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="privacy-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#privacy-collapseOne" aria-expanded="true"
                                        aria-controls="privacy-collapseOne">
                                        What is the privacy policy?
                                    </button>
                                </h2>
                                <div id="privacy-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="privacy-headingOne" data-bs-parent="#privacy-accordion">
                                    <div class="accordion-body">
                                        @php
                                        $privacy=\App\Models\Page::find(3);
                                        @endphp
                                        <div class="privacy-policy">
                                            <h5>{{$privacy->title}}</h5>
                                            <p>Last updated: {{ \Carbon\Carbon::parse($privacy->updated_at)->format('F d, Y') }}</p>
                                            <p>{!! $privacy->details !!}</p>
                                            
                                        </div>


                                    </div>
                                </div>
                            </div>


 
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="tos-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#tos-collapseOne" aria-expanded="true"
                                        aria-controls="privacy-collapseOne">
                                        Terms & Services
                                    </button>
                                </h2>
                                <div id="tos-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="tos-headingOne" data-bs-parent="#tos-accordion">
                                    <div class="accordion-body">
                                        @php
                                        $terms=\App\Models\Page::find(2);
                                        @endphp
                                        <div class="terms-of-service">
                                             <h5>{{$terms->title}}</h5>
                                            <p>Last updated: {{ \Carbon\Carbon::parse($terms->updated_at)->format('F d, Y') }}</p>
                                            <p>{!! $terms->details !!}</p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                        </div>
                        <!--end accordion-->
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    {{-- <div>

        <h1>Getting Started</h1>
        <ol class="fs-5 d-flex flex-column gap-1">
            <li>
                <span>Identify the Assessments you need to prepare for. You can do this in several ways:</span>

                <ul class="mb-1">
                    <li>Information provided directly from the employer
                    </li>
                    <li>GF Employer Guides
                    </li>
                    <li>Be Proactive by practicing assessments ahead of time
                    </li>
                    <li>Online Self-learning
                    </li>

                </ul>

            </li>
            <li>Use GF video and text resources to learn about assessments
            </li>
            <li>Navigate through the range of tests you need to practice via the tabs on the left-hand side. These include;
                Game
                Assessments, Psychometric Tests, and Video Interviews
            </li>
            <li>Use Performance charts and instant feedback reports, instantly generated after a test is completed. These
                include; worked solutions, performance infographics, and tips to improve.
            </li>
        </ol>
        <h1>How to Use Our Tests
        </h1>
        <ul class="fs-5 mb-1">
            <li>Simply navigate through the test tabs on the left hand side of the portal. Click on a test of your choice
                and the test player will launch

            </li>
            <li>The first page will provide you with some instructions about the test. Once ready, please press the ‘next’
                button and the test will begin.

            </li>
            <li>Once you have completed the test, you will automatically receive a report.

            </li>
            <li>The first part of the report tells you how well you have done compared to others. This is a normed score and
                given in percentiles. The report is self-explanatory.
            </li>
            <li>The next section provides an overview of the questions you attempted, and which ones you answer correctly or
                incorrectly.

            </li>
            <li>You can click on any answers you got incorrect to reveal the question, step-by-step solution, and answer.

            </li>
            <li>Other information about the type of items you are performing well on, or struggling with, are provided. E.g.
                it may be you have a strength in percentage-based items, but struggle with items that involve charts. This
                can help you focus your preparation. Accuracy and Speed of completing the test is also considered and
                guidance provided.

            </li>
            <li>Finally, tips on doing your best on the day are given.

            </li>
            <li>You can click on ‘view progress’ on the Home page and see how well you are doing across the many tests you
                have taken.
            </li>
            <li>You can copy your unique ID presented at the top of the Home page and log in anytime in the future to access
                your reports or practice tests. Your unique ID will have a shelf-life of 3 months.

            </li>

        </ul>
    </div> --}}
@endsection




@section('script')
   
@endsection
