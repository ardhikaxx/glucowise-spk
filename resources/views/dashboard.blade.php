<x-app-layout>
    <x-slot name="header">
        <h2 class="fs-3 fw-bold mb-0 text-dark" style="letter-spacing: -0.5px;">Dashboard Analitik Utama</h2>
        <p class="text-muted small mt-1">Gambaran umum performa skrining dan akurasi model Kecerdasan Buatan.</p>
    </x-slot>

    <style>
        .stat-card {
            border-radius: 20px;
            border: none;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            background: #fff;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.04) !important;
        }
        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .bg-teal-light { background-color: #e6f2f0; color: #1B9C85; }
        .bg-blue-light { background-color: #eff6ff; color: #3b82f6; }
        .bg-purple-light { background-color: #f5f3ff; color: #8b5cf6; }
        .bg-orange-light { background-color: #fff7ed; color: #f97316; }
        
        .panel-card {
            border-radius: 20px;
            border: none;
            background: #fff;
        }
        .panel-header {
            font-weight: 700;
            color: #0f172a;
            font-size: 1.15rem;
            padding-bottom: 1.25rem;
            border-bottom: 1px solid #f1f5f9;
            margin-bottom: 1.5rem;
        }
        .cm-box {
            border-radius: 16px;
            border: 2px solid transparent;
            background: #f8fafc;
            padding: 1.5rem;
            transition: all 0.3s ease;
        }
        .cm-box:hover {
            background: #fff;
            border-color: #1B9C85;
            box-shadow: 0 10px 25px rgba(27,156,133,0.1);
        }
    </style>

    <div class="container-fluid mt-2 px-0">
        <!-- 4 Stats Widgets -->
        <div class="row g-4 mb-4">
            <!-- Stat 1 -->
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card shadow-sm h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-muted fw-semibold mb-1" style="font-size: 0.85rem; letter-spacing: 0.5px;">TOTAL SKRINING</div>
                            <div class="fs-1 fw-bold text-dark" style="line-height: 1;">{{ $totalScreenings }}</div>
                        </div>
                        <div class="stat-icon bg-blue-light">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Stat 2 -->
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card shadow-sm h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-muted fw-semibold mb-1" style="font-size: 0.85rem; letter-spacing: 0.5px;">PENGGUNA TERDAFTAR</div>
                            <div class="fs-1 fw-bold text-dark" style="line-height: 1;">{{ $totalUsers }}</div>
                        </div>
                        <div class="stat-icon bg-orange-light">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Stat 3 -->
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card shadow-sm h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-muted fw-semibold mb-1" style="font-size: 0.85rem; letter-spacing: 0.5px;">AKURASI MODEL</div>
                            <div class="fs-1 fw-bold text-dark" style="line-height: 1;">{{ $accuracy }}<span class="fs-4 text-muted">%</span></div>
                        </div>
                        <div class="stat-icon bg-teal-light">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Stat 4 -->
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card shadow-sm h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-muted fw-semibold mb-1" style="font-size: 0.85rem; letter-spacing: 0.5px;">F1-SCORE</div>
                            <div class="fs-1 fw-bold text-dark" style="line-height: 1;">{{ $f1Score }}<span class="fs-4 text-muted">%</span></div>
                        </div>
                        <div class="stat-icon bg-purple-light">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts -->
        <div class="row g-4 mb-4">
            <div class="col-lg-5">
                <div class="card panel-card shadow-sm h-100 p-4">
                    <div class="panel-header d-flex align-items-center gap-2">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#1B9C85" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="M12 8v4l3 3"></path></svg>
                        Distribusi Risiko Skrining
                    </div>
                    <div class="card-body p-0 d-flex justify-content-center align-items-center">
                        <div style="height: 320px; width: 100%; position: relative;">
                            <canvas id="riskChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card panel-card shadow-sm h-100 p-4">
                    <div class="panel-header d-flex align-items-center gap-2">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                        Tren Skrining (Tahun Ini)
                    </div>
                    <div class="card-body p-0">
                        <div style="height: 320px; width: 100%;">
                            <canvas id="trendChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ML Metrics -->
        @if($latestModel)
        <div class="card panel-card shadow-sm mb-4 p-4">
            <div class="panel-header d-flex align-items-center gap-2">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#8b5cf6" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                Performa Klasifikasi Model Machine Learning
            </div>
            <div class="card-body p-0">
                <div class="row text-center g-4">
                    @php $cm = json_decode($latestModel->confusion_matrix, true); @endphp
                    <div class="col-6 col-md-3">
                        <div class="cm-box">
                            <div class="text-muted fw-semibold mb-2" style="font-size: 0.85rem;">TRUE POSITIVE (TP)</div>
                            <div class="fs-2 fw-bold" style="color: #10b981;">{{ $cm['TP'] ?? 0 }}</div>
                            <div class="small text-muted mt-1">Prediksi Benar (Risiko Tinggi)</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="cm-box">
                            <div class="text-muted fw-semibold mb-2" style="font-size: 0.85rem;">TRUE NEGATIVE (TN)</div>
                            <div class="fs-2 fw-bold" style="color: #10b981;">{{ $cm['TN'] ?? 0 }}</div>
                            <div class="small text-muted mt-1">Prediksi Benar (Risiko Rendah)</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="cm-box">
                            <div class="text-muted fw-semibold mb-2" style="font-size: 0.85rem;">FALSE POSITIVE (FP)</div>
                            <div class="fs-2 fw-bold" style="color: #f43f5e;">{{ $cm['FP'] ?? 0 }}</div>
                            <div class="small text-muted mt-1">Error (Tinggi Palsu)</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="cm-box">
                            <div class="text-muted fw-semibold mb-2" style="font-size: 0.85rem;">FALSE NEGATIVE (FN)</div>
                            <div class="fs-2 fw-bold" style="color: #f43f5e;">{{ $cm['FN'] ?? 0 }}</div>
                            <div class="small text-muted mt-1">Error (Rendah Palsu)</div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4 pt-3 border-top d-flex flex-column flex-md-row justify-content-between align-items-center text-muted small">
                    <div>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-1"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        Dilatih pada: <span class="fw-semibold">{{ $latestModel->created_at->format('d M Y, H:i') }}</span>
                    </div>
                    <div>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-1"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                        Total Data Latih: <span class="fw-semibold">{{ $latestModel->total_data }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gradient Setup for Trend Chart
            const ctxTrend = document.getElementById('trendChart').getContext('2d');
            let gradient = ctxTrend.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(27, 156, 133, 0.8)');
            gradient.addColorStop(1, 'rgba(27, 156, 133, 0.2)');

            const trendData = @json($trendData);
            new Chart(ctxTrend, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [{ 
                        label: 'Skrining Dilakukan', 
                        data: trendData, 
                        backgroundColor: gradient,
                        borderRadius: 6,
                        borderWidth: 0,
                        barThickness: 24
                    }]
                },
                options: { 
                    responsive: true, 
                    maintainAspectRatio: false, 
                    plugins: { 
                        legend: { display: false },
                        tooltip: { backgroundColor: '#0f172a', padding: 12, cornerRadius: 8 }
                    },
                    scales: { 
                        y: { beginAtZero: true, grid: { borderDash: [5, 5], color: '#f1f5f9' }, border: { display: false } },
                        x: { grid: { display: false }, border: { display: false } }
                    } 
                }
            });

            // Risk Chart Customization
            const ctxRisk = document.getElementById('riskChart').getContext('2d');
            const riskData = @json($riskData);
            new Chart(ctxRisk, {
                type: 'doughnut',
                data: {
                    labels: ['Risiko Tinggi', 'Risiko Rendah'],
                    datasets: [{ 
                        data: [riskData['Risiko Tinggi'] || 0, riskData['Risiko Rendah'] || 0], 
                        backgroundColor: ['#f43f5e', '#10b981'], 
                        borderWidth: 4,
                        borderColor: '#ffffff',
                        hoverOffset: 4
                    }]
                },
                options: { 
                    responsive: true, 
                    maintainAspectRatio: false, 
                    cutout: '75%',
                    plugins: { 
                        legend: { position: 'bottom', labels: { padding: 20, usePointStyle: true, pointStyle: 'circle' } } 
                    } 
                }
            });
        });
    </script>
</x-app-layout>
