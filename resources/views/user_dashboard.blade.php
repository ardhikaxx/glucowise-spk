<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="premium-header fs-3 mb-0" style="letter-spacing: -0.03em; font-weight: 700; color: #09090b;">Dashboard Pasien</h2>
                <p class="premium-subtitle mt-1 mb-0" style="color: #71717a; font-size: 0.875rem;">Pantau riwayat dan tren indikasi medis Anda.</p>
            </div>
        </div>
    </x-slot>

    <style>
        .panel-container {
            background: #ffffff;
            border: 1px solid #e4e4e7;
            border-radius: 16px;
            box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            margin-bottom: 1.5rem;
        }
        
        .welcome-panel {
            background: linear-gradient(135deg, #1B9C85 0%, #137c6a 100%);
            color: #ffffff;
            border: none;
            padding: 2.5rem 2rem;
            position: relative;
            overflow: hidden;
        }
        .welcome-panel::after {
            content: '';
            position: absolute;
            right: -5%;
            bottom: -20%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0) 70%);
            border-radius: 50%;
        }
        
        .welcome-title {
            font-size: 1.75rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 2;
        }
        .welcome-desc {
            font-size: 0.9375rem;
            color: rgba(255, 255, 255, 0.85);
            margin-bottom: 1.5rem;
            max-width: 500px;
            position: relative;
            z-index: 2;
        }
        
        .btn-welcome {
            background: #ffffff;
            color: #137c6a;
            border: none;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            transition: all 0.2s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 2;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        .btn-welcome:hover {
            background: #f4f4f5;
            color: #0f6254;
            transform: translateY(-1px);
        }
        
        /* Premium Table */
        .table-wrapper { width: 100%; overflow-x: auto; }
        .premium-table { width: 100%; border-collapse: collapse; font-size: 0.875rem; }
        .premium-table th { background: #fafafa; color: #71717a; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; font-size: 0.75rem; padding: 1rem 1.5rem; border-bottom: 1px solid #e4e4e7; text-align: left; }
        .premium-table td { padding: 1.125rem 1.5rem; color: #3f3f46; border-bottom: 1px solid #e4e4e7; vertical-align: middle; }
        .premium-table tbody tr { transition: background-color 0.15s ease; }
        .premium-table tbody tr:hover { background-color: #fafafa; }
        .premium-table tbody tr:last-child td { border-bottom: none; }
        
        .badge-premium {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.625rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.02em;
        }
        .badge-danger { background-color: #fff1f2; color: #e11d48; border: 1px solid #fecdd3; }
        .badge-success { background-color: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }
        
        .prog-container { width: 100%; background-color: #e4e4e7; border-radius: 999px; height: 6px; overflow: hidden; margin-top: 0.25rem; }
        .prog-bar { height: 100%; border-radius: 999px; }
        .prog-red { background-color: #f43f5e; }
        .prog-green { background-color: #10b981; }
        
        .btn-outline-action {
            background: transparent;
            border: 1px solid #e4e4e7;
            color: #52525b;
            font-size: 0.8125rem;
            font-weight: 500;
            padding: 0.375rem 0.75rem;
            border-radius: 6px;
            text-decoration: none;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
        }
        .btn-outline-action:hover {
            background: #fafafa;
            border-color: #d4d4d8;
            color: #18181b;
        }
        
        .empty-state { padding: 4rem 2rem; text-align: center; color: #71717a; }
        .empty-state-icon { color: #d4d4d8; margin-bottom: 1.25rem; }
    </style>

    <div class="panel-container welcome-panel">
        <h3 class="welcome-title">Halo, {{ auth()->user()->name }}!</h3>
        <p class="welcome-desc">Kesehatan Anda adalah investasi terbaik. Pantau dan analisis indikasi medis Anda sedini mungkin bersama kami.</p>
        <a href="{{ route('screening.form') }}" class="btn-welcome">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
            Mulai Skrining Baru
        </a>
    </div>

    <!-- Chart Section -->
    @if($screenings->count() > 1)
    <div class="panel-container">
        <div class="d-flex align-items-center gap-2 mb-4" style="color: #18181b; font-weight: 600;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#1B9C85" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
            Tren Probabilitas Risiko
        </div>
        <div style="height: 250px; width: 100%;">
            <canvas id="riskChart"></canvas>
        </div>
    </div>
    @endif

    <div class="panel-container mb-5" style="padding: 0;">
        <div style="padding: 1.25rem 1.5rem; border-bottom: 1px solid #e4e4e7; background: #fafafa; font-weight: 600; font-size: 0.95rem; color: #18181b; display: flex; align-items: center; gap: 0.5rem; border-top-left-radius: 16px; border-top-right-radius: 16px;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1B9C85" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            Riwayat Skrining Anda
        </div>
        <div class="table-wrapper">
            <table class="premium-table">
                <thead>
                    <tr>
                        <th>Waktu Eksekusi</th>
                        <th>Hasil Diagnostik</th>
                        <th style="min-width: 140px;">Probabilitas (Confidence)</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($screenings as $screening)
                        @php
                            $isHigh = strtolower($screening->result_class) == 'risiko tinggi';
                            $badge = $isHigh ? 'badge-danger' : 'badge-success';
                            $progColor = $isHigh ? 'prog-red' : 'prog-green';
                        @endphp
                        <tr>
                            <td>
                                <div style="font-weight: 500; color: #18181b;">{{ $screening->created_at->format('d M Y') }}</div>
                                <div style="font-size: 0.75rem; color: #a1a1aa;">{{ $screening->created_at->format('H:i') }}</div>
                            </td>
                            <td>
                                <span class="badge-premium {{ $badge }}">{{ $screening->result_class }}</span>
                            </td>
                            <td>
                                <div style="font-size: 0.8125rem; font-weight: 600; color: #18181b;">{{ number_format($screening->risk_percentage, 1) }}%</div>
                                <div class="prog-container">
                                    <div class="prog-bar {{ $progColor }}" style="width: {{ $screening->risk_percentage }}%;"></div>
                                </div>
                            </td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('screening.result', $screening->id) }}" class="btn-outline-action">Detail</a>
                                    <a href="{{ route('screening.pdf', $screening->id) }}" class="btn-outline-action" title="Unduh PDF">PDF</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <div class="empty-state">
                                    <svg class="empty-state-icon" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                                    <div class="fw-medium text-dark mb-1" style="font-size: 1.0625rem; letter-spacing: -0.01em;">Belum ada riwayat skrining</div>
                                    <div class="small">Silakan lakukan skrining kesehatan pertama Anda.</div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Chart Script -->
    @if($screenings->count() > 1)
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Chart.defaults.font.family = '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif';
            Chart.defaults.color = '#71717a';
            
            const screenings = @json($screenings->reverse()->values());
            const labels = screenings.map(s => new Date(s.created_at).toLocaleDateString('id-ID', {day: 'numeric', month: 'short'}));
            const dataPoints = screenings.map(s => s.risk_percentage);

            const ctx = document.getElementById('riskChart').getContext('2d');
            let gradient = ctx.createLinearGradient(0, 0, 0, 250);
            gradient.addColorStop(0, 'rgba(27, 156, 133, 0.15)');
            gradient.addColorStop(1, 'rgba(27, 156, 133, 0.0)');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Probabilitas Risiko (%)',
                        data: dataPoints,
                        borderColor: '#1B9C85',
                        backgroundColor: gradient,
                        borderWidth: 2,
                        pointBackgroundColor: '#ffffff',
                        pointBorderColor: '#1B9C85',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: { beginAtZero: true, max: 100, border: {display: false}, grid: {color: '#f4f4f5'} },
                        x: { grid: {display: false}, border: {display: false} }
                    },
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#18181b', padding: 12, cornerRadius: 8,
                            titleFont: { size: 13 }, bodyFont: { size: 14, weight: 'bold' }
                        }
                    },
                    interaction: { intersect: false, mode: 'index' }
                }
            });
        });
    </script>
    @endif
</x-app-layout>
