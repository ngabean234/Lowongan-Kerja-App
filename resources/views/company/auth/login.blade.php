<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Perusahaan - LowKer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0F172A;
            color: white;
            min-height: 100vh;
        }
        .card {
            background-color: rgb(255, 255, 255);
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .btn-primary {
            background-color: #FFC107;
            border: none;
            padding: 10px 20px;
            font-weight: 500;
        }
        .btn-primary:hover {
            background-color: #E0A800;
        }
        .form-control:focus {
            border-color: #FFC107;
            box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25);
        }
        .card-title {
            color: #1a1a1a;
            font-weight: 600;
        }
        .form-label {
            color: #4a5568;
            font-weight: 500;
        }
        .text-warning {
            color: #FFC107 !important;
            text-decoration: none;
        }
        .text-warning:hover {
            color: #E0A800 !important;
            text-decoration: underline;
        }
        .company-icon {
            font-size: 2.5rem;
            color: #FFC107;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container min-vh-100 d-flex align-items-center justify-content-center py-5">
        <div class="row justify-content-center w-100">
            <div class="col-md-5">
                <div class="text-center mb-4">
                    <a href="{{ route('welcome') }}" class="text-white text-decoration-none">
                        <h1 class="h3">LowKer</h1>
                        <p class="text-white-50">Portal Lowongan Kerja Terpercaya</p>
                    </a>
                </div>

                <div class="card p-4">
                    <div class="text-center mb-4">
                        <i class="fas fa-building company-icon"></i>
                        <h2 class="card-title">Login Perusahaan</h2>
                    </div>

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('company.login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Perusahaan:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" id="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" required autofocus>
                            </div>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">Password:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" id="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" required>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mb-3">
                            <i class="fas fa-sign-in-alt me-2"></i>Masuk
                        </button>
                    </form>

                    <div class="text-center">
                        <p class="mb-0">Belum memiliki akun perusahaan?</p>
                        <a href="{{ route('company.register') }}" class="text-warning">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <p class="text-white-50 mb-0">Anda pelamar kerja?</p>
                    <a href="{{ route('login') }}" class="text-warning">Login sebagai Pelamar</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
