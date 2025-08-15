<!DOCTYPE html>
<html>
<head>
    <title>Odoo Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Odoo Users</h2>
        <table class="table">
            <thead>
                <tr><th>ID</th><th>Name</th><th>Email</th></tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user['id'] }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] ?? 'N/A' }}</td>
                    </tr>
                @empty
                    <tr><td colspan="3">No users found</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>