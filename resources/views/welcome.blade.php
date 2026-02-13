<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container min-vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow-sm p-4 text-center" style="max-width: 400px;">
        <h3 class="mb-3">Task Manager</h3>
        <p class="text-muted mb-4">Simple Task Management Application</p>

        <a href="{{ route('login') }}" class="btn btn-primary w-100 mb-2">Login</a>
        <a href="{{ route('register') }}" class="btn btn-outline-secondary w-100">Register</a>
    </div>
</div>

</body>
</html>
