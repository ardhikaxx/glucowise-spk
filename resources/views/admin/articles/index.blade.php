<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="premium-header fs-3 mb-0">Manajemen Artikel Edukasi</h2>
                <p class="premium-subtitle mt-1 mb-0">Kelola dan publikasikan konten edukasi kesehatan untuk pengguna.</p>
            </div>
        </div>
    </x-slot>

    <style>
        /* Premium UI Design System */
        .premium-header {
            letter-spacing: -0.03em;
            color: #09090b;
            font-weight: 700;
        }
        .premium-subtitle {
            color: #71717a;
            font-size: 0.875rem;
            letter-spacing: -0.01em;
        }

        /* Panel Container */
        .panel-container {
            background: #ffffff;
            border: 1px solid #e4e4e7;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02), 0 1px 2px rgba(0, 0, 0, 0.04);
            overflow: hidden;
        }
        
        .panel-header-premium {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid #e4e4e7;
            background: #ffffff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        /* Premium Table */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }
        .premium-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem;
        }
        .premium-table th {
            background: #fafafa;
            color: #71717a;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            font-size: 0.75rem;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #e4e4e7;
            text-align: left;
        }
        .premium-table td {
            padding: 1rem 1.5rem;
            color: #3f3f46;
            border-bottom: 1px solid #e4e4e7;
            vertical-align: middle;
        }
        .premium-table tbody tr {
            transition: background-color 0.15s ease;
        }
        .premium-table tbody tr:hover {
            background-color: #fafafa;
        }
        .premium-table tbody tr:last-child td {
            border-bottom: none;
        }
        
        .article-title {
            font-weight: 600;
            color: #18181b;
            font-size: 0.9375rem;
            letter-spacing: -0.01em;
        }
        
        /* Buttons */
        .btn-premium-primary {
            background: #1B9C85; border: 1px solid #1B9C85;
            color: #ffffff;
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            text-decoration: none;
        }
        .btn-premium-primary:hover {
            background: #137c6a; border-color: #137c6a;
            color: #ffffff;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        
        .btn-premium-danger {
            background: #ffffff;
            border: 1px solid #e4e4e7;
            color: #ef4444;
            font-size: 0.8125rem;
            font-weight: 500;
            padding: 0.375rem 0.75rem;
            border-radius: 6px;
            transition: all 0.2s ease;
            cursor: pointer;
        }
        .btn-premium-danger:hover {
            background: #fef2f2;
            border-color: #fca5a5;
            color: #b91c1c;
        }
        
        /* Empty State */
        .empty-state {
            padding: 4rem 2rem;
            text-align: center;
            color: #71717a;
        }
        .empty-state-icon {
            color: #d4d4d8;
            margin-bottom: 1rem;
        }

        /* Pagination Override */
        .pagination-container {
            padding: 1.25rem 1.5rem;
            border-top: 1px solid #e4e4e7;
            background: #ffffff;
        }
        .pagination { margin-bottom: 0; gap: 0.25rem; }
        .page-item.active .page-link { background-color: #1B9C85; border-color: #1B9C85; color: #ffffff; border-radius: 6px; }
        .page-link { color: #3f3f46; border-color: transparent; border-radius: 6px; padding: 0.375rem 0.75rem; font-size: 0.875rem; font-weight: 500; }
        .page-link:hover { color: #18181b; background-color: #f4f4f5; border-color: transparent; }
    </style>

    <div class="container-fluid mt-4 px-0">
        <div class="panel-container mb-5">
            <div class="panel-header-premium">
                <h5 class="fw-semibold mb-0 text-dark" style="font-size: 1rem; letter-spacing: -0.01em;">Daftar Artikel</h5>
                <a href="{{ route('admin.articles.create') }}" class="btn-premium-primary">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                    Tambah Artikel
                </a>
            </div>

            <div class="table-wrapper">
                <table class="premium-table">
                    <thead>
                        <tr>
                            <th>Judul Artikel</th>
                            <th>Tanggal Dibuat</th>
                            <th style="width: 100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($articles as $article)
                        <tr>
                            <td>
                                <div class="article-title">{{ $article->title }}</div>
                            </td>
                            <td style="color: #52525b; font-size: 0.8125rem;">
                                {{ $article->created_at->format('d M Y') }}
                            </td>
                            <td>
                                <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" class="m-0 form-delete" data-name="artikel ini">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-premium-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">
                                <div class="empty-state">
                                    <svg class="empty-state-icon" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                    <div class="fw-medium text-dark mb-1">Belum ada artikel edukasi</div>
                                    <div class="small">Klik tombol Tambah Artikel untuk mulai mempublikasikan konten.</div>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($articles->hasPages())
            <div class="pagination-container d-flex justify-content-end">
                {{ $articles->links('pagination::bootstrap-5') }}
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
