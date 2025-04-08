@extends('front.layouts.app')

@section('content')
<div class="relative bg-dark-purple min-h-screen py-16">
    <div class="hero-glow opacity-30"></div>
    <div class="container mx-auto px-4">
        <!-- Success / Error messages -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">{{ session('error') }}</div>
        @endif
        
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold mb-4 bg-gradient-to-r from-purple-400 to-purple-600 text-transparent bg-clip-text">
                Complete Your Subscription
            </h1>
            <p class="text-gray-400">Select your membership plan and complete the payment</p>
        </div>
        
        <!-- Checkout Form -->
        <form method="POST" action="{{ route('subscription.process.payment') }}" id="checkout-form">
            @csrf
            <div class="flex flex-col lg:flex-row gap-8 max-w-7xl mx-auto">
                <!-- Left Column: Subscription Plans & Payment Methods -->
                <div class="lg:w-2/3">
                    <div class="card-glow rounded-xl backdrop-blur-sm p-6">
                        <h2 class="text-xl font-bold mb-6">Select Your Plan</h2>
                        <div class="space-y-4">
                            @foreach($subscriptions as $plan)
                                <label class="relative block group">
                                    <input type="radio" name="subscription" value="{{ $plan->id }}" 
                                           data-name="{{ $plan->name }}"
                                           data-interval="{{ $plan->interval }}"
                                           class="subscription-radio peer sr-only"
                                           {{ $selectedPlan->id == $plan->id ? 'checked' : '' }}>
                                    <div class="p-6 rounded-lg border border-purple-500/20 cursor-pointer transition-all duration-300 group-hover:border-purple-500/30 peer-checked:bg-purple-500/10 peer-checked:border-purple-500/40">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h3 class="font-bold text-lg mb-1">{{ $plan->name }}</h3>
                                                <p class="text-gray-400">{{ $plan->description }}</p>
                                            </div>
                                            <div class="text-right">
                                                <span class="text-2xl font-bold text-purple-400">${{ \App\CentralLogics\Helpers::getPrice($plan->price, 1) }}</span>
                                                <p class="text-sm text-gray-400">/{{ $plan->interval }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="absolute -right-2 -top-2 w-6 h-6 rounded-full bg-purple-500 text-white hidden peer-checked:flex items-center justify-center transform scale-0 peer-checked:scale-100 transition-transform duration-200">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                                        </svg>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                        
                        <!-- Payment Methods -->
                        <div class="mt-8">
                            <h2 class="text-xl font-bold mb-6">Payment Method</h2>
                            <div class="grid grid-cols-2 gap-4">
                                <label class="relative block group">
                                    <input type="radio" name="payment_method" value="stripe" class="peer sr-only" checked>
                                    <div class="p-4 rounded-lg border border-purple-500/20 cursor-pointer text-center transition-all duration-300 peer-checked:bg-purple-500/10 peer-checked:border-purple-500/40">
                                        <span class="text-sm">Stripe</span>
                                    </div>
                                </label>
                                <label class="relative block group">
                                    <input type="radio" name="payment_method" value="paypal" class="peer sr-only">
                                    <div class="p-4 rounded-lg border border-purple-500/20 cursor-pointer text-center transition-all duration-300 peer-checked:bg-purple-500/10 peer-checked:border-purple-500/40">
                                        <span class="text-sm">PayPal</span>
                                    </div>
                                </label>
                                {{-- <label class="relative block group">
                                    <input type="radio" name="payment_method" value="alipay" class="peer sr-only">
                                    <div class="p-4 rounded-lg border border-purple-500/20 cursor-pointer text-center transition-all duration-300 peer-checked:bg-purple-500/10 peer-checked:border-purple-500/40">
                                        <span class="text-sm">AliPay</span>
                                    </div>
                                </label> --}}
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column: Order Summary -->
                <div class="lg:w-1/3">
                    <div class="card-glow rounded-xl backdrop-blur-sm p-6 sticky top-24">
                        <h2 class="text-xl font-bold mb-6">Order Summary</h2>
                        <div class="space-y-4">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-400">Plan</span>
                                <span class="font-medium subscription-name">{{ $selectedPlan->name }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-400">Duration</span>
                                <span class="font-medium subscription-duration">{{ $selectedPlan->interval }}</span>
                            </div>
                        </div>
                        
                        <!-- Coupon Input -->
                        <div class="mt-6">
                            <div class="flex space-x-2">
                                <input type="text" id="coupon-code" class="flex-1 bg-purple-500/5 border border-purple-500/20 rounded-lg px-4 py-2 focus:outline-none focus:border-purple-500/40" placeholder="Enter coupon code" value="{{ $appliedCoupon }}">
                                <button type="button" onclick="applyCoupon()" class="btn btn-secondary">Apply</button>
                            </div>
                            <p id="coupon-error" class="text-red-500 text-sm mt-1"></p>
                        </div>
                        
                        <!-- Price Breakdown -->
                        <div class="mt-6 space-y-3 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-400">Subtotal</span>
                                <span class="subscription-price">$ {{ \App\CentralLogics\Helpers::getPrice($totals['subtotal'], 1) }}</span>
                            </div>
                            <div class="flex justify-between" id="tax-row" style="{{ $totals['tax'] > 0 ? 'display: flex;' : 'display: none;' }}">
                                <span class="text-gray-400">Tax / Fee</span>
                                <span id="tax-fee">$ {{ \App\CentralLogics\Helpers::getPrice($totals['tax'], 1) }}</span>
                            </div>
                            <div class="flex justify-between" id="discount-row" style="{{ $totals['discount'] > 0 ? 'display: flex;' : 'display: none;' }}">
                                <span class="text-gray-400">Discount</span>
                                <span class="text-green-400" id="discount-amount">- $ {{ \App\CentralLogics\Helpers::getPrice($totals['discount'], 1) }}</span>
                            </div>
                            <div class="flex justify-between font-bold pt-3 border-t border-purple-500/20">
                                <span>Total</span>
                                <span class="text-xl text-purple-400" id="final-price">$ {{ \App\CentralLogics\Helpers::getPrice($totals['total'], 1) }}</span>
                            </div>
                        </div>
                        
                        <!-- Hidden fields -->
                        <input type="hidden" name="item_id" value="{{ $selectedPlan->id }}">
                        <input type="hidden" name="item_type" value="subscription_plan">
                        <input type="hidden" name="package_option" value="membership">
                        
                        <button type="submit" class="btn btn-primary w-full mt-6">Complete Purchase</button>
                        
                        <div class="mt-6 text-center text-sm text-gray-400">
                            <div class="flex items-center justify-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
                                </svg>
                                <span>Secure Checkout</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript for dynamic updates and preventing Enter key submission -->
<script>
function updatePrice() {
    const selectedRadio = document.querySelector('input[name="subscription"]:checked');
    if (!selectedRadio) return;
    const subscriptionId = selectedRadio.value;
    const couponCode = document.getElementById('coupon-code').value.trim();
    const paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
    
    fetch('{{ route("checkout.calculate") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            subscription_id: subscriptionId,
            coupon_code: couponCode,
            payment_method: paymentMethod
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            alert(data.error);
            return;
        }
        document.querySelector('.subscription-name').innerText = data.subscription_name;
        document.querySelector('.subscription-duration').innerText = data.subscription_interval;
        document.querySelector('.subscription-price').innerText = `$${data.price}`;
        
        if (data.tax > 0) {
            document.getElementById('tax-row').style.display = 'flex';
            document.getElementById('tax-fee').innerText = `$${data.tax}`;
        } else {
            document.getElementById('tax-row').style.display = 'none';
        }
        
        if (couponCode !== '') {
            if (data.coupon_valid) {
                document.getElementById('discount-row').style.display = 'flex';
                document.getElementById('discount-amount').innerText = `- $${data.discount}`;
                document.getElementById('coupon-error').innerText = '';
            } else {
                document.getElementById('discount-row').style.display = 'none';
                document.getElementById('coupon-error').innerText = data.coupon_message;
            }
        } else {
            document.getElementById('discount-row').style.display = 'none';
            document.getElementById('coupon-error').innerText = '';
        }
        document.getElementById('final-price').innerText = `$${data.final_price}`;
    })
    .catch(error => console.error('Error:', error));
}

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('input[name="subscription"]').forEach(radio => {
        radio.addEventListener('change', updatePrice);
    });
    document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
        radio.addEventListener('change', updatePrice);
    });
    const couponInput = document.getElementById('coupon-code');
    couponInput.addEventListener('blur', updatePrice);
    couponInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            updatePrice();
        }
    });
});

function applyCoupon() {
    updatePrice();
}
</script>
@endsection
