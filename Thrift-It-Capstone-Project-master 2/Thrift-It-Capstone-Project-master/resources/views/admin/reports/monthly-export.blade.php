<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Monthly Export - {{ $monthName }} {{ $year }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #111827; }
        h1, h2 { margin: 0 0 8px 0; }
        h1 { font-size: 18px; }
        h2 { font-size: 14px; margin-top: 16px; }
        table { width: 100%; border-collapse: collapse; margin-top: 8px; }
        th, td { border: 1px solid #E5E7EB; padding: 6px; text-align: left; }
        th { background: #F3F4F6; }
    </style>
    </head>
<body>
    <h1>Monthly Export - {{ $monthName }} {{ $year }}</h1>

    <h2>Users Registered</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Registered At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $u)
            <tr>
                <td>{{ $u->id }}</td>
                <td>{{ $u->fname }} {{ $u->lname }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->role === 2 ? 'Admin' : ($u->role === 1 ? 'Upcycler' : 'User') }}</td>
                <td>{{ $u->created_at->format('M d, Y') }}</td>
            </tr>
            @empty
            <tr><td colspan="5">No users registered this month.</td></tr>
            @endforelse
        </tbody>
    </table>

    <h2>Upcyclers Registered</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Registered At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($upcyclers as $u)
            <tr>
                <td>{{ $u->id }}</td>
                <td>{{ $u->fname }} {{ $u->lname }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->created_at->format('M d, Y') }}</td>
            </tr>
            @empty
            <tr><td colspan="4">No upcyclers registered this month.</td></tr>
            @endforelse
        </tbody>
    </table>

    <h2>Sold Products</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Seller</th>
                <th>Category</th>
                <th>Price</th>
                <th>Sold At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ optional($p->user)->fname }} {{ optional($p->user)->lname }}</td>
                <td>{{ optional($p->category)->name }}</td>
                <td>₱{{ number_format($p->price, 2) }}</td>
                <td>{{ $p->created_at->format('M d, Y') }}</td>
            </tr>
            @empty
            <tr><td colspan="6">No sold products this month.</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>

