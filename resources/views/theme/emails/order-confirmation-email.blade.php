<div>
    <p>Dear {{ $name }},</p>
    <p>Thank you for your order. Your order has been received. Please wait for an order confirmation call.</p>
    <p>Please visit this link for order details: <a href='https://contact.irhawears.com/order-confirmaton/{{ $order->tracking_id }}'>Click Here</a></p>
    <p>Here are the details of your purchase:</p>
    <p>Order ID: {{ $order->tracking_id }}</p>
    <p>Date: {{ $order->created_at->format('Y-m-d') }}</p>
    <p>Total Amount: {{ $order->grandtotal }}</p>
    <p>If you have any questions or concerns about your order, feel free to contact us at [Your Contact Email] or call us at [Your Contact Phone Number].</p>
    <p>Thank you for shopping with us!</p>
    <p>Sincerely,</p>
    <p>[Your Company Name]</p>
</div>