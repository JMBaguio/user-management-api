<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Approved</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .email-container {
            max-width: 600px;
            background-color: #ffffff;
            margin: 40px auto;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        .email-header {
            background-color: #B59F84;
            padding: 25px;
            text-align: center;
        }

        .email-header img {
            max-width: 140px;
        }

        .email-body {
            padding: 30px 40px;
            text-align: center;
        }

        .email-body h2 {
            color: #333;
            font-size: 22px;
            margin-bottom: 10px;
        }

        .email-body p {
            color: #555;
            font-size: 15px;
            line-height: 1.6;
            margin: 10px 0;
        }

        .btn {
            display: inline-block;
            background-color: #B59F84;
            color: #fff;
            padding: 12px 24px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #a28d75;
        }

        .email-footer {
            background-color: #f2f2f2;
            text-align: center;
            padding: 15px;
            font-size: 13px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header with Logo -->
        <div class="email-header">
            <img src="{{ asset('images/thriftit-logo.png') }}" alt="Thrift-IT Logo">
        </div>

        <!-- Body -->
        <div class="email-body">
            <h2>Congratulations, {{ $product->user->name }}! 🎉</h2>

            <p>Your product <strong>{{ $product->name }}</strong> has been reviewed and <strong>approved</strong> by our admin team.</p>

            <p>It is now <strong>available in the Thrift-IT Store</strong> for other users to view and engage with.</p>

            <a href="{{ url('/products/' . $product->id) }}" class="btn text-black" target="_blank">View Product</a>

            <p style="margin-top: 30px;">Thank you for being part of <strong>Thrift-IT</strong> — promoting sustainable fashion, one thrift at a time. 🌿</p>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            &copy; {{ date('Y') }} Thrift-IT. All rights reserved.
        </div>
    </div>
</body>
</html>
