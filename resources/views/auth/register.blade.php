<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - GlucoWise ML Screening</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #fff; color: #0f172a; margin: 0; }
        /* Flex-direction row-reverse puts the form on the right and image on the left */
        .split-layout { min-height: 100vh; display: flex; flex-wrap: wrap; flex-direction: row-reverse; }
        .split-form { width: 100%; display: flex; flex-direction: column; justify-content: center; padding: 3rem 2rem; }
        .split-image { display: none; width: 100%; background-image: url('{{ asset('img/hero_bg.jpg') }}'); background-size: cover; background-position: center; position: relative; }
        .split-image-overlay { position: absolute; inset: 0; background: linear-gradient(225deg, rgba(11,26,46,0.9) 0%, rgba(11,26,46,0.4) 100%); }
        
        @media (min-width: 992px) {
            .split-form { width: 45%; padding: 4rem 6rem; }
            .split-image { width: 55%; display: block; }
        }
        
        .form-control { border: 1px solid #e2e8f0; border-radius: 12px; padding: 0.8rem 1.2rem; background-color: #f8fafc; font-size: 1rem; transition: all 0.2s; }
        .form-control:focus { border-color: #0f172a; background-color: #fff; box-shadow: 0 0 0 4px rgba(15,23,42,0.1); }
        .form-label { font-weight: 600; font-size: 0.9rem; color: #334155; margin-bottom: 0.5rem; }
        
        .btn-primary { background-color: #0f172a; border: none; border-radius: 12px; font-weight: 600; padding: 0.9rem; font-size: 1rem; transition: background 0.2s; }
        .btn-primary:hover { background-color: #1e293b; }
        
        .brand-title { font-weight: 800; font-size: 1.75rem; letter-spacing: -0.5px; color: #0f172a; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 2rem; }
        .page-title { font-weight: 700; font-size: 2.25rem; letter-spacing: -0.02em; margin-bottom: 0.5rem; }
        .page-subtitle { color: #64748b; font-size: 1rem; margin-bottom: 2.5rem; }
    </style>
</head>
<body>
    <div class="split-layout">
        <!-- Form -->
        <div class="split-form">
            <a href="{{ url('/') }}" class="text-decoration-none text-muted mb-4 d-inline-flex align-items-center gap-2" style="font-size: 0.95rem; font-weight: 500;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                Kembali ke Beranda
            </a>

            <a href="{{ url('/') }}" class="brand-title">
                Gluco<span style="color: #3b82f6;">Wise</span>
            </a>
            
            <h1 class="page-title">Buat Akun Baru</h1>
            <p class="page-subtitle">Mulai langkah deteksi dini kesehatan Anda hari ini.</p>
            
            @if(session('error'))
                <div class="alert alert-danger" style="border-radius: 12px; border: none; background: #fef2f2; color: #ef4444; font-weight: 500;">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('register.post') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" placeholder="John Doe" required value="{{ old('name') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="nama@email.com" required value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="••••••••" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 mb-4">Daftar Akun</button>
            </form>
            
            <p class="text-center text-muted fw-medium mb-0">Sudah memiliki akun? <a href="{{ route('login') }}" class="text-primary text-decoration-none fw-bold">Masuk di sini</a></p>
        </div>
        
        <!-- Image Panel (Left Side) -->
        <div class="split-image">
            <div class="split-image-overlay"></div>
            <div class="position-absolute bottom-0 start-0 p-5 w-100" style="z-index: 2;">
                <h3 class="text-white fw-bold mb-2" style="font-size: 2.5rem; letter-spacing: -0.02em;">Kendalikan Kesehatan Anda</h3>
                <p class="text-white-50 fs-5 mb-4" style="max-width: 500px;">Kami menjamin kerahasiaan data medis Anda sepenuhnya. Bergabunglah dengan kami untuk memantau metrik kesehatan Anda secara berkala.</p>
            </div>
        </div>
    </div>
</body>
</html>
