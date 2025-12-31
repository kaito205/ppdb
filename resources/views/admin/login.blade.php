<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login - SMA ERHA Jatinagara</title>
    <link rel="icon" href="{{ asset('img/favicon.png') }}" sizes="32x32" type="image/png">
    
    <!-- Fonts & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #0e2e72;
            --accent-color: #ffd700;
        }
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            height: 100vh;
            overflow: hidden;
        }

        .login-container {
            height: 100vh;
            display: flex;
            overflow: hidden;
        }

        /* Left Side: Image/Branding */
        .brand-section {
            flex: 1;
            background: linear-gradient(135deg, rgba(14, 46, 114, 0.95), rgba(14, 46, 114, 0.8)),
                        url('{{ asset("img/hero-bg.webp") }}') center/cover no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            padding: 2rem;
            position: relative;
        }
        
        /* Decorative Pattern */
        .brand-section::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: radial-gradient(circle at 20% 20%, rgba(255,255,255,0.05) 1px, transparent 1px),
                              radial-gradient(circle at 80% 80%, rgba(255,255,255,0.05) 1px, transparent 1px);
            background-size: 40px 40px;
            opacity: 0.5;
        }

        .brand-content {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .brand-logo {
            width: 120px;
            height: 120px;
            object-fit: contain;
            filter: drop-shadow(0 0 20px rgba(255,215,0,0.3));
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        /* Right Side: Form */
        .form-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            background-color: white;
            position: relative;
            max-width: 600px;
            width: 100%;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 1rem;
        }

        .form-control {
            padding: 0.8rem 1rem;
            border-radius: 10px;
            border: 2px solid #e2e8f0;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(14, 46, 114, 0.1);
        }

        .btn-login {
            background: var(--primary-color);
            color: white;
            padding: 0.8rem;
            border-radius: 10px;
            font-weight: 600;
            width: 100%;
            border: none;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .btn-login:hover {
            background: #091f4d;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(14, 46, 114, 0.2);
        }

        /* Floating Input Labels */
        .form-floating > label {
            padding-left: 1rem;
            color: #64748b;
        }

        .alert-custom {
            border-radius: 10px;
            font-size: 0.9rem;
            border: none;
        }

        /* Mobile Responsive */
        @media (max-width: 991.98px) {
            .brand-section {
                display: none; /* Hide image on mobile for simpler look */
            }
            .form-section {
                flex: 1;
                max-width: 100%;
                background: white; 
                /* Add faint branding pattern for mobile background */
                background-image: radial-gradient(circle at top right, rgba(14,46,114,0.05), transparent 40%);
            }
        }
    </style>
</head>
<body>

    <div class="login-container">
        <!-- Branding Section (Desktop Only) -->
        <div class="brand-section">
            <div class="brand-content">
                <img src="{{ asset('img/logo.webp') }}" alt="SMA ERHA" class="brand-logo mb-4">
                <h2 class="fw-bold mb-2">SMA ERHA JATINAGARA</h2>
                <p class="text-white-50 fs-5">Administrator Portal</p>
                <div class="mt-4">
                    <span class="badge bg-white text-primary rounded-pill px-3 py-2 fw-medium shadow-sm">
                        <i class="bi bi-shield-check me-1"></i> Secure Access
                    </span>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="form-section">
            <div class="login-card">
                <div class="d-lg-none text-center mb-4">
                    <img src="{{ asset('img/logo.webp') }}" alt="SMA ERHA" width="80">
                </div>

                <div class="mb-5">
                    <h3 class="fw-bold text-dark mb-1">Selamat Datang 👋</h3>
                    <p class="text-secondary">Masuk untuk mengelola data sekolah.</p>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger alert-custom d-flex align-items-center mb-4 fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <div>{{ session('error') }}</div>
                    </div>
                @endif
                
                @if(session('success'))
                    <div class="alert alert-success alert-custom d-flex align-items-center mb-4 fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <div>{{ session('success') }}</div>
                    </div>
                @endif

                <form action="{{ route('login.admin.submit') }}" method="POST">
                    @csrf
                    
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required autofocus>
                        <label for="email">Email Address</label>
                        @error('email')
                            <div class="text-danger small mt-1 ps-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-4 position-relative">
                        <input type="password" class="form-control pe-5" id="password" name="password" placeholder="Password" required>
                        <label for="password">Password</label>
                        <button type="button" class="btn btn-link position-absolute top-50 end-0 translate-middle-y text-decoration-none text-secondary me-2" id="togglePassword" style="z-index: 5;">
                            <i class="bi bi-eye-slash fs-5"></i>
                        </button>
                    </div>

                    <button type="submit" class="btn btn-login mb-4">
                        MASUK DASHBOARD
                    </button>

                    <div class="text-center">
                        <a href="/" class="text-decoration-none text-secondary small hover-primary">
                            <i class="bi bi-arrow-left me-1"></i> Kembali ke Website Utama
                        </a>
                    </div>
                </form>

                <div class="mt-5 text-center text-muted small">
                    &copy; {{ date('Y') }} SMA ERHA Jatinagara. All rights reserved.
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            }
        });
    </script>

</body>
</html>
