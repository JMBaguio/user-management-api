<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Rejected</title>
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
            background-color: #e74c3c; /* red for rejection */
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
            background-color: #e74c3c; /* red button */
            color: #fff;
            padding: 12px 24px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #c0392b;
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
            <h2>Hi, {{ $product->user->name }} 😔</h2>

            <p>We reviewed your product <strong>{{ $product->name }}</strong>, and unfortunately, it has been <strong>rejected</strong> by our admin team.</p>

            <p>Please review our submission guidelines and make necessary adjustments if you wish to resubmit your product.</p>

            <a href="{{ url('/products') }}" class="btn" target="_blank">Browse Store</a>

            <p style="margin-top: 30px;">Thank you for being part of <strong>Thrift-IT</strong> — promoting sustainable fashion, one thrift at a time. 🌿</p>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            &copy; {{ date('Y') }} Thrift-IT. All rights reserved.
        </div>
    </div>
</body>
</html>
