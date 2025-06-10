@extends('front.help.layout')

@section('meta_title', "Terms and Conditions")
@section('meta_description', "Read our terms and conditions for Computer Nostalgia Heaven.")

@section('help-content')
<div class="flex flex-col lg:flex-row">
    <!-- Table of Contents (Fixed Left Sidebar) -->
    <div class="lg:w-64 flex-shrink-0">
        <div class="sticky top-24 bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 p-4">
            <h3 class="text-lg font-semibold mb-3 text-gray-900 dark:text-white">Table of Contents</h3>
            <ul class="space-y-1 text-sm">
                <li><a href="#introduction" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">1. Introduction</a></li>
                <li><a href="#general-conditions" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">2. General Conditions</a></li>
                <li><a href="#order-refunds" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">3. Order Policy & Refunds</a></li>
                <li><a href="#warranty-policy" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">4. Warranty Policy</a></li>
                <li><a href="#shipping-guarantee" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">5. Express Shipping Guarantee</a></li>
                <li><a href="#use-of-bits" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">6. Use of Bits</a></li>
                <li><a href="#intellectual-property" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">7. Intellectual Property</a></li>
                <li><a href="#prohibited-use" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">8. Prohibited Use</a></li>
                <li><a href="#linked-sites" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">9. Linked Sites</a></li>
                <li><a href="#terms-of-sale" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">10. Terms of Sale</a></li>
                <li><a href="#liability-disclaimer" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">11. Disclaimer of Liability</a></li>
                <li><a href="#third-party-rights" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">12. External Links & Third-Party Rights</a></li>
                <li><a href="#indemnity" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">13. Indemnity</a></li>
                <li><a href="#site-changes" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">14. Site Changes</a></li>
                <li><a href="#invalidity" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">15. Invalidity Clause</a></li>
                <li><a href="#complaints" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">16. Complaints</a></li>
                <li><a href="#waiver" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">17. Waiver</a></li>
                <li><a href="#entire-agreement" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400">18. Entire Agreement</a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="lg:flex-1 lg:pl-8 mt-8 lg:mt-0">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md border border-gray-100 dark:border-gray-700 overflow-hidden">
            <div class="p-6 md:p-8 space-y-12">

                <!-- 1. Introduction -->
                <section id="introduction" class="scroll-mt-32">
                    <h2 class="text-3xl font-semibold mb-4 text-gray-900 dark:text-white">1. Introduction</h2>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        Welcome to <strong>Computer Nostalgia Heaven</strong>, your one-stop shop for retro computing and gaming. These Terms and Conditions govern your use of this website and services (collectively, the "Services"). By accessing or using this website, you agree to be bound by these Terms and our Privacy Policy. We may update these Terms at any time, so please check back regularly. Continued use of the site means you accept any changes.
                    </p>
                </section>

                <!-- 2. General Conditions -->
                <section id="general-conditions" class="scroll-mt-32">
                    <h2 class="text-3xl font-semibold mb-4 text-gray-900 dark:text-white">2. General Conditions</h2>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 dark:text-gray-300">
                        <li>Access is permitted on a temporary basis, and we may withdraw or amend services without notice.</li>
                        <li>We are not liable if the site is unavailable at any time.</li>
                        <li>We may restrict access to certain parts of the website.</li>
                    </ul>
                </section>

                <!-- 3. Order Policy & Refunds -->
                <section id="order-refunds" class="scroll-mt-32">
                    <h2 class="text-3xl font-semibold mb-4 text-gray-900 dark:text-white">3. Order Policy & Refunds</h2>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 dark:text-gray-300">
                        <li>All sales are final. We do not offer cash refunds. If a refund is approved, it will be issued in Bits (our internal reward system).</li>
                        <li>Please ensure you truly want the item before purchase.</li>
                        <li>Bits cannot be exchanged for legal tender, transferred, loaned, or given to others.</li>
                    </ul>
                </section>

                <!-- 4. Warranty Policy -->
                <section id="warranty-policy" class="scroll-mt-32">
                    <h2 class="text-3xl font-semibold mb-4 text-gray-900 dark:text-white">4. Warranty Policy</h2>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 dark:text-gray-300">
                        <li>Our Repair and Replace Warranty applies to all unused items unless otherwise stated.</li>
                        <li>Used or modified items are sold as-is, and no warranty will be provided unless clearly noted on the product page.</li>
                    </ul>
                </section>

                <!-- 5. Express Shipping Guarantee -->
                <section id="shipping-guarantee" class="scroll-mt-32">
                    <h2 class="text-3xl font-semibold mb-4 text-gray-900 dark:text-white">5. Express Shipping Guarantee</h2>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 dark:text-gray-300">
                        <li>We aim to dispatch your order within 24 hours of payment.</li>
                        <li>If we fail, you’ll be refunded the express shipping fee in Bits only.</li>
                        <li>
                            Delivery times:<br>
                            – UK: Next working day<br>
                            – USA: 2–3 working days<br>
                            – Rest of World: 3–5 working days
                        </li>
                        <li>Once shipped, we are not responsible for courier delays.</li>
                    </ul>
                </section>

                <!-- 6. Use of Bits -->
                <section id="use-of-bits" class="scroll-mt-32">
                    <h2 class="text-3xl font-semibold mb-4 text-gray-900 dark:text-white">6. Use of Bits</h2>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 dark:text-gray-300">
                        <li>Bits are earned through interactions on the site (e.g., purchases, contributions).</li>
                        <li>Bits are not a currency and hold no real-world value.</li>
                        <li>Bits cannot be sold, traded, or transferred between accounts.</li>
                    </ul>
                </section>

                <!-- 7. Intellectual Property -->
                <section id="intellectual-property" class="scroll-mt-32">
                    <h2 class="text-3xl font-semibold mb-4 text-gray-900 dark:text-white">7. Intellectual Property</h2>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        All content, including logos, images, software, and text, remains the property of this website or its licensors. Do not reproduce or redistribute content without permission.
                    </p>
                </section>

                <!-- 8. Prohibited Use -->
                <section id="prohibited-use" class="scroll-mt-32">
                    <h2 class="text-3xl font-semibold mb-4 text-gray-900 dark:text-white">8. Prohibited Use</h2>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">You must not:</p>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 dark:text-gray-300">
                        <li>Violate any laws</li>
                        <li>Transmit malware, spam, or harmful code</li>
                        <li>Hack or disrupt services</li>
                        <li>Impersonate others or mislead users</li>
                        <li>Attempt to affect the website’s performance</li>
                    </ul>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">We will report any abuse to the relevant authorities.</p>
                </section>

                <!-- 9. Linked Sites -->
                <section id="linked-sites" class="scroll-mt-32">
                    <h2 class="text-3xl font-semibold mb-4 text-gray-900 dark:text-white">9. Linked Sites</h2>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        We are not responsible for external websites linked from our platform. Their terms apply separately.
                    </p>
                </section>

                <!-- 10. Terms of Sale -->
                <section id="terms-of-sale" class="scroll-mt-32">
                    <h2 class="text-3xl font-semibold mb-4 text-gray-900 dark:text-white">10. Terms of Sale</h2>
                    <p class="font-semibold text-gray-700 dark:text-gray-300">(a) Contract Formation</p>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">An order acknowledgment does not form a contract. A contract is only formed when we confirm dispatch.</p>
                    <p class="font-semibold text-gray-700 dark:text-gray-300">(b) Pricing</p>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">We strive for accuracy, but errors may occur. If pricing is incorrect, we will notify you before shipping.</p>
                    <p class="font-semibold text-gray-700 dark:text-gray-300">(c) Payment</p>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">All orders must be paid upfront. Card payments are authorized before shipping. Your card will be charged once authorization is successful.</p>
                    <p class="font-semibold text-gray-700 dark:text-gray-300">(d) Shipping</p>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">Nearly all items ship tracked regardless of destination. Shipping charges are shown at checkout.</p>
                </section>

                <!-- 11. Disclaimer of Liability -->
                <section id="liability-disclaimer" class="scroll-mt-32">
                    <h2 class="text-3xl font-semibold mb-4 text-gray-900 dark:text-white">11. Disclaimer of Liability</h2>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        We make no guarantees as to the accuracy of the content. We are not liable for any:
                    </p>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 dark:text-gray-300">
                        <li>Loss of data or profit</li>
                        <li>Business interruption</li>
                        <li>Damage caused by viruses or harmful content</li>
                    </ul>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">This does not affect liability for death, personal injury, or fraud.</p>
                </section>

                <!-- 12. External Links & Third-Party Rights -->
                <section id="third-party-rights" class="scroll-mt-32">
                    <h2 class="text-3xl font-semibold mb-4 text-gray-900 dark:text-white">12. External Links & Third-Party Rights</h2>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        Any logos, brands, or individuals shown on this site are used for identification purposes only. No affiliation or endorsement is implied unless clearly stated.
                    </p>
                </section>

                <!-- 13. Indemnity -->
                <section id="indemnity" class="scroll-mt-32">
                    <h2 class="text-3xl font-semibold mb-4 text-gray-900 dark:text-white">13. Indemnity</h2>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        You agree to defend, indemnify, and hold harmless this site and its operators, directors, employees, and affiliates from any claims, damages, or legal costs arising from your use of the site or breach of these terms.
                    </p>
                </section>

                <!-- 14. Site Changes -->
                <section id="site-changes" class="scroll-mt-32">
                    <h2 class="text-3xl font-semibold mb-4 text-gray-900 dark:text-white">14. Site Changes</h2>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        We reserve the right to change or remove content and services without notice.
                    </p>
                </section>

                <!-- 15. Invalidity Clause -->
                <section id="invalidity" class="scroll-mt-32">
                    <h2 class="text-3xl font-semibold mb-4 text-gray-900 dark:text-white">15. Invalidity Clause</h2>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        If any part of these terms is found to be invalid, the rest will remain enforceable. Where possible, invalid terms will be interpreted to reflect original intent.
                    </p>
                </section>

                <!-- 16. Complaints -->
                <section id="complaints" class="scroll-mt-32">
                    <h2 class="text-3xl font-semibold mb-4 text-gray-900 dark:text-white">16. Complaints</h2>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        If you have a complaint, please contact us through our <a href="#" class="text-purple-600 dark:text-purple-400 hover:underline">Discord channel</a> or via our support form. We aim to resolve issues quickly and fairly.
                    </p>
                </section>

                <!-- 17. Waiver -->
                <section id="waiver" class="scroll-mt-32">
                    <h2 class="text-3xl font-semibold mb-4 text-gray-900 dark:text-white">17. Waiver</h2>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        Failure to enforce any part of these terms does not waive our rights in future instances.
                    </p>
                </section>

                <!-- 18. Entire Agreement -->
                <section id="entire-agreement" class="scroll-mt-32">
                    <h2 class="text-3xl font-semibold mb-4 text-gray-900 dark:text-white">18. Entire Agreement</h2>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        These Terms and Conditions represent the full agreement between you and this website, replacing any previous agreements. Any changes must be in writing and signed by an authorized representative.
                    </p>
                </section>

            </div>
        </div>

        <!-- Footer Actions -->
        <div class="mt-8 text-center">
            <a href="{{ route('front.help.overview') }}"
               class="px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                Back to Help Center
            </a>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({ top: target.offsetTop - 100, behavior: 'smooth' });
                    history.pushState(null, null, this.getAttribute('href'));
                }
            });
        });
    });
</script>
@endsection
