@if(session('showVerificationModal'))
    <!-- Verification Modal - Tailwind Version -->
    <div id="verificationModal" class="fixed inset-0 z-50 overflow-y-auto" 
         aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-black bg-opacity-75 backdrop-blur-sm transition-opacity"></div>

        <!-- Modal Container -->
        <div class="flex min-h-screen items-center justify-center p-4">
            <div class="relative w-full max-w-md">
                <!-- Modal Content -->
                <div class="card-glow relative rounded-xl overflow-hidden backdrop-blur-sm bg-dark-purple/95">
                    <div class="px-6 pt-8 pb-6">
                        <!-- Email Icon -->
                        <div class="mx-auto w-16 h-16 mb-6 rounded-full bg-purple-500/10 flex items-center justify-center">
                            <svg class="w-8 h-8 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>

                        <!-- Modal Header -->
                        <div class="text-center mb-6">
                            <h3 class="text-xl font-bold mb-2">Verify Your Email</h3>
                            <p class="text-gray-400">
                                Please enter the 4 digit code sent to 
                                <span class="text-purple-400">{{session('email')}}</span>
                            </p>
                        </div>

                        <!-- Verification Form -->
                        <form id="verify_account_modal" action="{{ route('user.verify.email') }}" method="POST">
                            @csrf
                            <input type="hidden" name="email" value="{{session('email')}}">
                            
                            <!-- Alert Container -->
                            <div id="alert-container" class="mb-4 hidden">
                                <div class="p-4 rounded-lg"></div>
                            </div>
                            
                            <!-- Verification Code Input -->
                            <div class="mb-6">
                                <label for="verification" class="block text-sm font-medium text-gray-400 mb-2">
                                    Verification Code
                                </label>
                                <input type="text" 
                                       class="w-full bg-purple-500/5 border border-purple-500/20 rounded-lg px-4 py-3 
                                              focus:outline-none focus:border-purple-500/40"
                                       id="verification" 
                                       name="token" 
                                       placeholder="Enter Verification Code">
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-full" id="verify-submit-btn">
                                <span class="inline-flex items-center">
                                    <span class="mr-2">Confirm</span>
                                    <svg id="loading-spinner" class="w-4 h-4 animate-spin hidden" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </span>
                            </button>
                        </form>

                        <!-- Resend Code -->
                        <div class="mt-6 text-center text-sm">
                            <p class="text-gray-400">
                                Didn't receive a code? 
                                <a href="javascript:;" 
                                   data-href="{{route('user.resend.verify', session('email'))}}"
                                   class="text-purple-400 hover:text-purple-300 resendcodelk">
                                    Resend
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('verify_account_modal');
            const submitBtn = document.getElementById('verify-submit-btn');
            const spinner = document.getElementById('loading-spinner');
            const alertContainer = document.getElementById('alert-container');
            const alertBox = alertContainer.querySelector('div');

            function showAlert(message, type) {
                alertBox.className = `p-4 rounded-lg ${
                    type === 'success' 
                        ? 'bg-green-500/10 border border-green-500/20 text-green-400' 
                        : 'bg-red-500/10 border border-red-500/20 text-red-400'
                }`;
                alertBox.textContent = message;
                alertContainer.classList.remove('hidden');
            }

            function setLoading(isLoading) {
                submitBtn.disabled = isLoading;
                spinner.classList.toggle('hidden', !isLoading);
                submitBtn.querySelector('span:first-child').textContent = isLoading ? 'Verifying...' : 'Confirm';
            }

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                setLoading(true);
                alertContainer.classList.add('hidden');

                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        email: form.querySelector('input[name="email"]').value,
                        token: form.querySelector('input[name="token"]').value
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showAlert(data.msg, 'success');
                        setTimeout(() => {
                            window.location.href = data.route;
                        }, 1500);
                    } else if (data.error) {
                        showAlert(data.error, 'error');
                        setLoading(false);
                    }
                })
                .catch(error => {
                    showAlert('An error occurred. Please try again.', 'error');
                    setLoading(false);
                });
            });

            // Handle resend code
            const resendLink = document.querySelector('.resendcodelk');
            if (resendLink) {
                resendLink.addEventListener('click', function(e) {
                    e.preventDefault();
                    const url = this.getAttribute('data-href');
                    this.textContent = 'Sending...';
                    this.style.pointerEvents = 'none';

                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                showAlert('Verification code resent successfully!', 'success');
                            } else {
                                showAlert('Failed to resend code. Please try again.', 'error');
                            }
                        })
                        .catch(error => {
                            showAlert('An error occurred. Please try again.', 'error');
                        })
                        .finally(() => {
                            this.textContent = 'Resend';
                            this.style.pointerEvents = 'auto';
                        });
                });
            }
        });
    </script>
    @endsection
@endif
