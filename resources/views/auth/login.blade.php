<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GlucoWise ML Screening</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #fff; color: #0f172a; margin: 0; }
        .split-layout { min-height: 100vh; display: flex; flex-wrap: wrap; }
        .split-form { width: 100%; display: flex; flex-direction: column; justify-content: center; padding: 3rem 2rem; }
        .split-image { display: none; width: 100%; background-image: url('{{ asset('img/hero_bg.jpg') }}'); background-size: cover; background-position: center; position: relative; }
        .split-image-overlay { position: absolute; inset: 0; background: linear-gradient(135deg, rgba(15,38,34,0.95) 0%, rgba(27,156,133,0.4) 100%); }
        
        @media (min-width: 992px) {
            .split-form { width: 45%; padding: 4rem 6rem; }
            .split-image { width: 55%; display: block; }
        }
        
        .form-control { border: 1px solid #e2e8f0; border-radius: 12px; padding: 0.8rem 1.2rem; background-color: #f8fafc; font-size: 1rem; transition: all 0.2s; }
        .form-control:focus { border-color: #1B9C85; background-color: #fff; box-shadow: 0 0 0 4px rgba(27,156,133,0.15); }
        .form-label { font-weight: 600; font-size: 0.9rem; color: #334155; margin-bottom: 0.5rem; }
        
        .btn-primary { background-color: #1B9C85; border: none; border-radius: 12px; font-weight: 600; padding: 0.9rem; font-size: 1rem; transition: background 0.2s; color: #fff;}
        .btn-primary:hover { background-color: #157e6b; color: #fff; }
        
        .brand-title { font-weight: 800; font-size: 1.75rem; letter-spacing: -0.5px; color: #0f172a; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; margin-bottom: 3rem; }
        .page-title { font-weight: 700; font-size: 2.25rem; letter-spacing: -0.02em; margin-bottom: 0.5rem; }
        .page-subtitle { color: #64748b; font-size: 1rem; margin-bottom: 2.5rem; }
    </style>
</head>
<body>
    <div class="split-layout">
        <div class="split-form">
            <a href="{{ url('/') }}" class="text-decoration-none text-muted mb-4 d-inline-flex align-items-center gap-2" style="font-size: 0.95rem; font-weight: 500;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                Kembali ke Beranda
            </a>

            <a href="{{ url('/') }}" class="brand-title">
                Gluco<span style="color: #1B9C85;">Wise</span>
            </a>
            
            <h1 class="page-title">Selamat Datang Kembali</h1>
            <p class="page-subtitle">Masuk untuk melanjutkan aktivitas skrining Anda.</p>
            


            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="mb-4">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="nama@email.com" required value="{{ old('email') }}">
                </div>
                <div class="mb-5">
                    <label class="form-label">Password</label>
                    <div class="position-relative">
                        <input type="password" id="passwordField" name="password" class="form-control pe-5" placeholder="••••••••" required>
                        <button type="button" class="btn position-absolute top-50 end-0 translate-middle-y border-0 bg-transparent text-muted px-3" onclick="togglePassword('passwordField', this)" tabindex="-1">
                            <svg class="eye-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                            <svg class="eye-slash-icon d-none" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                        </button>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100 mb-4">Masuk ke Akun</button>
            </form>
            
            <p class="text-center text-muted fw-medium mb-0">Belum memiliki akun? <a href="{{ route('register') }}" class="text-primary text-decoration-none fw-bold">Daftar sekarang</a></p>
        </div>
        
        <div class="split-image">
            <div class="split-image-overlay"></div>
            <div class="position-absolute bottom-0 start-0 p-5 w-100" style="z-index: 2;">
                <h3 class="text-white fw-bold mb-2" style="font-size: 2.5rem; letter-spacing: -0.02em;">Analisis Cerdas Presisi</h3>
                <p class="text-white-50 fs-5 mb-4" style="max-width: 500px;">Sistem pakar deteksi dini risiko Diabetes Tipe 2 menggunakan algoritma Machine Learning yang terkalibrasi dengan SOP Kemenkes RI.</p>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    <script>
        function togglePassword(inputId, btn) {
            const input = document.getElementById(inputId);
            const eyeIcon = btn.querySelector('.eye-icon');
            const eyeSlashIcon = btn.querySelector('.eye-slash-icon');
            if (input.type === 'password') {
                input.type = 'text';
                eyeIcon.classList.add('d-none');
                eyeSlashIcon.classList.remove('d-none');
            } else {
                input.type = 'password';
                eyeIcon.classList.remove('d-none');
                eyeSlashIcon.classList.add('d-none');
            }
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                Swal.fire({ icon: 'success', title: 'Berhasil', text: '{!! session('success') !!}', confirmButtonColor: '#1B9C85', customClass: { confirmButton: 'btn btn-primary' } });
            @endif
            @if(session('error'))
                Swal.fire({ icon: 'error', title: 'Gagal', text: '{!! session('error') !!}', confirmButtonColor: '#ef4444' });
            @endif
        });
    </script>
</body>
</html>
