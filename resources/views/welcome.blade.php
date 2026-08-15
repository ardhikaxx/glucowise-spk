<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GlucoWise ML Screening</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0f172a;
            --bg-body: #f4f7f9;
        }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: var(--bg-body); color: #0f172a; margin: 0; }
        
        .hero-wrapper {
            margin: 1.25rem;
            margin-top: 2rem;
            border-radius: 36px;
            overflow: hidden;
            position: relative;
            background-color: #0f2622;
            background-image: url('{{ asset('img/hero_bg.jpg') }}');
            background-size: cover;
            background-position: center;
            min-height: 88vh;
            display: flex;
            flex-direction: column;
            padding-top: 4rem; /* space for capsule */
        }
        .hero-overlay {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(90deg, rgba(15,38,34,0.95) 0%, rgba(15,38,34,0.8) 40%, rgba(27,156,133,0.3) 100%);
            z-index: 1;
        }
        .hero-content {
            position: relative;
            z-index: 2;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        /* Floating Capsule Navbar */
        .navbar-capsule {
            position: sticky;
            top: 1.5rem;
            z-index: 1050;
            margin: 1.5rem auto -4rem auto; /* pull down hero wrapper */
            max-width: 90%;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-radius: 50px;
            padding: 0.8rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,255,255,1);
        }
        
        @media (max-width: 991px) {
            .navbar-capsule {
                max-width: 95%;
                padding: 0.8rem 1.5rem;
            }
        }

        /* Navbar inside Hero */
        .hero-navbar {
            padding: 2rem 3.5rem;
        }
        .hero-navbar .nav-link { color: rgba(255,255,255,0.85); font-weight: 500; font-size: 0.95rem; }
        .hero-navbar .nav-link:hover { color: #fff; }
        .hero-brand { color: #fff; font-weight: 800; font-size: 1.75rem; text-decoration: none; letter-spacing: -0.5px; }
        
        .btn-pill-dark { background-color: #0f172a; color: #fff; border-radius: 50px; font-weight: 600; padding: 0.7rem 1.75rem; border: none; font-size: 0.95rem; transition: background 0.3s; }
        .btn-pill-dark:hover { background-color: #1e293b; color: #fff; }
        .btn-pill-outline { background-color: transparent; border: 1px solid rgba(255,255,255,0.4); color: #fff; border-radius: 50px; font-weight: 500; padding: 0.7rem 2rem; transition: all 0.3s; font-size: 1rem; }
        .btn-pill-outline:hover { background-color: rgba(255,255,255,0.1); color: #fff; border-color: #fff; }
        
        /* User Icons */
        .auth-circle { width: 40px; height: 40px; border-radius: 50%; background: rgba(255,255,255,0.15); display: flex; align-items: center; justify-content: center; color: #fff; text-decoration: none; transition: background 0.3s; }
        .auth-circle:hover { background: rgba(255,255,255,0.25); color: #fff; }

        /* Hero Text */
        .hero-main-text {
            padding: 0 3.5rem;
            margin-top: auto;
            margin-bottom: auto;
            max-width: 850px;
        }
        .hero-title { font-size: 5.5rem; font-weight: 800; color: #fff; line-height: 1.05; letter-spacing: -0.03em; margin-bottom: 1.5rem; }
        .hero-subtitle { font-size: 1.15rem; color: rgba(255,255,255,0.85); line-height: 1.6; max-width: 500px; margin-bottom: 2.5rem; }
        
        /* Hero Footer Widgets */
        .hero-widgets {
            padding: 2.5rem 3.5rem;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }
        .location-pill { background: rgba(255,255,255,0.1); backdrop-filter: blur(8px); border-radius: 50px; padding: 0.75rem 1.75rem; color: #fff; font-size: 0.9rem; display: inline-flex; align-items: center; gap: 1rem; border: 1px solid rgba(255,255,255,0.05); }
        .social-icons { display: flex; gap: 0.6rem; }
        .social-circle { width: 40px; height: 40px; border-radius: 50%; background: #fff; display: flex; align-items: center; justify-content: center; color: #0f172a; text-decoration: none; font-weight: 700; transition: transform 0.2s; font-size: 0.9rem;}
        .social-circle:hover { transform: translateY(-2px); }

        /* Section 2: What we do */
        .section-title { font-size: 3rem; font-weight: 700; text-align: center; margin-bottom: 4rem; margin-top: 6rem; letter-spacing: -0.02em; color: #0f172a;}
        
        .feature-card {
            background-color: #fff;
            border-radius: 36px;
            padding: 3.5rem;
            border: none;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .feature-title { font-size: 2.5rem; font-weight: 700; line-height: 1.1; margin-bottom: 2.5rem; letter-spacing: -0.02em; color: #0f172a; }
        
        .feature-list { list-style: none; padding-left: 0; margin-bottom: 3.5rem; flex-grow: 1; }
        .feature-list li { position: relative; padding-left: 1.5rem; margin-bottom: 1rem; color: #475569; font-size: 1rem; line-height: 1.5; }
        .feature-list li::before { content: "•"; position: absolute; left: 0; color: #0f172a; font-weight: bold; font-size: 1.2rem; line-height: 1.2;}
        
        /* Custom image placeholders for cards */
        .card-img-placeholder { width: 140px; height: auto; position: absolute; right: 3rem; top: 50%; transform: translateY(-50%); opacity: 0.85; filter: drop-shadow(0 10px 15px rgba(0,0,0,0.1)); }
        .card-relative { position: relative; }
        
        @media (max-width: 1200px) {
            .hero-title { font-size: 4.5rem; }
        }
        @media (max-width: 991px) {
            .hero-title { font-size: 3.5rem; }
            .hero-wrapper { margin: 0; border-radius: 0; min-height: 100vh; }
            .hero-navbar, .hero-main-text, .hero-widgets { padding-left: 1.5rem; padding-right: 1.5rem; }
            .hero-navbar { padding-top: 1rem; }
            .feature-card { padding: 2.5rem; }
            .hero-main-text, .hero-widgets { padding-left: 1.5rem; padding-right: 1.5rem; }
        }
    </style>
</head>
<body>

    <!-- Floating Capsule Navbar -->
    <nav class="navbar-capsule">
        <a href="#" class="hero-brand d-flex align-items-center gap-1" style="color: #0f172a;">
            Gluco<span style="color: #1B9C85; font-weight: 500;">Wise</span>
        </a>
        
        <div class="d-flex align-items-center gap-3">
            @auth
                <a href="{{ route('dashboard') }}" class="btn-pill-dark" style="background: #0f172a;">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-decoration-none fw-bold" style="color: #0f172a;">Masuk</a>
                <a href="{{ route('register') }}" class="btn-pill-dark">Mulai Skrining</a>
            @endauth
        </div>
    </nav>

    <!-- Hero Wrapper mimicking the reference image -->
    <div class="hero-wrapper shadow-lg">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <!-- Main Hero Text -->
            <div class="hero-main-text">
                <h1 class="hero-title" style="font-size: clamp(3rem, 5vw, 5.5rem);">GlucoWise<br>ML Screening</h1>
                <p class="hero-subtitle">Machine Learning-Based Early Screening for Type 2 Diabetes Mellitus.</p>
                <a href="{{ route('screening.form') }}" class="btn-pill-outline text-decoration-none">Selengkapnya</a>
            </div>

            <!-- Bottom Widgets -->
            <div class="hero-widgets">
                <div class="location-pill">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                    <span>Machine Learning-Based Early Screening<br>for Type 2 Diabetes Mellitus</span>
                </div>
            </div>
        </div>
    </div>


    <!-- How it Works Section -->
    <div class="container py-5 mt-5 mb-5" id="how-it-works">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="font-size: 2.5rem; letter-spacing: -0.02em; color: #0f172a;">Cara Kerja AI Kami</h2>
            <p class="text-muted fs-5">Skrining cerdas dalam tiga langkah sederhana.</p>
        </div>
        
        <div class="row g-4 justify-content-center">
            <!-- Step 1 -->
            <div class="col-md-4">
                <div class="card h-100 p-4 border-0 shadow-sm" style="border-radius: 24px; background: #fff;">
                    <div class="mb-4 d-inline-flex align-items-center justify-content-center text-primary" style="width: 64px; height: 64px; background: #eff6ff; border-radius: 16px;">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    </div>
                    <h4 class="fw-bold mb-3" style="color: #0f172a;">1. Isi Kuesioner Medis</h4>
                    <p class="text-muted mb-0">Jawab pertanyaan singkat mengenai gaya hidup dan riwayat kesehatan sesuai standar pedoman Kementerian Kesehatan.</p>
                </div>
            </div>
            <!-- Step 2 -->
            <div class="col-md-4">
                <div class="card h-100 p-4 border-0 shadow-sm" style="border-radius: 24px; background: #fff;">
                    <div class="mb-4 d-inline-flex align-items-center justify-content-center" style="width: 64px; height: 64px; background: #fdf4ff; color: #d946ef; border-radius: 16px;">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6.01" y2="6"></line><line x1="6" y1="18" x2="6.01" y2="18"></line></svg>
                    </div>
                    <h4 class="fw-bold mb-3" style="color: #0f172a;">2. Analisis AI Instan</h4>
                    <p class="text-muted mb-0">Algoritma <i>Machine Learning</i> kami memproses ratusan variabel data Anda secara <i>real-time</i> untuk mengukur level risiko.</p>
                </div>
            </div>
            <!-- Step 3 -->
            <div class="col-md-4">
                <div class="card h-100 p-4 border-0 shadow-sm" style="border-radius: 24px; background: #fff;">
                    <div class="mb-4 d-inline-flex align-items-center justify-content-center" style="width: 64px; height: 64px; background: #f0fdf4; color: #16a34a; border-radius: 16px;">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                    </div>
                    <h4 class="fw-bold mb-3" style="color: #0f172a;">3. Hasil & Rekomendasi</h4>
                    <p class="text-muted mb-0">Terima laporan risiko komprehensif beserta panduan langkah pencegahan personal atau anjuran rujukan medis.</p>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="text-center py-4 text-muted small border-top" style="background: transparent;">
        <p class="mb-0">&copy; {{ date('Y') }} GlucoWise ML Screening. Hak Cipta Dilindungi.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
