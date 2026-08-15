<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="premium-header fs-3 mb-0">Sistem Pemantauan (Audit Log)</h2>
                <p class="premium-subtitle mt-1 mb-0">Pantau dan audit seluruh riwayat aktivitas krusial sistem secara transparan.</p>
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
            align-items: center;
            gap: 0.625rem;
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
            padding: 1.125rem 1.5rem;
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
        
        /* Specific Formatting */
        .log-id {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
            font-size: 0.75rem;
            color: #71717a;
            background: #f4f4f5;
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
            border: 1px solid #e4e4e7;
            letter-spacing: 0.05em;
        }
        
        .activity-name {
            font-weight: 600;
            color: #18181b;
            letter-spacing: -0.01em;
        }
        
        .timestamp {
            font-size: 0.8125rem;
            color: #71717a;
        }
        
        /* Badges */
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.625rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.02em;
        }
        .badge-success {
            background-color: #f0fdf4;
            color: #16a34a;
            border: 1px solid #bbf7d0;
        }
        .badge-warning {
            background-color: #fffbeb;
            color: #d97706;
            border: 1px solid #fde68a;
        }
        .badge-danger {
            background-color: #fff1f2;
            color: #e11d48;
            border: 1px solid #fecdd3;
        }
        .badge-neutral {
            background-color: #f4f4f5;
            color: #52525b;
            border: 1px solid #e4e4e7;
        }

        /* Empty State */
        .empty-state {
            padding: 5rem 2rem;
            text-align: center;
            color: #71717a;
        }
        .empty-state-icon {
            color: #d4d4d8;
            margin-bottom: 1.25rem;
        }

        /* Pagination Override */
        .pagination-container {
            padding: 1.25rem 1.5rem;
            border-top: 1px solid #e4e4e7;
            background: #ffffff;
        }
        .pagination { margin-bottom: 0; gap: 0.25rem; }
        .page-item.active .page-link { background-color: #1B9C85; border-color: #1B9C85; color: #ffffff; border-radius: 6px; font-weight: 500; }
        .page-link { color: #3f3f46; border-color: transparent; border-radius: 6px; padding: 0.375rem 0.75rem; font-size: 0.875rem; font-weight: 500; }
        .page-link:hover { color: #18181b; background-color: #f4f4f5; border-color: transparent; }
        .page-item.disabled .page-link { color: #a1a1aa; background-color: transparent; }
    </style>

    <div class="container-fluid mt-4 px-0">
        <div class="panel-container mb-5">
            <div class="panel-header-premium">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#71717a" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                <h5 class="fw-semibold mb-0 text-dark" style="font-size: 1rem; letter-spacing: -0.01em;">Riwayat Aktivitas Sistem</h5>
            </div>

            <div class="table-wrapper">
                <table class="premium-table">
                    <thead>
                        <tr>
                            <th style="width: 130px;">ID Referensi</th>
                            <th>Aktivitas & Status</th>
                            <th>Waktu Eksekusi</th>
                            <th>Akurasi Tercatat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($logs as $log)
                        <tr>
                            <td>
                                <span class="log-id">#{{ str_pad($log->id, 5, '0', STR_PAD_LEFT) }}</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="activity-name">Training Machine Learning</span>
                                    @if(stripos($log->status, 'success') !== false || stripos($log->status, 'sukses') !== false || stripos($log->status, 'selesai') !== false)
                                        <span class="status-badge badge-success">{{ $log->status }}</span>
                                    @elseif(stripos($log->status, 'fail') !== false || stripos($log->status, 'gagal') !== false)
                                        <span class="status-badge badge-danger">{{ $log->status }}</span>
                                    @else
                                        <span class="status-badge badge-neutral">{{ $log->status }}</span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="timestamp d-flex align-items-center gap-2">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#a1a1aa" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                    {{ \Carbon\Carbon::parse($log->created_at)->format('d M Y, H:i:s') }}
                                </div>
                            </td>
                            <td>
                                <span class="status-badge badge-success d-inline-flex align-items-center gap-1">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    {{ number_format((float)$log->accuracy, 2) }}%
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">
                                <div class="empty-state">
                                    <svg class="empty-state-icon" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                                    <div class="fw-medium text-dark mb-1" style="font-size: 1.0625rem; letter-spacing: -0.01em;">Log aktivitas kosong</div>
                                    <div class="small">Belum ada riwayat aktivitas sistem yang tercatat di basis data.</div>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($logs->hasPages())
            <div class="pagination-container d-flex justify-content-end">
                {{ $logs->links('pagination::bootstrap-5') }}
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
