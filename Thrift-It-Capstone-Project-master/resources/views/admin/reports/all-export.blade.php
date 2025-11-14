<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Export</title>
    <style>
        body { font-family: DejaVu Sans, Arial, sans-serif; font-size: 12px; color: #111827; }
        h1 { font-size: 20px; margin-bottom: 8px; }
        h2 { font-size: 16px; margin: 18px 0 8px; }
        table { width: 100%; border-collapse: collapse; margin-top: 8px; }
        th, td { border: 1px solid #e5e7eb; padding: 6px 8px; text-align: left; }
        th { background: #f3f4f6; font-weight: 700; }
        .muted { color: #6b7280; }
    </style>
    </head>
<body>
    <h1>Platform Export</h1>
    <p class="muted">Generated: {{ now()->format('Y-m-d H:i') }}</p>

    <h2>Users ({{ $users->count() }})</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Joined</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $u)
                <tr>
                    <td>{{ $u->id }}</td>
                    <td>{{ $u->fname }} {{ $u->lname }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Products ({{ $products->count() }})</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Seller</th>
                <th>Category</th>
                <th>Status</th>
                <th>Price</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ optional($p->user)->fname }} {{ optional($p->user)->lname }}</td>
                    <td>{{ optional($p->category)->name }}</td>
                    <td>{{ $p->status }}</td>
                    <td>{{ number_format($p->price, 2) }}</td>
                    <td>{{ $p->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Reports ({{ $reports->count() }})</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Reporter</th>
                <th>Reported User</th>
                <th>Reason</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $r)
                <tr>
                    <td>{{ $r->id }}</td>
                    <td>{{ optional($r->reporter)->fname }} {{ optional($r->reporter)->lname }}</td>
                    <td>{{ optional($r->reportedUser)->fname }} {{ optional($r->reportedUser)->lname }}</td>
                    <td>{{ $r->reason }}</td>
                    <td>{{ ucfirst($r->status) }}</td>
                    <td>{{ $r->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Monthly Sales - {{ $year }}</h2>
    <table>
        <thead>
            <tr>
                <th>Month</th>
                <th>Products Sold</th>
                <th>Total Revenue</th>
            </tr>
        </thead>
        <tbody>
            @for($m = 1; $m <= 12; $m++)
                <tr>
                    <td>{{ DateTime::createFromFormat('!m', $m)->format('F') }}</td>
                    <td>{{ optional($monthlySales->get($m))->total_products ?? 0 }}</td>
                    <td>{{ number_format(optional($monthlySales->get($m))->total_sales ?? 0, 2) }}</td>
                </tr>
            @endfor
        </tbody>
    </table>
</body>
</html>

