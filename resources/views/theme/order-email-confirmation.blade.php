<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
</head>
<body>
    <h2>Order Confirmation</h2>

    <p>Thank you for your order. Below are the details of your order:</p>

    <p><strong>Order ID:</strong> {{ $order->id }}</p>
    <p><strong>Customer Name:</strong> {{ $order->customer_name }}</p>
    <p><strong>Order Total:</strong> ${{ $order->grandtotal }}</p>

    <p>For any inquiries regarding your order, please contact us at support@example.com.</p>

    <p>Thank you for shopping with us!</p>

    <p>Sincerely,<br> The Example Store Team</p>
</body>
</html>
