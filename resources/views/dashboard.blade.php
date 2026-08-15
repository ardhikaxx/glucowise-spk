<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="premium-header fs-3 mb-0">Dashboard Analitik Utama</h2>
                <p class="premium-subtitle mt-1 mb-0">Gambaran umum performa skrining dan akurasi model Kecerdasan Buatan.</p>
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
        
        /* Metric Cards */
        .metric-card {
            background: #ffffff;
            border: 1px solid #e4e4e7;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02), 0 1px 2px rgba(0, 0, 0, 0.04);
            padding: 1.5rem;
            transition: all 0.2s ease;
        }
        .metric-card:hover {
            border-color: #d4d4d8;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            transform: translateY(-2px);
        }
        .metric-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            font-weight: 600;
            color: #71717a;
            margin-bottom: 0.5rem;
        }
        .metric-value {
            font-size: 2.25rem;
            font-weight: 700;
            letter-spacing: -0.04em;
            color: #18181b;
            line-height: 1;
        }
        .metric-unit {
            font-size: 1.125rem;
            font-weight: 500;
            color: #a1a1aa;
            margin-left: 0.125rem;
        }
        .metric-icon-wrap {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid transparent;
        }
        
        /* Panels */
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
            background: #fafafa;
            font-weight: 600;
            font-size: 0.95rem;
            color: #18181b;
            letter-spacing: -0.01em;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .panel-body-premium {
            padding: 1.5rem;
        }
        
        /* Confusion Matrix Grid */
        .cm-grid-item {
            border: 1px solid #e4e4e7;
            border-radius: 8px;
            padding: 1.25rem;
            background: #fafafa;
            transition: all 0.2s ease;
            height: 100%;
        }
        .cm-grid-item:hover {
            background: #ffffff;
            border-color: #d4d4d8;
        }
        .cm-title {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            font-weight: 600;
            color: #71717a;
            margin-bottom: 0.75rem;
        }
        .cm-value {
            font-size: 1.875rem;
            font-weight: 700;
            letter-spacing: -0.04em;
            line-height: 1;
            margin-bottom: 0.5rem;
        }
        .cm-desc {
            font-size: 0.8125rem;
            color: #a1a1aa;
            margin: 0;
            line-height: 1.4;
        }
        
        /* Semantic Colors */
        .text-emerald { color: #10b981; }
        .text-rose { color: #f43f5e; }
        
        .icon-blue { background: #eff6ff; color: #2563eb; border-color: #dbeafe; }
        .icon-orange { background: #fff7ed; color: #ea580c; border-color: #ffedd5; }
        .icon-teal { background: #f0fdfa; color: #0d9488; border-color: #ccfbf1; }
        .icon-purple { background: #faf5ff; color: #9333ea; border-color: #f3e8ff; }
        
        .meta-info-bar {
            border-top: 1px solid #e4e4e7;
            padding-top: 1.25rem;
            margin-top: 1.5rem;
            color: #71717a;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .meta-info-item {
            display: flex;
            align-items: center;
            gap: 0.375rem;
        }
        .meta-info-item span {
            color: #3f3f46;
            font-weight: 500;
        }
    </style>

    <div class="container-fluid mt-4 px-0">
        <!-- 4 Stats Widgets -->
        <div class="row g-4 mb-4">
            <!-- Stat 1 -->
            <div class="col-xl-3 col-md-6">
                <div class="metric-card h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="metric-label">Total Skrining</div>
                            <div class="metric-value">{{ $totalScreenings }}</div>
                        </div>
                        <div class="metric-icon-wrap icon-blue">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Stat 2 -->
            <div class="col-xl-3 col-md-6">
                <div class="metric-card h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="metric-label">Pengguna Terdaftar</div>
                            <div class="metric-value">{{ $totalUsers }}</div>
                        </div>
                        <div class="metric-icon-wrap icon-orange">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4-4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Stat 3 -->
            <div class="col-xl-3 col-md-6">
                <div class="metric-card h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="metric-label">Akurasi Model</div>
                            <div class="metric-value">{{ $accuracy }}<span class="metric-unit">%</span></div>
                        </div>
                        <div class="metric-icon-wrap icon-teal">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Stat 4 -->
            <div class="col-xl-3 col-md-6">
                <div class="metric-card h-100">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="metric-label">F1-Score</div>
                            <div class="metric-value">{{ $f1Score }}<span class="metric-unit">%</span></div>
                        </div>
                        <div class="metric-icon-wrap icon-purple">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts -->
        <div class="row g-4 mb-4">
            <div class="col-lg-4">
                <div class="panel-container h-100">
                    <div class="panel-header-premium">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#71717a" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="M12 8v4l3 3"></path></svg>
                        Distribusi Risiko Skrining
                    </div>
                    <div class="panel-body-premium d-flex justify-content-center align-items-center">
                        <div style="height: 280px; width: 100%; position: relative;">
                            <canvas id="riskChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="panel-container h-100">
                    <div class="panel-header-premium">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#71717a" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                        Tren Skrining Tahunan
                    </div>
                    <div class="panel-body-premium">
                        <div style="height: 280px; width: 100%;">
                            <canvas id="trendChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ML Metrics -->
        @if($latestModel)
        <div class="panel-container mb-5">
            <div class="panel-header-premium">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#71717a" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                Performa Klasifikasi (Confusion Matrix)
            </div>
            <div class="panel-body-premium">
                <div class="row g-3">
                    @php $cm = json_decode($latestModel->confusion_matrix, true); @endphp
                    <div class="col-6 col-md-3">
                        <div class="cm-grid-item">
                            <div class="cm-title">True Positive (TP)</div>
                            <div class="cm-value text-emerald">{{ $cm['TP'] ?? 0 }}</div>
                            <p class="cm-desc">Prediksi benar (Risiko Tinggi)</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="cm-grid-item">
                            <div class="cm-title">True Negative (TN)</div>
                            <div class="cm-value text-emerald">{{ $cm['TN'] ?? 0 }}</div>
                            <p class="cm-desc">Prediksi benar (Risiko Rendah)</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="cm-grid-item">
                            <div class="cm-title">False Positive (FP)</div>
                            <div class="cm-value text-rose">{{ $cm['FP'] ?? 0 }}</div>
                            <p class="cm-desc">Kesalahan (Tinggi Palsu)</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="cm-grid-item">
                            <div class="cm-title">False Negative (FN)</div>
                            <div class="cm-value text-rose">{{ $cm['FN'] ?? 0 }}</div>
                            <p class="cm-desc">Kesalahan (Rendah Palsu)</p>
                        </div>
                    </div>
                </div>
                
                <div class="meta-info-bar flex-column flex-md-row">
                    <div class="meta-info-item mb-2 mb-md-0">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        Dilatih pada: <span>{{ $latestModel->created_at->format('d M Y, H:i') }}</span>
                    </div>
                    <div class="meta-info-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                        Total Data Latih: <span>{{ number_format($latestModel->total_data, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Premium Chart Styling Options
            Chart.defaults.font.family = '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif';
            Chart.defaults.color = '#71717a';
            
            // Trend Chart
            const ctxTrend = document.getElementById('trendChart').getContext('2d');
            let gradient = ctxTrend.createLinearGradient(0, 0, 0, 300);
            gradient.addColorStop(0, 'rgba(37, 99, 235, 0.15)');
            gradient.addColorStop(1, 'rgba(37, 99, 235, 0.0)');

            const trendData = @json($trendData);
            new Chart(ctxTrend, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [{ 
                        label: 'Skrining', 
                        data: trendData, 
                        backgroundColor: gradient,
                        borderColor: '#2563eb',
                        borderWidth: 2,
                        pointBackgroundColor: '#ffffff',
                        pointBorderColor: '#2563eb',
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
                    plugins: { 
                        legend: { display: false },
                        tooltip: { 
                            backgroundColor: '#18181b', 
                            padding: 12, 
                            cornerRadius: 8,
                            titleFont: { size: 13 },
                            bodyFont: { size: 14, weight: 'bold' },
                            displayColors: false
                        }
                    },
                    scales: { 
                        y: { 
                            beginAtZero: true, 
                            grid: { color: '#f4f4f5', drawBorder: false }, 
                            border: { display: false },
                            ticks: { maxTicksLimit: 6 }
                        },
                        x: { 
                            grid: { display: false }, 
                            border: { display: false } 
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
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
                        borderWidth: 0,
                        hoverOffset: 4
                    }]
                },
                options: { 
                    responsive: true, 
                    maintainAspectRatio: false, 
                    cutout: '78%',
                    plugins: { 
                        legend: { 
                            position: 'bottom', 
                            labels: { 
                                padding: 20, 
                                usePointStyle: true, 
                                pointStyle: 'circle',
                                boxWidth: 8
                            } 
                        },
                        tooltip: {
                            backgroundColor: '#18181b',
                            padding: 12,
                            cornerRadius: 8,
                            callbacks: {
                                label: function(context) {
                                    return ` ${context.label}: ${context.raw}`;
                                }
                            }
                        }
                    } 
                }
            });
        });
    </script>
</x-app-layout>
