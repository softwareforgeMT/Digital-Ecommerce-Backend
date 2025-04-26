@extends('front.help.layout')

@section('help-content')
<div class="p-8 prose prose-invert max-w-none">
    <h2 class="text-2xl font-bold mb-6">Privacy Policy</h2>
    
    <div class="space-y-8">
        <!-- Introduction -->
        <section>
            <h3 class="text-xl font-bold mb-4">1. Information Collection</h3>
            <div class="space-y-4 text-gray-400">
                <p>We collect the following information:</p>
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="bg-purple-500/5 p-4 rounded-lg border border-purple-500/20">
                        <h4 class="font-medium mb-2">Account Information</h4>
                        <ul class="list-disc pl-4 space-y-1">
                            <li>Email address</li>
                            <li>Username</li>
                            <li>Password (encrypted)</li>
                            <li>IP address</li>
                        </ul>
                    </div>
                    <div class="bg-purple-500/5 p-4 rounded-lg border border-purple-500/20">
                        <h4 class="font-medium mb-2">Technical Data</h4>
                        <ul class="list-disc pl-4 space-y-1">
                            <li>Hardware configuration</li>
                            <li>Operating system</li>
                            <li>Device identifiers</li>
                            <li>Usage statistics</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Data Usage -->
        <section>
            <h3 class="text-xl font-bold mb-4">2. How We Use Your Data</h3>
            <div class="space-y-4 text-gray-400">
                <p>Your information is used to:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li>Provide and maintain our services</li>
                    <li>Improve our anti-detection systems</li>
                    <li>Process payments and subscriptions</li>
                    <li>Communicate important updates</li>
                    <li>Prevent fraud and abuse</li>
                </ul>
            </div>
        </section>

        <!-- Data Security -->
        <section>
            <h3 class="text-xl font-bold mb-4">3. Data Security</h3>
            <div class="bg-purple-500/5 p-6 rounded-lg border border-purple-500/20 space-y-4 text-gray-400">
                <p>We implement industry-standard security measures:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li>End-to-end encryption for sensitive data</li>
                    <li>Regular security audits and updates</li>
                    <li>Secure payment processing</li>
                    <li>Limited staff access to user data</li>
                </ul>
            </div>
        </section>

        <!-- Data Retention -->
        <section>
            <h3 class="text-xl font-bold mb-4">4. Data Retention</h3>
            <div class="space-y-4 text-gray-400">
                <p>We retain your information:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li>Account data: As long as your account is active</li>
                    <li>Payment information: As required by law</li>
                    <li>Usage data: Up to 90 days</li>
                    <li>Technical logs: 30 days</li>
                </ul>
            </div>
        </section>

        <!-- User Rights -->
        <section>
            <h3 class="text-xl font-bold mb-4">5. Your Rights</h3>
            <div class="grid md:grid-cols-2 gap-4">
                <div class="bg-purple-500/5 p-4 rounded-lg border border-purple-500/20">
                    <h4 class="font-medium mb-2">Access Rights</h4>
                    <ul class="list-disc pl-4 text-gray-400 space-y-1">
                        <li>Request your data copy</li>
                        <li>Update your information</li>
                        <li>Delete your account</li>
                        <li>Export your data</li>
                    </ul>
                </div>
                <div class="bg-purple-500/5 p-4 rounded-lg border border-purple-500/20">
                    <h4 class="font-medium mb-2">Control Options</h4>
                    <ul class="list-disc pl-4 text-gray-400 space-y-1">
                        <li>Opt-out of communications</li>
                        <li>Manage cookies</li>
                        <li>Restrict data processing</li>
                        <li>Cancel subscriptions</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Contact Information -->
        <section>
            <h3 class="text-xl font-bold mb-4">6. Contact Us</h3>
            <div class="p-4 bg-purple-500/5 border border-purple-500/20 rounded-lg text-gray-400">
                <p>For privacy-related inquiries, contact us through:</p>
                <ul class="list-disc pl-6 mt-2">
                    <li>Discord Support Channel</li>
                    <li>Email: privacy@opvault.com</li>
                </ul>
            </div>
        </section>
    </div>
</div>
@endsection
