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
        .btn-primary { background-color: #111827; border-color: #111827; border-radius: 8px; font-weight: 500; padding: 0.5rem 1rem; }
        .btn-primary:hover { background-color: #374151; border-color: #374151; }
        .btn-outline-primary { color: #111827; border-color: #e5e7eb; border-radius: 8px; font-weight: 500; padding: 0.5rem 1rem; background: #fff; }
        .btn-outline-primary:hover { background-color: #f3f4f6; color: #111827; border-color: #e5e7eb; }
        .btn-danger { background-color: #ef4444; border-color: #ef4444; border-radius: 8px; font-weight: 500;}
        .form-control, .form-select { border: 1px solid #e5e7eb; border-radius: 8px; padding: 0.6rem 1rem; box-shadow: none !important; background-color: #fafafa; }
        .form-control:focus, .form-select:focus { border-color: #111827; background-color: #fff; }
        .table { border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden; margin-bottom: 0; }
        th { font-weight: 600; color: #4b5563; background-color: #f9fafb !important; border-bottom: 1px solid #e5e7eb !important; border-top: 0 !important; }
        td { color: #111827; border-bottom: 1px solid #e5e7eb !important; vertical-align: middle; }
        .sidebar-bg { background-color: #fff; border-right: 1px solid #e5e7eb; }
        .nav-pills .nav-link { color: #4b5563; border-radius: 8px; font-weight: 500; padding: 0.5rem 1rem; margin-bottom: 0.25rem; transition: none; }
        .nav-pills .nav-link.active { background-color: #f3f4f6; color: #111827; font-weight: 600; }
        .nav-pills .nav-link:hover:not(.active) { background-color: #f9fafb; color: #111827; }
        
        .bottom-nav { background: #fff; border-top: 1px solid #e5e7eb; }
        .bottom-nav-item { color: #6b7280; font-weight: 500; padding: 0.5rem; border-radius: 8px; }
        .bottom-nav-item.active { color: #111827; background-color: #f3f4f6; }
        
        .progress-bar-flat { background-color: #111827; border-radius: 999px; }
        .progress-bg-flat { background-color: #e5e7eb; border-radius: 999px; height: 8px; }
        
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
                
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
                    </li>
                    <li class="nav-item text-muted fw-bold mt-4 mb-2 px-3" style="font-size: 0.65rem; letter-spacing: 0.5px;">PENGUJIAN ML</li>
                    <li class="nav-item">
                        <a href="{{ route('admin.training.index') }}" class="nav-link {{ request()->routeIs('admin.training.*') ? 'active' : '' }}">Data Latih</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.ml.index') }}" class="nav-link {{ request()->routeIs('admin.ml.*') ? 'active' : '' }}">Laboratorium ML</a>
                    </li>
                    <li class="nav-item text-muted fw-bold mt-4 mb-2 px-3" style="font-size: 0.65rem; letter-spacing: 0.5px;">SISTEM</li>
                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">Pengguna</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.articles.index') }}" class="nav-link {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">Artikel Edukasi</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.audit_logs.index') }}" class="nav-link {{ request()->routeIs('admin.audit_logs.*') ? 'active' : '' }}">Audit Log</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">Pengaturan</a>
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
