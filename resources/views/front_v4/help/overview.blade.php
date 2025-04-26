@extends('front.help.layout')

@section('help-content')
<div class="p-8">
    <h2 class="text-2xl font-bold mb-6">Welcome to OP Vault Support</h2>
    
    <!-- Quick Access Cards -->
    <div class="grid md:grid-cols-2 gap-6 mb-12">
        <div class="bg-purple-500/5 rounded-lg p-6 border border-purple-500/20 hover:bg-purple-500/10 transition-colors">
            <div class="flex items-start mb-4">
                <div class="bg-purple-500/10 p-3 rounded-lg mr-4">
                    <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold mb-2">Quick Start Guide</h3>
                    <p class="text-gray-400 mb-4">Get up and running with our comprehensive setup guides and tutorials.</p>
                    <a href="{{ route('front.help.guides') }}" class="inline-flex items-center text-purple-400 hover:text-purple-300">
                        View setup guides
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="bg-purple-500/5 rounded-lg p-6 border border-purple-500/20 hover:bg-purple-500/10 transition-colors">
            <div class="flex items-start mb-4">
                <div class="bg-purple-500/10 p-3 rounded-lg mr-4">
                    <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold mb-2">Common Questions</h3>
                    <p class="text-gray-400 mb-4">Find answers to frequently asked questions about our services.</p>
                    <a href="{{ route('front.help.faqs') }}" class="inline-flex items-center text-purple-400 hover:text-purple-300">
                        Browse FAQs
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Popular Topics -->
    <div class="mb-12">
        <h3 class="text-xl font-bold mb-6">Popular Topics</h3>
        <div class="grid md:grid-cols-3 gap-6">
            <!-- Installation -->
            <div class="bg-purple-500/5 rounded-lg p-5 border border-purple-500/20">
                <h4 class="font-medium mb-3">Installation & Setup</h4>
                <ul class="space-y-3 text-gray-400 text-sm">
                    <li class="flex items-center">
                        <span class="w-1.5 h-1.5 rounded-full bg-purple-400 mr-2"></span>
                        <a href="{{ route('front.help.guides') }}#installation" class="hover:text-purple-400">System Requirements</a>
                    </li>
                    <li class="flex items-center">
                        <span class="w-1.5 h-1.5 rounded-full bg-purple-400 mr-2"></span>
                        <a href="{{ route('front.help.guides') }}#setup" class="hover:text-purple-400">Initial Setup Guide</a>
                    </li>
                    <li class="flex items-center">
                        <span class="w-1.5 h-1.5 rounded-full bg-purple-400 mr-2"></span>
                        <a href="{{ route('front.help.guides') }}#antivirus" class="hover:text-purple-400">Antivirus Configuration</a>
                    </li>
                </ul>
            </div>

            <!-- Account & Billing -->
            <div class="bg-purple-500/5 rounded-lg p-5 border border-purple-500/20">
                <h4 class="font-medium mb-3">Account & Billing</h4>
                <ul class="space-y-3 text-gray-400 text-sm">
                    <li class="flex items-center">
                        <span class="w-1.5 h-1.5 rounded-full bg-purple-400 mr-2"></span>
                        <a href="{{ route('front.help.faqs') }}#subscription" class="hover:text-purple-400">Subscription Management</a>
                    </li>
                    <li class="flex items-center">
                        <span class="w-1.5 h-1.5 rounded-full bg-purple-400 mr-2"></span>
                        <a href="{{ route('front.help.faqs') }}#payment" class="hover:text-purple-400">Payment Methods</a>
                    </li>
                    <li class="flex items-center">
                        <span class="w-1.5 h-1.5 rounded-full bg-purple-400 mr-2"></span>
                        <a href="{{ route('front.help.faqs') }}#refund" class="hover:text-purple-400">Refund Policy</a>
                    </li>
                </ul>
            </div>

            <!-- Troubleshooting -->
            <div class="bg-purple-500/5 rounded-lg p-5 border border-purple-500/20">
                <h4 class="font-medium mb-3">Troubleshooting</h4>
                <ul class="space-y-3 text-gray-400 text-sm">
                    <li class="flex items-center">
                        <span class="w-1.5 h-1.5 rounded-full bg-purple-400 mr-2"></span>
                        <a href="{{ route('front.help.guides') }}#common-issues" class="hover:text-purple-400">Common Issues</a>
                    </li>
                    <li class="flex items-center">
                        <span class="w-1.5 h-1.5 rounded-full bg-purple-400 mr-2"></span>
                        <a href="{{ route('front.help.guides') }}#error-fixes" class="hover:text-purple-400">Error Code Fixes</a>
                    </li>
                    <li class="flex items-center">
                        <span class="w-1.5 h-1.5 rounded-full bg-purple-400 mr-2"></span>
                        <a href="{{ route('front.help.guides') }}#optimization" class="hover:text-purple-400">Performance Tips</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Getting Support -->
    <div class="card-glow rounded-xl p-6">
        <h3 class="text-xl font-bold mb-6">Getting Support</h3>
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Support Channels -->
            <div class="space-y-4">
                <h4 class="font-medium mb-2">Support Channels</h4>
                <div class="space-y-4">
                    <div class="flex items-center p-4 bg-purple-500/5 rounded-lg border border-purple-500/20">
                        <svg class="w-8 h-8 text-purple-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057 19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028 14.09 14.09 0 0 0 1.226-1.994.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.946 2.418-2.157 2.418z"/>
                        </svg>
                        <div class="ms-3">
                            <div class="font-medium">Discord Support</div>
                            <p class="text-sm text-gray-400">24/7 Live Support</p>
                        </div>
                    </div>
                    <div class="flex items-center p-4 bg-purple-500/5 rounded-lg border border-purple-500/20">
                        <svg class="w-6 h-6 text-purple-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <div>
                            <div class="font-medium">Email Support</div>
                            <p class="text-sm text-gray-400">support@opvault.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Support Hours -->
            <div class="space-y-4">
                <h4 class="font-medium mb-2">Support Hours</h4>
                <div class="space-y-3 text-sm text-gray-400">
                    <div class="flex justify-between py-2 border-b border-purple-500/20">
                        <span>Discord Support</span>
                        <span class="text-green-400">24/7</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-purple-500/20">
                        <span>Email Response Time</span>
                        <span>Within 24 hours</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-purple-500/20">
                        <span>Priority Support</span>
                        <span>Premium members</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
