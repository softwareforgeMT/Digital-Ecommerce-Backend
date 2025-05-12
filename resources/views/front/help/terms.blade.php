@extends('front.help.layout')

@section('meta_title', "Terms of Service" )
@section('meta_description', "Read our terms of service to understand the rules and guidelines for using our platform." )


@section('help-content')
<div class="flex flex-col lg:flex-row">
    <!-- Table of Contents (Fixed Left Sidebar) -->
    <div class="lg:w-64 flex-shrink-0">
        <div class="sticky top-24 bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 p-4">
            <h3 class="text-lg font-semibold mb-3 text-gray-900 dark:text-white">Table of Contents</h3>
            <ul class="space-y-1 text-sm">
                <li><a href="#introduction" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">1. Introduction</a></li>
                <li><a href="#user-accounts" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">2. User Accounts</a></li>
                <li><a href="#acceptable-use" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">3. Acceptable Use</a></li>
                <li><a href="#products-services" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">4. Products and Services</a></li>
                <li><a href="#orders-payments" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">5. Orders and Payments</a></li>
                <li><a href="#shipping-delivery" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">6. Shipping and Delivery</a></li>
                <li><a href="#returns" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">7. Returns and Refunds</a></li>
                <li><a href="#intellectual-property" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">8. Intellectual Property</a></li>
                <li><a href="#user-content" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">9. User Content</a></li>
                <li><a href="#third-party-websites" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">10. Third-Party Websites</a></li>
                <li><a href="#termination" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">11. Termination</a></li>
                <li><a href="#liability" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">12. Limitation of Liability</a></li>
                <li><a href="#warranty" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">13. Disclaimer</a></li>
                <li><a href="#governing-law" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">14. Governing Law</a></li>
                <li><a href="#changes" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">15. Changes to Terms</a></li>
                <li><a href="#contact" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">16. Contact Us</a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="lg:flex-1 lg:pl-8 mt-8 lg:mt-0">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden border border-gray-100 dark:border-gray-700">
            <!-- Document Actions -->
            <div class="border-b border-gray-100 dark:border-gray-700 p-6 bg-gray-50 dark:bg-gray-800">
                <div class="flex justify-between items-center flex-wrap gap-4">
                    <div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Last Updated: January 15, 2024</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <a href="javascript:window.print()" class="flex items-center text-sm text-gray-600 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                            </svg>
                            Print
                        </a>
                        <a href="#" class="flex items-center text-sm text-gray-600 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Download PDF
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Content -->
            <div class="p-6 md:p-8 prose prose-lg max-w-none dark:prose-invert">
                <h2 id="introduction" class="scroll-mt-32">1. Introduction</h2>
                <p>Welcome to {{ $gs->name }}. These Terms of Service ("Terms") govern your use of our website, products, and services ("Services"). By accessing or using our Services, you agree to be bound by these Terms. If you disagree with any part of the terms, you are not permitted to use our Services.</p>
                
                <h2 id="user-accounts" class="scroll-mt-32">2. User Accounts</h2>
                <p>When you create an account with us, you must provide accurate, complete, and current information. You are responsible for safeguarding the password and for all activities that occur under your account. You must immediately notify us of any unauthorized use of your account.</p>
                
                <p>You must be at least 18 years old to create an account and use our Services. By creating an account, you represent and warrant that you are at least 18 years of age.</p>
                
                <h2 id="acceptable-use" class="scroll-mt-32">3. Acceptable Use</h2>
                <p>You agree not to use the Services:</p>
                <ul>
                    <li>In any way that violates any applicable laws or regulations.</li>
                    <li>To engage in any activity that interferes with or disrupts the Services.</li>
                    <li>To attempt to access any parts of the Services that you are not authorized to access.</li>
                    <li>To reproduce, duplicate, copy, sell, resell, or exploit any portion of the Services without express written permission.</li>
                    <li>To harass, abuse, or harm another person or group.</li>
                    <li>To upload or transmit viruses or any other type of malicious code.</li>
                </ul>
                
                <h2 id="products-services" class="scroll-mt-32">4. Products and Services</h2>
                <p>All features, specifications, products, and prices of products and services described on our platform are subject to change at any time without notice. We reserve the right to discontinue any product or service at any time.</p>
                
                <p>Certain products or services may be available exclusively online through our website. These products or services may have limited quantities and are subject to return or exchange only according to our Return Policy.</p>
                
                <h2 id="orders-payments" class="scroll-mt-32">5. Orders and Payments</h2>
                <p>We reserve the right to refuse any order placed with us. We may, at our sole discretion, limit or cancel quantities purchased per person, per household, or per order.</p>
                
                <p>You agree to provide current, complete, and accurate purchase and account information for all purchases made on our website. You agree to promptly update your account and other information so that we can complete your transactions and contact you as needed.</p>
                
                <p>For more details, please review our payment terms and conditions which are incorporated into these Terms of Service.</p>
                
                <h2 id="shipping-delivery" class="scroll-mt-32">6. Shipping and Delivery</h2>
                <p>We will make our best effort to ensure that orders are delivered promptly, but we cannot guarantee delivery times. You agree that we are not responsible for any delays outside our direct control.</p>
                
                <p>Risk of loss and title for items purchased from our website pass to you upon delivery of the items to the carrier. You are responsible for filing any claims with carriers for damaged and/or lost shipments.</p>
                
                <h2 id="returns" class="scroll-mt-32">7. Returns and Refunds</h2>
                <p>Our Return Policy forms a part of these Terms. Please review our Return Policy to understand your rights and obligations when seeking returns and refunds.</p>
                
                <h2 id="intellectual-property" class="scroll-mt-32">8. Intellectual Property</h2>
                <p>The Service and its original content, features, and functionality are and will remain the exclusive property of {{ $gs->name }} and its licensors. The Service is protected by copyright, trademark, and other laws of both the United States and foreign countries.</p>
                
                <p>Our trademarks and trade dress may not be used in connection with any product or service without the prior written consent of {{ $gs->name }}.</p>
                
                <h2 id="user-content" class="scroll-mt-32">9. User Content</h2>
                <p>You retain any and all rights to any content you submit, post, or display on or through the Service ("User Content"). By submitting User Content, you grant us a worldwide, non-exclusive, royalty-free license to use, reproduce, modify, adapt, publish, translate, distribute, and display such content.</p>
                
                <p>You represent and warrant that: (i) You own the content or have the right to use it and grant us the rights and license as provided in these Terms, and (ii) the posting of your content does not violate the privacy rights, publicity rights, copyrights, contract rights, or any other rights of any person.</p>
                
                <h2 id="third-party-websites" class="scroll-mt-32">10. Links to Third-Party Websites</h2>
                <p>Our Service may contain links to third-party websites that are not owned or controlled by {{ $gs->name }}. We have no control over, and assume no responsibility for, the content, privacy policies, or practices of any third-party websites or services.</p>
                
                <p>You further acknowledge and agree that {{ $gs->name }} shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with the use of or reliance on any such content, goods, or services available on or through any such websites or services.</p>
                
                <h2 id="termination" class="scroll-mt-32">11. Termination</h2>
                <p>We may terminate or suspend your account and bar access to the Service immediately, without prior notice or liability, under our sole discretion, for any reason whatsoever, including but not limited to a breach of the Terms.</p>
                
                <p>If you wish to terminate your account, you may simply discontinue using the Service. All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity, and limitations of liability.</p>
                
                <h2 id="liability" class="scroll-mt-32">12. Limitation of Liability</h2>
                <p>To the maximum extent permitted by applicable law, in no event shall {{ $gs->name }}, its directors, employees, partners, agents, suppliers, or affiliates, be liable for any indirect, incidental, special, consequential, or punitive damages, including without limitation, loss of profits, data, use, goodwill, or other intangible losses, resulting from:</p>
                <ul>
                    <li>Your access to or use of or inability to access or use the Service;</li>
                    <li>Any conduct or content of any third party on the Service;</li>
                    <li>Any content obtained from the Service; and</li>
                    <li>Unauthorized access, use, or alteration of your transmissions or content</li>
                </ul>
                
                <h2 id="warranty" class="scroll-mt-32">13. Disclaimer</h2>
                <p>Your use of the Service is at your sole risk. The Service is provided on an "AS IS" and "AS AVAILABLE" basis. The Service is provided without warranties of any kind, whether express or implied, including, but not limited to, implied warranties of merchantability, fitness for a particular purpose, non-infringement, or course of performance.</p>
                
                <h2 id="governing-law" class="scroll-mt-32">14. Governing Law</h2>
                <p>These Terms shall be governed by and defined following the laws of [Your Country/State]. {{ $gs->name }} and yourself irrevocably consent that the courts of [Your Country/State] shall have exclusive jurisdiction to resolve any dispute which may arise in connection with these terms.</p>
                
                <h2 id="changes" class="scroll-mt-32">15. Changes to Terms</h2>
                <p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material, we will provide at least 30 days' notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p>
                
                <p>By continuing to access or use our Service after any revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, you are no longer authorized to use the Service.</p>
                
                <h2 id="contact" class="scroll-mt-32">16. Contact Us</h2>
                <p>If you have any questions about these Terms, please contact us at:</p>
                <ul>
                    <li>Email: legal@digitalcommerce.com</li>
                    <li>Phone: +1-800-123-4567</li>
                    <li>Mail: Digital Commerce Legal Department, 123 Commerce Street, New York, NY 10001</li>
                </ul>
            </div>
        </div>
        
        <!-- Footer Actions -->
        <div class="mt-8 text-center">
            <p class="text-gray-600 dark:text-gray-400 mb-4">If you have any questions about our Terms of Service, please contact our support team.</p>
            <div class="flex justify-center gap-4 flex-wrap">
                <a href="{{ route('front.help.overview') }}" class="px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                    Back to Help Center
                </a>
                <a href="{{ route('front.help.privacy') }}" class="px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors">
                    View Privacy Policy
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Smooth scrolling for table of contents links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 100, // Adjust offset as needed
                        behavior: 'smooth'
                    });
                    
                    // Update URL without scrolling
                    history.pushState(null, null, targetId);
                }
            });
        });
    });
</script>
@endsection
