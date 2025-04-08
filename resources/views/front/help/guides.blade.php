@extends('front.help.layout')

@section('help-content')
<div class="p-8">
    <h2 class="text-2xl font-bold mb-6">User Guides</h2>

    <!-- Getting Started Section -->
    <div class="space-y-8">
        <div class="card-glow rounded-xl p-6">
            <h3 class="text-xl font-bold mb-4">Getting Started</h3>
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Installation Steps -->
                <div class="space-y-4">
                    <div class="flex items-start space-x-4">
                        <div class="bg-purple-500/10 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium mb-2">Installation Guide</h4>
                            <div class="text-gray-400 text-sm space-y-2">
                                <ol class="list-decimal list-inside space-y-2">
                                    <li>Download the latest loader from your dashboard</li>
                                    <li>Turn off Real-time protection in Windows Security</li>
                                    <li>Extract the downloaded file to a secure location</li>
                                    <li>Run the loader as Administrator</li>
                                    <li>Enter your login credentials from your account</li>
                                    <li>Select your desired game and features</li>
                                </ol>
                                <div class="mt-4 p-4 bg-purple-500/5 rounded-lg border border-purple-500/20">
                                    <p class="text-yellow-400 font-medium">Important Note:</p>
                                    <p class="mt-1">Make sure to run the loader before launching your game</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- System Requirements -->
                <div class="space-y-4">
                    <div class="flex items-start space-x-4">
                        <div class="bg-purple-500/10 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium mb-2">System Requirements</h4>
                            <div class="space-y-3 text-gray-400 text-sm">
                                <div class="p-3 bg-purple-500/5 rounded-lg">
                                    <span class="font-medium">Operating System:</span>
                                    <p>Windows 10/11 (64-bit)</p>
                                </div>
                                <div class="p-3 bg-purple-500/5 rounded-lg">
                                    <span class="font-medium">CPU:</span>
                                    <p>Intel or AMD processor with SSE4.2</p>
                                </div>
                                <div class="p-3 bg-purple-500/5 rounded-lg">
                                    <span class="font-medium">Memory:</span>
                                    <p>8 GB RAM minimum</p>
                                </div>
                                <div class="p-3 bg-purple-500/5 rounded-lg">
                                    <span class="font-medium">Additional:</span>
                                    <p>Administrator access required</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Advanced Features -->
        <div class="card-glow rounded-xl p-6">
            <h3 class="text-xl font-bold mb-4">Advanced Features</h3>
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Feature Configuration -->
                <div class="space-y-4">
                    <div class="bg-purple-500/5 rounded-lg p-4 border border-purple-500/20">
                        <h4 class="font-medium mb-3">Aimbot Configuration</h4>
                        <ul class="space-y-2 text-gray-400 text-sm">
                            <li class="flex items-start">
                                <span class="w-1.5 h-1.5 rounded-full bg-purple-400 mt-1.5 mr-2"></span>
                                <span>Smooth Aim: Adjust values between 1-10 for natural movement</span>
                            </li>
                            <li class="flex items-start">
                                <span class="w-1.5 h-1.5 rounded-full bg-purple-400 mt-1.5 mr-2"></span>
                                <span>FOV Settings: Recommended 5-15 for optimal performance</span>
                            </li>
                            <li class="flex items-start">
                                <span class="w-1.5 h-1.5 rounded-full bg-purple-400 mt-1.5 mr-2"></span>
                                <span>Target Priority: Head > Body > Extremities</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- ESP Settings -->
                <div class="space-y-4">
                    <div class="bg-purple-500/5 rounded-lg p-4 border border-purple-500/20">
                        <h4 class="font-medium mb-3">ESP Features</h4>
                        <ul class="space-y-2 text-gray-400 text-sm">
                            <li class="flex items-start">
                                <span class="w-1.5 h-1.5 rounded-full bg-purple-400 mt-1.5 mr-2"></span>
                                <span>Player Box: Customizable colors and opacity</span>
                            </li>
                            <li class="flex items-start">
                                <span class="w-1.5 h-1.5 rounded-full bg-purple-400 mt-1.5 mr-2"></span>
                                <span>Distance Indicators: Adjustable range display</span>
                            </li>
                            <li class="flex items-start">
                                <span class="w-1.5 h-1.5 rounded-full bg-purple-400 mt-1.5 mr-2"></span>
                                <span>Health Bars: Real-time enemy health monitoring</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Troubleshooting -->
        <div class="card-glow rounded-xl p-6">
            <h3 class="text-xl font-bold mb-4">Troubleshooting</h3>
            <div class="space-y-4">
                <!-- Common Issues -->
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="bg-purple-500/5 rounded-lg p-4 border border-purple-500/20">
                        <h4 class="font-medium mb-3 text-red-400">Loader Won't Start</h4>
                        <ul class="space-y-2 text-gray-400 text-sm">
                            <li>1. Verify Windows Defender is disabled</li>
                            <li>2. Run as Administrator</li>
                            <li>3. Check for Windows updates</li>
                            <li>4. Reinstall Visual C++ Redistributable</li>
                        </ul>
                    </div>
                    
                    <div class="bg-purple-500/5 rounded-lg p-4 border border-purple-500/20">
                        <h4 class="font-medium mb-3 text-red-400">Game Crashes</h4>
                        <ul class="space-y-2 text-gray-400 text-sm">
                            <li>1. Update graphics drivers</li>
                            <li>2. Verify game file integrity</li>
                            <li>3. Close unnecessary background apps</li>
                            <li>4. Check Discord overlay settings</li>
                        </ul>
                    </div>
                </div>

                <!-- Support Info -->
                <div class="mt-6 p-4 bg-purple-500/5 rounded-lg border border-purple-500/20">
                    <div class="flex items-center space-x-3 mb-3">
                        <svg class="w-5 h-5 text-purple-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515..."/>
                        </svg>
                        <h4 class="font-medium">Need More Help?</h4>
                    </div>
                    <p class="text-gray-400 text-sm">
                        Join our Discord community for real-time support and troubleshooting assistance. Our team is available 24/7.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
