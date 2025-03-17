<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Job Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0F172A;
            color: white;
        }
        .card {
            background-color:rgb(255, 255, 255);
            border: none;
            border-radius: 10px;
        }
        .btn-primary {
            background-color: #FFC107;
            border: none;
        }
        .btn-primary:hover {
            background-color: #E0A800;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card p-4">
                    <h2 class="text-center mb-4">Login</h2>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Masuk</button>
                    </form>
                    <p class="text-center mt-3">Belum punya akun? <a href="{{ route('register') }}" class="text-warning">Daftar</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
