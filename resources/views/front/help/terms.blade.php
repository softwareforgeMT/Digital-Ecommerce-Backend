@extends('front.help.layout')

@section('help-content')
<div class="p-8 prose prose-invert max-w-none">
    <h2 class="text-2xl font-bold mb-6">Terms of Service</h2>
    
    <div class="space-y-8">
        <!-- Introduction -->
        <section>
            <h3 class="text-xl font-bold mb-4">1. Introduction</h3>
            <p class="text-gray-400">
                By accessing and using OP Vault services ("Services"), you accept and agree to be bound by these Terms of Service ("Terms"). If you do not agree to these Terms, please do not use our Services.
            </p>
        </section>

        <!-- License & Usage -->
        <section>
            <h3 class="text-xl font-bold mb-4">2. License & Usage</h3>
            <div class="space-y-4 text-gray-400">
                <p>2.1. OP Vault grants you a personal, non-transferable license to use our software products.</p>
                <p>2.2. You agree not to:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li>Share, resell, or distribute access to your account</li>
                    <li>Attempt to reverse engineer or modify our software</li>
                    <li>Use the services for commercial purposes</li>
                    <li>Create unauthorized copies of our software</li>
                </ul>
            </div>
        </section>

        <!-- Account Responsibilities -->
        <section>
            <h3 class="text-xl font-bold mb-4">3. Account Responsibilities</h3>
            <div class="space-y-4 text-gray-400">
                <p>3.1. You are responsible for:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li>Maintaining the confidentiality of your account credentials</li>
                    <li>All activities occurring under your account</li>
                    <li>Ensuring your system meets our minimum requirements</li>
                    <li>Following our security guidelines and recommendations</li>
                </ul>
            </div>
        </section>

        <!-- Payment Terms -->
        <section>
            <h3 class="text-xl font-bold mb-4">4. Payment & Subscriptions</h3>
            <div class="space-y-4 text-gray-400">
                <p>4.1. Subscription fees are non-refundable except where required by law.</p>
                <p>4.2. We reserve the right to modify pricing with reasonable notice.</p>
                <p>4.3. Subscriptions automatically renew unless cancelled before the renewal date.</p>
            </div>
        </section>

        <!-- Termination -->
        <section>
            <h3 class="text-xl font-bold mb-4">5. Termination</h3>
            <div class="space-y-4 text-gray-400">
                <p>We reserve the right to terminate or suspend access to our Services:</p>
                <ul class="list-disc pl-6 space-y-2">
                    <li>For violation of these Terms</li>
                    <li>For sharing account credentials</li>
                    <li>For abusive behavior towards staff or community members</li>
                    <li>Without prior notice if necessary</li>
                </ul>
            </div>
        </section>

        <!-- Disclaimer -->
        <section>
            <h3 class="text-xl font-bold mb-4">6. Disclaimer</h3>
            <div class="p-4 bg-purple-500/5 border border-purple-500/20 rounded-lg text-gray-400">
                <p>Our services are provided "as is" without warranties of any kind. We are not responsible for any consequences resulting from the use of our services.</p>
            </div>
        </section>
    </div>
</div>
@endsection
