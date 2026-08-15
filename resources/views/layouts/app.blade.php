<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GlucoWise ML Screening</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #fafafa; color: #111827; }
        .card { border: 1px solid #e5e7eb; border-radius: 12px; background: #fff; box-shadow: none !important; }
        .btn-primary { background-color: #1B9C85; border-color: #1B9C85; border-radius: 8px; font-weight: 500; padding: 0.5rem 1rem; color: #fff; }
        .btn-primary:hover { background-color: #157e6b; border-color: #157e6b; color: #fff; }
        .btn-outline-primary { color: #1B9C85; border-color: #1B9C85; border-radius: 8px; font-weight: 500; padding: 0.5rem 1rem; background: #fff; }
        .btn-outline-primary:hover { background-color: #1B9C85; color: #fff; border-color: #1B9C85; }
        .btn-danger { background-color: #ef4444; border-color: #ef4444; border-radius: 8px; font-weight: 500;}
        .form-control, .form-select { border: 1px solid #e5e7eb; border-radius: 8px; padding: 0.6rem 1rem; box-shadow: none !important; background-color: #fafafa; }
        .form-control:focus, .form-select:focus { border-color: #1B9C85; background-color: #fff; box-shadow: 0 0 0 0.2rem rgba(27,156,133,0.2) !important; }
        .table { border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden; margin-bottom: 0; }
        th { font-weight: 600; color: #4b5563; background-color: #f9fafb !important; border-bottom: 1px solid #e5e7eb !important; border-top: 0 !important; }
        td { color: #111827; border-bottom: 1px solid #e5e7eb !important; vertical-align: middle; }
        .sidebar-bg { background-color: #f8fafc; border-right: 1px solid #f1f5f9; box-shadow: 2px 0 20px rgba(0,0,0,0.02); }
        .nav-pills .nav-link { color: #64748b; border-radius: 12px; font-weight: 500; padding: 0.8rem 1.25rem; margin-bottom: 0.5rem; transition: all 0.2s ease; display: flex; align-items: center; gap: 0.75rem; }
        .nav-pills .nav-link.active { background-color: #1B9C85; color: #fff; font-weight: 600; box-shadow: 0 4px 15px rgba(27,156,133,0.25); }
        .nav-pills .nav-link:hover:not(.active) { background-color: #f1f5f9; color: #0f172a; transform: translateX(5px); }
        .sidebar-heading { font-size: 0.7rem; font-weight: 700; letter-spacing: 1px; color: #94a3b8; text-transform: uppercase; margin-top: 2rem; margin-bottom: 0.75rem; padding-left: 1.25rem; }
        .bottom-nav { background: #fff; border-top: 1px solid #e5e7eb; }
        .bottom-nav-item { color: #6b7280; font-weight: 500; padding: 0.5rem; border-radius: 8px; }
        .bottom-nav-item.active { color: #1B9C85; background-color: #e6f2f0; }
        
        .progress-bar-flat { background-color: #1B9C85; border-radius: 999px; }
        .progress-bg-flat { background-color: #e6f2f0; border-radius: 999px; height: 8px; }
        
        .badge-flat { padding: 0.35rem 0.75rem; border-radius: 6px; font-weight: 500; border: 1px solid; }
        .badge-danger-flat { background-color: #fef2f2; color: #ef4444; border-color: #fee2e2; }
        .badge-success-flat { background-color: #f0fdf4; color: #22c55e; border-color: #dcfce7; }
        .badge-info-flat { background-color: #eff6ff; color: #3b82f6; border-color: #bfdbfe; }
    </style>
</head>
<body>
    @role('admin')
        <!-- ================= ADMIN LAYOUT (SIDEBAR) ================= -->
        <div class="d-flex" style="min-height: 100vh;">
            <!-- Sidebar -->
            <div class="sidebar-bg d-flex flex-column p-4 vh-100 position-sticky top-0" style="width: 280px; overflow-y: auto;">
                <a href="{{ url('/') }}" class="d-flex align-items-center mb-5 text-decoration-none">
                    <span class="fs-4 fw-bold text-dark" style="letter-spacing: -0.5px;">GlucoWise ML Screening</span>
                </a>
                
                <ul class="nav nav-pills flex-column mb-auto mt-2">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-heading">PENGUJIAN ML</li>
                    <li class="nav-item">
                        <a href="{{ route('admin.training.index') }}" class="nav-link {{ request()->routeIs('admin.training.*') ? 'active' : '' }}">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                            Data Latih
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.ml.index') }}" class="nav-link {{ request()->routeIs('admin.ml.*') ? 'active' : '' }}">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 3v4M15 3v4M4 14l3.5-3.5M16.5 10.5L20 14M12 11v6"></path><circle cx="12" cy="12" r="9"></circle></svg>
                            Laboratorium ML
                        </a>
                    </li>
                    <li class="sidebar-heading">SISTEM</li>
                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            Pengguna
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.articles.index') }}" class="nav-link {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            Artikel Edukasi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.audit_logs.index') }}" class="nav-link {{ request()->routeIs('admin.audit_logs.*') ? 'active' : '' }}">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            Audit Log
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                            Pengaturan
                        </a>
                    </li>
                </ul>
                
                <div class="mt-auto border-top pt-4">
                    <div class="mb-3">
                        <small class="text-muted d-block" style="font-size: 0.75rem;">Masuk sebagai:</small>
                        <strong class="text-dark">{{ auth()->user()->name }}</strong>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-outline-primary w-100">Keluar</button>
                    </form>
                </div>
            </div>
            
            <!-- Main Content Area -->
            <div class="flex-grow-1 p-4 p-md-5">
                <div class="mx-auto" style="max-width: 1200px;">
                    @if(isset($header))
                        <div class="mb-4">
                            <h3 class="fw-bold text-dark m-0">{{ $header }}</h3>
                        </div>
                    @endif
                    
                    {{ $slot ?? '' }}
                    @yield('content')
                </div>
            </div>
        </div>
    @else
        <!-- ================= USER LAYOUT (BOTTOM NAV) ================= -->
        <div style="min-height: 100vh; padding-bottom: 80px;">
            <!-- Top App Bar -->
            <nav class="navbar bg-white border-bottom py-3 sticky-top">
                <div class="container d-flex justify-content-between align-items-center">
                    <a href="/" class="navbar-brand fw-bold text-dark m-0" style="letter-spacing: -0.5px;">GlucoWise ML Screening</a>
                    <span class="badge-flat badge-info-flat" style="font-size: 0.75rem;">Pasien Terdaftar</span>
                </div>
            </nav>

            <!-- Main Content Area -->
            <main class="container mt-4 mb-5" style="max-width: 800px;">
                @if(isset($header))
                    <h3 class="mb-4 fw-bold text-dark">{{ $header }}</h3>
                @endif
                {{ $slot ?? '' }}
                @yield('content')
            </main>

            <!-- Mobile-Friendly Bottom Navigation Bar -->
            <nav class="bottom-nav fixed-bottom" style="z-index: 1050; padding-bottom: env(safe-area-inset-bottom);">
                <div class="container-fluid d-flex justify-content-around px-2 py-2 mx-auto" style="max-width: 500px;">
                    <a href="{{ route('dashboard') }}" class="text-decoration-none text-center flex-fill bottom-nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <div style="font-size: 1.2rem; margin-bottom: 2px;">🏠</div>
                        <div style="font-size: 0.75rem;">Beranda</div>
                    </a>
                    
                    <a href="{{ route('screening.form') }}" class="text-decoration-none text-center flex-fill mx-2 bottom-nav-item {{ request()->routeIs('screening.*') ? 'active' : '' }}">
                        <div style="font-size: 1.2rem; margin-bottom: 2px;">🩺</div>
                        <div style="font-size: 0.75rem;">Skrining</div>
                    </a>
                    
                    <form method="POST" action="{{ route('logout') }}" class="m-0 flex-fill text-center">
                        @csrf
                        <button type="submit" class="btn btn-link text-decoration-none bottom-nav-item w-100 border-0 p-0">
                            <div style="font-size: 1.2rem; margin-bottom: 2px;">🚪</div>
                            <div style="font-size: 0.75rem;">Keluar</div>
                        </button>
                    </form>
                </div>
            </nav>
        </div>
    @endrole

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(session('success'))
            Swal.fire({ icon: 'success', title: 'Berhasil', text: '{{ session('success') }}', confirmButtonColor: '#111827', customClass: { confirmButton: 'btn btn-primary' } });
        @endif
        @if(session('error'))
            Swal.fire({ icon: 'error', title: 'Gagal', text: '{{ session('error') }}', confirmButtonColor: '#ef4444' });
        @endif
    </script>
</body>
</html>
