<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
    <style type="text/css">
        /* Base Styles */
        .email-body {
            background-color: #f2f3f8;
            color: #333333;
            font-family: Arial, sans-serif;
            line-height: 1.5;
            padding: 20px 0;
        }
        .email-container {
            background-color: #ffffff;
            margin: 0 auto;
            max-width: 600px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }

        /* Header Styles */
        .email-header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
            margin-bottom: 20px;
        }

        /* Table Styles */
        .details-table, .product-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .details-table th, .details-table td, .product-table th, .product-table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .details-table th, .product-table th {
            background-color: #f4f4f4;
            color: #333;
            font-weight: bold;
        }
        .text-right {
            text-align: right;
        }

        /* Footer Styles */
        .email-footer {
            text-align: center;
            font-size: 14px;
            color: #666;
        }
        .d-flex {
            display: flex;
        }
        .align-items-center{
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="email-body">
        <div class="email-container">
            <!-- Email Header -->
            <div class="email-header">
                <img src="{{ URL::asset('assets/images/logo-lg.png') }}" alt="Logo" height="50">
                <h1>Order Confirmation</h1>
            </div>

            <!-- Order and Customer Details -->
            <table class="details-table">
                <tbody>
                    <tr>
                        <th>Invoice No:</th>
                        <td>{{ $order->order_number }}</td>
                        <th>Order Date:</th>
                        <td>{{ $order->created_at->format('j M, Y') }}</td>
                    </tr>
                    <tr>
                        <th>Customer Name:</th>
                        <td>{{ $order->user->name }}</td>
                        <th>Payment Status:</th>
                        <td>{{ ucfirst($order->payment_status) }}</td>
                    </tr>
                </tbody>
            </table>

            <!-- Product Details -->
            <div class="product-details">
                <h2>Product Details</h2>
                <table class="product-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Item Price</th>
                            <th>Quantity</th>
                            <th class="text-right">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                   

                        <!-- Table rows for each item -->
                        @foreach ($order->orderItems()->get() as $key=>$orderitem)
                            @php
                                $itemDetails = App\CentralLogics\Cart::getItemDetails($orderitem->item_type, $orderitem->item_id);
                            @endphp
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $itemDetails['photo'] }}" alt="Product Image" height="40" style="margin-right: 10px;">
                                        <span>{{ $itemDetails['name'] }}</span>
                                    </div>
                                    <p class="text-muted mb-0">ItemType: <span class="fw-medium">{{ ucwords(str_replace("_", " ", $orderitem->item_type)) }}</span></p>
                                </td>
                                <td>{{Helpers::setCurrency($orderitem->price)}}</td>
                                <td>{{ $orderitem->quantity }}</td>
                                <td class="text-right">{{Helpers::setCurrency($orderitem->price)}}</td>
                            </tr>
                        @endforeach

                        <!-- Subtotal, Discounts, Total Amount -->
                        <tr>
                            <td colspan="4" class="text-right">Sub Total :</td>
                            <td class="text-right">{{ Helpers::setCurrency($order->subtotal) }}</td>
                        </tr>
                        @if($order->subscription_discount > 0)
                            <tr>
                                <td colspan="4" class="text-right">Previous Subscription Discount :</td>
                                <td class="text-right">-{{ Helpers::setCurrency($order->subscription_discount) }}</td>
                            </tr>
                        @endif
                        @if($order->discount > 0)
                            <tr>
                                <td colspan="4" class="text-right">Discount ({{ $order->coupon_code }}) :</td>
                                <td class="text-right">-{{ Helpers::setCurrency($order->discount) }}</td>
                            </tr>
                        @endif
                        @if($order->checkout_fee > 0)
                            <tr>
                                <td colspan="4" class="text-right">Estimated Tax :</td>
                                <td class="text-right">{{ Helpers::setCurrency($order->checkout_fee) }}</td>
                            </tr>
                        @endif
                        <tr>
                            <td colspan="4" class="text-right"><strong>Total ({{ $gs->currency_code }}) :</strong></td>
                            <td class="text-right"><strong>{{ Helpers::setCurrency($order->pay_amount) }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Footer -->
            <div class="email-footer">
                Thank you for your order! If you have any questions, please feel free to contact us at {{ $gs->from_email }}.
            </div>
        </div>
    </div>
</body>
</html>
