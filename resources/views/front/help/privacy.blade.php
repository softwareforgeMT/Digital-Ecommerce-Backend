@extends('front.help.layout')


@section('meta_title', "Privacy Policy " )
@section('meta_description', "Learn how we collect, use, and protect your personal information when you use our services." )





@section('help-content')
<div class="flex flex-col lg:flex-row">
    <!-- Table of Contents (Fixed Left Sidebar) -->
    <div class="lg:w-64 flex-shrink-0">
        <div class="sticky top-24 bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 p-4">
            <h3 class="text-lg font-semibold mb-3 text-gray-900 dark:text-white">Table of Contents</h3>
            <ul class="space-y-1 text-sm">
                <li><a href="#overview" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">1. Overview</a></li>
                <li><a href="#information-collection" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">2. Information Collection</a></li>
                <li><a href="#information-usage" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">3. Information Usage</a></li>
                <li><a href="#data-sharing" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">4. Information Sharing</a></li>
                <li><a href="#data-protection" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">5. Data Protection</a></li>
                <li><a href="#cookies" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">6. Cookies and Tracking</a></li>
                <li><a href="#your-rights" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">7. Your Rights</a></li>
                <li><a href="#data-retention" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">8. Data Retention</a></li>
                <li><a href="#international-transfers" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">9. International Transfers</a></li>
                <li><a href="#children-privacy" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">10. Children's Privacy</a></li>
                <li><a href="#policy-updates" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">11. Policy Updates</a></li>
                <li><a href="#contact-us" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">12. Contact Us</a></li>
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
                        @include('front.help.partials.document-actions')
                    </div>
                </div>
            </div>
            
            <!-- Content -->
            <div class="p-6 md:p-8 prose prose-lg max-w-none dark:prose-invert">
                <h2 id="overview" class="scroll-mt-32">1. Overview</h2>
                <p>At {{ $gs->name }}, we take your privacy seriously. This Privacy Policy describes how we collect, use, and protect your personal information when you use our website and services.</p>
                
                <h2 id="information-collection" class="scroll-mt-32">2. Information We Collect</h2>
                <h3>Personal Information</h3>
                <ul>
                    <li>Name and contact details</li>
                    <li>Billing and shipping addresses</li>
                    <li>Payment information</li>
                    <li>Email address</li>
                    <li>Phone number</li>
                </ul>

                <h3>Automatically Collected Information</h3>
                <ul>
                    <li>Device information</li>
                    <li>IP address</li>
                    <li>Browser type</li>
                    <li>Usage data</li>
                    <li>Cookies and similar technologies</li>
                </ul>

                <h2 id="information-usage" class="scroll-mt-32">3. How We Use Your Information</h2>
                <p>We use your information for the following purposes:</p>
                <ul>
                    <li>Processing and fulfilling your orders</li>
                    <li>Providing customer support</li>
                    <li>Sending transactional emails and updates</li>
                    <li>Improving our services and user experience</li>
                    <li>Detecting and preventing fraud</li>
                    <li>Marketing and promotional communications (with consent)</li>
                    <li>Legal compliance and enforcement</li>
                </ul>

                <h2 id="data-sharing" class="scroll-mt-32">4. Information Sharing</h2>
                <p>We may share your information with:</p>
                <ul>
                    <li>Service providers and business partners</li>
                    <li>Payment processors</li>
                    <li>Shipping and logistics partners</li>
                    <li>Analytics providers</li>
                    <li>Legal authorities when required by law</li>
                </ul>

                <h2 id="data-protection" class="scroll-mt-32">5. Data Protection</h2>
                <p>We implement appropriate technical and organizational measures to protect your personal information, including:</p>
                <ul>
                    <li>SSL/TLS encryption for data transmission</li>
                    <li>Secure data storage systems</li>
                    <li>Access controls and authentication</li>
                    <li>Regular security assessments</li>
                    <li>Employee training on data protection</li>
                </ul>

                <h2 id="cookies" class="scroll-mt-32">6. Cookies and Tracking</h2>
                <p>We use cookies and similar technologies to:</p>
                <ul>
                    <li>Remember your preferences</li>
                    <li>Analyze site usage</li>
                    <li>Personalize content</li>
                    <li>Provide secure authentication</li>
                    <li>Improve site performance</li>
                </ul>

                <h2 id="your-rights" class="scroll-mt-32">7. Your Rights</h2>
                <p>You have the right to:</p>
                <ul>
                    <li>Access your personal information</li>
                    <li>Correct inaccurate data</li>
                    <li>Request deletion of your data</li>
                    <li>Object to data processing</li>
                    <li>Withdraw consent</li>
                    <li>Data portability</li>
                </ul>

                <h2 id="data-retention" class="scroll-mt-32">8. Data Retention</h2>
                <p>We retain your personal information for as long as necessary to:</p>
                <ul>
                    <li>Provide our services</li>
                    <li>Comply with legal obligations</li>
                    <li>Resolve disputes</li>
                    <li>Enforce agreements</li>
                </ul>

                <h2 id="international-transfers" class="scroll-mt-32">9. International Data Transfers</h2>
                <p>We may transfer your data to servers or service providers located outside your country. We ensure appropriate safeguards are in place to protect your information during such transfers.</p>

                <h2 id="children-privacy" class="scroll-mt-32">10. Children's Privacy</h2>
                <p>Our services are not intended for children under 13. We do not knowingly collect information from children under 13. If you believe we have collected information from a child under 13, please contact us.</p>

                <h2 id="policy-updates" class="scroll-mt-32">11. Changes to This Policy</h2>
                <p>We may update this Privacy Policy periodically. We will notify you of any material changes through our website or via email. Your continued use of our services after such changes constitutes acceptance of the updated policy.</p>

                <h2 id="contact-us" class="scroll-mt-32">12. Contact Us</h2>
                <p>If you have questions about this Privacy Policy or our data practices, please contact us at:</p>
                <ul>
                    <li>Email: privacy@digitalcommerce.com</li>
                    <li>Phone: +1-800-123-4567</li>
                    <li>Address: Digital Commerce Privacy Office, 123 Commerce Street, New York, NY 10001</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    // Same smooth scrolling script as terms page
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                    
                    history.pushState(null, null, targetId);
                }
            });
        });
    });
</script>
@endsection
