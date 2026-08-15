<x-app-layout>
    <x-slot name="header">
        Dashboard
    </x-slot>

    <div class="mb-4">
        <div class="card p-4 p-md-5 bg-white">
            <h3 class="fw-bold mb-2">Selamat Datang, {{ auth()->user()->name }}</h3>
            <p class="text-muted mb-4">Pantau riwayat skrining kesehatan Anda di bawah ini.</p>
            <div>
                <a href="{{ route('screening.form') }}" class="btn btn-primary px-4 py-2">Mulai Skrining Baru</a>
            </div>
        </div>
    </div>

    <div class="card p-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 border-0">Tanggal</th>
                            <th class="border-0">Hasil Prediksi</th>
                            <th class="border-0" style="min-width: 150px;">Confidence</th>
                            <th class="px-4 text-end border-0">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($screenings as $screening)
                            @php
                                $isHigh = $screening->result_class == 'Risiko Tinggi';
                                $badge = $isHigh ? 'badge-danger-flat' : 'badge-success-flat';
                            @endphp
                            <tr>
                                <td class="px-4 py-3 fw-medium">
                                    {{ $screening->created_at->format('d M Y') }} <span class="text-muted ms-1">{{ $screening->created_at->format('H:i') }}</span>
                                </td>
                                <td>
                                    <span class="badge-flat {{ $badge }}">{{ $screening->result_class }}</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="flex-grow-1 progress-bg-flat">
                                            <div class="progress-bar-flat" style="width: {{ $screening->risk_percentage }}%; height: 100%;"></div>
                                        </div>
                                        <span class="fw-bold small">{{ number_format($screening->risk_percentage, 1) }}%</span>
                                    </div>
                                </td>
                                <td class="px-4 text-end">
                                    <a href="{{ route('screening.result', $screening->id) }}" class="btn btn-outline-primary btn-sm me-1">Lihat</a>
                                    <a href="{{ route('screening.pdf', $screening->id) }}" class="btn btn-outline-primary btn-sm">PDF</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <div class="mb-2" style="font-size: 2rem;">📝</div>
                                    <div class="fw-medium text-dark">Belum ada riwayat</div>
                                    <div class="small">Lakukan skrining untuk melihat hasil Anda di sini.</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Chart Section -->
    @if($screenings->count() > 1)
    <div class="card mt-4 p-4 p-md-5">
        <h4 class="fw-bold mb-4">Grafik Tren Kesehatan AI</h4>
        <div style="height: 300px; width: 100%;">
            <canvas id="riskChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const screenings = @json($screenings->reverse()->values());
        const labels = screenings.map(s => new Date(s.created_at).toLocaleDateString('id-ID', {day: 'numeric', month: 'short'}));
        const dataPoints = screenings.map(s => s.risk_percentage);

        const ctx = document.getElementById('riskChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Persentase Risiko (%)',
                    data: dataPoints,
                    borderColor: '#111827',
                    backgroundColor: 'rgba(17, 24, 39, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { beginAtZero: true, max: 100 }
                },
                plugins: {
                    legend: { display: false }
                }
            }
        });
    </script>
    @endif
</x-app-layout>
