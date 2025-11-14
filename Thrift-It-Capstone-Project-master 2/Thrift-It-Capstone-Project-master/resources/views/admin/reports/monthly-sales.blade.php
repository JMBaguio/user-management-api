<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Monthly Sales Report - {{ $monthName }} {{ $year }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            color: #333;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .report-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #2d3748;
        }
        .header h1 {
            color: #2d3748;
            margin: 0 0 10px 0;
            font-size: 28px;
        }
        .header p {
            color: #718096;
            margin: 0;
            font-size: 16px;
        }
        .summary {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
            padding: 20px;
            background-color: #f7fafc;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }
        .summary-item {
            text-align: center;
            padding: 15px;
            background-color: white;
            border-radius: 6px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .summary-label {
            color: #718096;
            font-size: 14px;
            margin-bottom: 5px;
        }
        .summary-value {
            color: #2d3748;
            font-size: 24px;
            font-weight: bold;
        }
        .table-container {
            overflow-x: auto;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
        }
        th {
            background-color: #4a5568;
            color: white;
            text-align: left;
            padding: 12px 15px;
            font-weight: 600;
        }
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #e2e8f0;
        }
        tr:nth-child(even) {
            background-color: #f8fafc;
        }
        tr:hover {
            background-color: #edf2f7;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
            color: #718096;
        }
        .footer p {
            margin: 5px 0;
        }
        .print-button {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #4a5568;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        .print-button:hover {
            background-color: #2d3748;
        }
        @media print {
            body {
                background-color: white;
                padding: 0;
            }
            .report-container {
                box-shadow: none;
                padding: 0;
            }
            .print-button {
                display: none;
            }
            .summary {
                break-inside: avoid;
            }
            table {
                break-inside: auto;
            }
            tr {
                break-inside: avoid;
                break-after: auto;
            }
        }
    </style>
</head>
<body>
    <button onclick="window.print()" class="print-button">Print Report</button>
    
    <div class="report-container">
        <div class="header">
            <h1>Monthly Sales Report</h1>
            <p>{{ $monthName }} {{ $year }}</p>
        </div>

        <div class="summary">
            <div class="summary-item">
                <div class="summary-label">Total Sales</div>
                <div class="summary-value">₱{{ number_format($totalSales, 2) }}</div>
            </div>
            <div class="summary-item">
                <div class="summary-label">Total Products Sold</div>
                <div class="summary-value">{{ $totalProducts }}</div>
            </div>
            <div class="summary-item">
                <div class="summary-label">Average Price</div>
                <div class="summary-value">₱{{ $totalProducts > 0 ? number_format($totalSales / $totalProducts, 2) : '0.00' }}</div>
            </div>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Seller</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Date Sold</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->user->fname }} {{ $product->user->lname }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>₱{{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->created_at->format('M d, Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="footer">
            <p>Generated on {{ now()->format('F d, Y h:i A') }}</p>
            <p>Thrift-It Sales Report</p>
        </div>
    </div>
</body>
</html> 