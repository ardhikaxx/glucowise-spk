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
        body { font-family: 'Inter', sans-serif; background-color: #fafafa; color: #18181b; }
        
        /* Premium Sidebar */
        .sidebar-premium {
            background-color: #ffffff;
            border-right: 1px solid #e4e4e7;
            width: 280px;
            display: flex;
            flex-direction: column;
            padding: 1.5rem;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
        }
        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: #09090b;
            text-decoration: none;
            margin-bottom: 2.5rem;
            padding: 0 0.5rem;
            transition: opacity 0.2s;
        }
        .sidebar-brand:hover {
            opacity: 0.8;
        }
        .sidebar-brand-icon { width: 32px; height: 32px; background: #1B9C85;
            color: #ffffff;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .sidebar-brand-text {
            font-size: 1.125rem;
            font-weight: 700;
            letter-spacing: -0.03em;
        }
        
        .sidebar-heading-premium {
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            color: #a1a1aa;
            text-transform: uppercase;
            margin: 1.5rem 0 0.5rem;
            padding: 0 0.5rem;
        }
        
        .nav-premium {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }
        .nav-premium-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.625rem 0.75rem;
            color: #71717a;
            border-radius: 8px;
            font-size: 0.9375rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.15s ease;
        }
        .nav-premium-link:hover {
            background-color: #f4f4f5;
            color: #18181b;
        }
        .nav-premium-link.active { background-color: #1B9C85;
            color: #ffffff;
            font-weight: 500;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .nav-premium-link svg {
            width: 18px;
            height: 18px;
            opacity: 0.8;
        }
        .nav-premium-link.active svg {
            opacity: 1;
        }
        
        .sidebar-footer {
            margin-top: auto;
            padding-top: 1.5rem;
            border-top: 1px solid #e4e4e7;
        }
        
        .user-mini-profile {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem;
            margin-bottom: 0.75rem;
        }
        .user-mini-avatar {
            width: 36px;
            height: 36px;
            background: #f4f4f5;
            border: 1px solid #e4e4e7;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #3f3f46;
            font-weight: 600;
            font-size: 0.875rem;
            flex-shrink: 0;
        }
        .user-mini-info {
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        .user-mini-name {
            font-size: 0.875rem;
            font-weight: 600;
            color: #18181b;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            letter-spacing: -0.01em;
        }
        .user-mini-role {
            font-size: 0.75rem;
            color: #71717a;
        }
        
        .btn-premium-logout {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.625rem;
            color: #52525b;
            background: #ffffff;
            border: 1px solid #e4e4e7;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s ease;
            cursor: pointer;
        }
        .btn-premium-logout:hover {
            background: #fafafa;
            color: #09090b;
            border-color: #d4d4d8;
        }

        /* Mobile User Nav styles */
        .bottom-nav { background: #fff; border-top: 1px solid #e5e7eb; }
        .bottom-nav-item { color: #6b7280; font-weight: 500; padding: 0.5rem; border-radius: 8px; transition: all 0.2s ease; }
        .bottom-nav-item.active { color: #1B9C85; background-color: #e6f2f0; }
        
        .badge-flat { padding: 0.35rem 0.75rem; border-radius: 6px; font-weight: 500; border: 1px solid; }
        .badge-info-flat { background-color: #eff6ff; color: #3b82f6; border-color: #bfdbfe; }
    </style>
</head>
<body>
    @role('admin')
        <!-- ================= ADMIN LAYOUT (SIDEBAR) ================= -->
        <div class="d-flex" style="min-height: 100vh;">
            <!-- Premium Sidebar -->
            <aside class="sidebar-premium">
                <a href="{{ url('/') }}" class="sidebar-brand">
                    <div class="sidebar-brand-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                    </div>
                    <span class="sidebar-brand-text">GlucoWise ML</span>
                </a>
                
                <ul class="nav-premium">
                    <li>
                        <a href="{{ route('dashboard') }}" class="nav-premium-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                            Dashboard
                        </a>
                    </li>
                    
                    <li class="sidebar-heading-premium">Pengujian ML</li>
                    <li>
                        <a href="{{ route('admin.training.index') }}" class="nav-premium-link {{ request()->routeIs('admin.training.*') ? 'active' : '' }}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                            Data Latih
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.ml.index') }}" class="nav-premium-link {{ request()->routeIs('admin.ml.*') ? 'active' : '' }}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 3v4M15 3v4M4 14l3.5-3.5M16.5 10.5L20 14M12 11v6"></path><circle cx="12" cy="12" r="9"></circle></svg>
                            Laboratorium ML
                        </a>
                    </li>
                    
                    <li class="sidebar-heading-premium">Sistem</li>
                    <li>
                        <a href="{{ route('admin.users.index') }}" class="nav-premium-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            Pengguna
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.articles.index') }}" class="nav-premium-link {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            Artikel Edukasi
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.audit_logs.index') }}" class="nav-premium-link {{ request()->routeIs('admin.audit_logs.*') ? 'active' : '' }}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            Audit Log
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.settings.index') }}" class="nav-premium-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                            Pengaturan
                        </a>
                    </li>
                </ul>
                
                <div class="sidebar-footer">
                    <div class="user-mini-profile">
                        <div class="user-mini-avatar">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <div class="user-mini-info">
                            <span class="user-mini-name">{{ auth()->user()->name }}</span>
                            <span class="user-mini-role">Administrator</span>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="form-logout">
                        @csrf
                        <button type="submit" class="btn-premium-logout">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                            Keluar Sistem
                        </button>
                    </form>
                </div>
            </aside>
            
            <!-- Main Content Area -->
            <div class="flex-grow-1 p-4 p-md-5" style="overflow-x: hidden;">
                <div class="w-100">
                    @if(isset($header))
                        <div class="mb-4">
                            <!-- Header is rendered in views, typically handled by slot -->
                            {!! $header !!}
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
                    <h3 class="mb-4 fw-bold text-dark">{!! $header !!}</h3>
                @endif
                {{ $slot ?? '' }}
                @yield('content')
            </main>

            <!-- Mobile-Friendly Bottom Navigation Bar -->
            <nav class="bottom-nav fixed-bottom" style="z-index: 1050; padding-bottom: env(safe-area-inset-bottom);">
                <div class="container-fluid d-flex justify-content-around px-2 py-2 mx-auto" style="max-width: 500px;">
                    <a href="{{ route('dashboard') }}" class="text-decoration-none text-center flex-fill bottom-nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <div style="margin-bottom: 4px;"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></div>
                        <div style="font-size: 0.75rem;">Beranda</div>
                    </a>
                    
                    <a href="{{ route('screening.form') }}" class="text-decoration-none text-center flex-fill mx-2 bottom-nav-item {{ request()->is('screening*') ? 'active' : '' }}">
                        <div style="margin-bottom: 4px;"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg></div>
                        <div style="font-size: 0.75rem;">Skrining</div>
                    </a>
                    
                    <form method="POST" action="{{ route('logout') }}" class="m-0 flex-fill text-center form-logout">
                        @csrf
                        <button type="submit" class="btn btn-link text-decoration-none bottom-nav-item w-100 border-0 p-0" style="color: inherit;">
                            <div style="margin-bottom: 4px;"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg></div>
                            <div style="font-size: 0.75rem;">Keluar</div>
                        </button>
                    </form>
                </div>
            </nav>
        </div>
    @endrole

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @role('admin')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    @endrole
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                Swal.fire({ icon: 'success', title: 'Berhasil', text: '{!! session('success') !!}', confirmButtonColor: '#1B9C85', customClass: { confirmButton: 'btn btn-primary' } });
            @endif
            @if(session('error'))
                Swal.fire({ icon: 'error', title: 'Gagal', text: '{!! session('error') !!}', confirmButtonColor: '#ef4444' });
            @endif

            // Intercept Logout Forms
            const logoutForms = document.querySelectorAll('.form-logout');
            logoutForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Konfirmasi Keluar',
                        text: 'Apakah Anda yakin ingin keluar dari sistem?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#1B9C85',
                        cancelButtonColor: '#ef4444',
                        confirmButtonText: 'Ya, Keluar',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            // Intercept Delete Forms
            const deleteForms = document.querySelectorAll('.form-delete');
            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const itemName = this.dataset.name || 'data ini';
                    Swal.fire({
                        title: 'Hapus Data?',
                        text: `Tindakan ini tidak dapat dibatalkan. Apakah Anda yakin ingin menghapus ${itemName}?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#ef4444',
                        cancelButtonColor: '#71717a',
                        confirmButtonText: 'Ya, Hapus',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
