<x-app-layout>
    <x-slot name="header">
        <h2 class="fs-4 mb-0">Dashboard Analitik</h2>
    </x-slot>

    <div class="container mt-4">
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card border-primary border-start border-4 shadow-sm h-100">
                    <div class="card-body">
                        <div class="text-muted small">Total Skrining</div>
                        <div class="fs-2 fw-bold text-dark">{{ $totalScreenings }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-info border-start border-4 shadow-sm h-100">
                    <div class="card-body">
                        <div class="text-muted small">Pengguna Terdaftar</div>
                        <div class="fs-2 fw-bold text-dark">{{ $totalUsers }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-success border-start border-4 shadow-sm h-100">
                    <div class="card-body">
                        <div class="text-muted small">Akurasi Model ML</div>
                        <div class="fs-2 fw-bold text-dark">{{ $accuracy }}%</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-warning border-start border-4 shadow-sm h-100">
                    <div class="card-body">
                        <div class="text-muted small">F1-Score</div>
                        <div class="fs-2 fw-bold text-dark">{{ $f1Score }}%</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-white fw-bold">Distribusi Risiko Skrining</div>
                    <div class="card-body d-flex justify-content-center">
                        <div style="height: 300px; width: 100%;">
                            <canvas id="riskChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-white fw-bold">Tren Skrining (Tahun Ini)</div>
                    <div class="card-body">
                        <div style="height: 300px; width: 100%;">
                            <canvas id="trendChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($latestModel)
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white fw-bold">Detail Performa Model Naive Bayes (Terbaru)</div>
            <div class="card-body">
                <div class="row text-center g-3">
                    @php $cm = json_decode($latestModel->confusion_matrix, true); @endphp
                    <div class="col-6 col-md-3">
                        <div class="p-3 bg-light rounded border">
                            <div class="text-muted small">True Positive (TP)</div>
                            <div class="fs-4 fw-bold text-success">{{ $cm['TP'] ?? 0 }}</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="p-3 bg-light rounded border">
                            <div class="text-muted small">True Negative (TN)</div>
                            <div class="fs-4 fw-bold text-success">{{ $cm['TN'] ?? 0 }}</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="p-3 bg-light rounded border">
                            <div class="text-muted small">False Positive (FP)</div>
                            <div class="fs-4 fw-bold text-danger">{{ $cm['FP'] ?? 0 }}</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="p-3 bg-light rounded border">
                            <div class="text-muted small">False Negative (FN)</div>
                            <div class="fs-4 fw-bold text-danger">{{ $cm['FN'] ?? 0 }}</div>
                        </div>
                    </div>
                </div>
                <div class="text-muted small text-center mt-3">
                    Dilatih pada: {{ $latestModel->created_at->format('d M Y H:i') }} | Total Data Latih: {{ $latestModel->total_data }}
                </div>
            </div>
        </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctxRisk = document.getElementById('riskChart').getContext('2d');
            const riskData = @json($riskData);
            new Chart(ctxRisk, {
                type: 'doughnut',
                data: {
                    labels: ['Risiko Tinggi', 'Risiko Rendah'],
                    datasets: [{ data: [riskData['Risiko Tinggi'] || 0, riskData['Risiko Rendah'] || 0], backgroundColor: ['#dc3545', '#198754'], borderWidth: 0 }]
                },
                options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { position: 'bottom' } } }
            });

            const ctxTrend = document.getElementById('trendChart').getContext('2d');
            const trendData = @json($trendData);
            new Chart(ctxTrend, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [{ label: 'Jumlah Skrining', data: trendData, backgroundColor: '#0d6efd', borderRadius: 4 }]
                },
                options: { responsive: true, maintainAspectRatio: false, scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } } }
            });
        });
    </script>
</x-app-layout>
