<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Yearly Sales Report - {{ $year }}</title>
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
        .yearly-summary {
            margin-bottom: 30px;
            padding: 20px;
            background-color: #f7fafc;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }
        .summary-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
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
        .monthly-section {
            margin-bottom: 30px;
            page-break-inside: avoid;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .monthly-header {
            background-color: #4a5568;
            padding: 15px 20px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .monthly-header h2 {
            margin: 0;
            font-size: 18px;
        }
        .monthly-summary {
            padding: 15px 20px;
            background-color: #f7fafc;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .monthly-stats {
            display: flex;
            gap: 20px;
        }
        .monthly-stat {
            text-align: center;
        }
        .monthly-stat-label {
            color: #718096;
            font-size: 12px;
            margin-bottom: 2px;
        }
        .monthly-stat-value {
            color: #2d3748;
            font-size: 16px;
            font-weight: bold;
        }
        .table-container {
            overflow-x: auto;
            padding: 0 20px 20px;
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
        .month-navigation {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 20px 0;
        }
        .month-nav-button {
            padding: 8px 15px;
            background-color: #4a5568;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        .month-nav-button:hover {
            background-color: #2d3748;
        }
        .month-nav-button.active {
            background-color: #2d3748;
            font-weight: bold;
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
            .print-button, .month-navigation {
                display: none;
            }
            .yearly-summary {
                break-inside: avoid;
            }
            .monthly-section {
                break-inside: avoid;
                box-shadow: none;
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
            <h1>Yearly Sales Report</h1>
            <p>{{ $year }}</p>
        </div>

        <div class="yearly-summary">
            <div class="summary-grid">
                @php
                    $totalYearlySales = 0;
                    $totalYearlyProducts = 0;
                    foreach($monthlyData as $data) {
                        $totalYearlySales += $data['totalSales'];
                        $totalYearlyProducts += $data['totalProducts'];
                    }
                @endphp
                <div class="summary-item">
                    <div class="summary-label">Total Yearly Sales</div>
                    <div class="summary-value">₱{{ number_format($totalYearlySales, 2) }}</div>
                </div>
                <div class="summary-item">
                    <div class="summary-label">Total Products Sold</div>
                    <div class="summary-value">{{ $totalYearlyProducts }}</div>
                </div>
                <div class="summary-item">
                    <div class="summary-label">Average Monthly Sales</div>
                    <div class="summary-value">₱{{ number_format($totalYearlySales / 12, 2) }}</div>
                </div>
                <div class="summary-item">
                    <div class="summary-label">Average Products per Month</div>
                    <div class="summary-value">{{ round($totalYearlyProducts / 12) }}</div>
                </div>
            </div>
        </div>

        <div class="month-navigation">
            @foreach($monthlyData as $month => $data)
                @if($data['totalProducts'] > 0)
                    <button class="month-nav-button" onclick="scrollToMonth('month-{{ $month }}')">
                        {{ $data['month'] }}
                    </button>
                @endif
            @endforeach
        </div>

        @foreach($monthlyData as $month => $data)
            @if($data['totalProducts'] > 0)
                <div id="month-{{ $month }}" class="monthly-section">
                    <div class="monthly-header">
                        <h2>{{ $data['month'] }} {{ $year }}</h2>
                    </div>
                    <div class="monthly-summary">
                        <div class="monthly-stats">
                            <div class="monthly-stat">
                                <div class="monthly-stat-label">Total Sales</div>
                                <div class="monthly-stat-value">₱{{ number_format($data['totalSales'], 2) }}</div>
                            </div>
                            <div class="monthly-stat">
                                <div class="monthly-stat-label">Products Sold</div>
                                <div class="monthly-stat-value">{{ $data['totalProducts'] }}</div>
                            </div>
                            <div class="monthly-stat">
                                <div class="monthly-stat-label">Average Price</div>
                                <div class="monthly-stat-value">₱{{ $data['totalProducts'] > 0 ? number_format($data['totalSales'] / $data['totalProducts'], 2) : '0.00' }}</div>
                            </div>
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
                                @foreach($data['products'] as $product)
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
                </div>
            @endif
        @endforeach

        <div class="footer">
            <p>Generated on {{ now()->format('F d, Y h:i A') }}</p>
            <p>Thrift-It Sales Report</p>
        </div>
    </div>

    <script>
        function scrollToMonth(monthId) {
            const element = document.getElementById(monthId);
            if (element) {
                element.scrollIntoView({ behavior: 'smooth' });
                // Update active button
                document.querySelectorAll('.month-nav-button').forEach(btn => {
                    btn.classList.remove('active');
                });
                event.target.classList.add('active');
            }
        }
    </script>
</body>
</html> 