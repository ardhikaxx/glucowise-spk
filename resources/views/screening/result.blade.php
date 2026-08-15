<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Skrining - GlucoWise</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light pb-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4 py-3">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand fw-bold text-primary">GlucoWise.</a>
        </div>
    </nav>

    <div class="container">
        <div class="card shadow-sm border-0">
            <div class="card-body p-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Hasil Prediksi Skrining</h2>
                    <p class="text-muted">ID Skrining: #{{ $screening->id }} | Tanggal: {{ $screening->created_at->format('d M Y H:i') }}</p>
                </div>

                @php
                    $isHighRisk = $screening->result_class == 'Risiko Tinggi';
                    $alertClass = $isHighRisk ? 'alert-danger' : 'alert-success';
                @endphp

                <div class="alert {{ $alertClass }} border-start border-4 mb-4 p-4 shadow-sm">
                    <h3 class="fw-bold mb-1">{{ $screening->result_class }}</h3>
                    <p class="mb-3">Probabilitas risiko (Confidence): <strong>{{ number_format($screening->risk_percentage, 2) }}%</strong></p>
                    <hr>
                    <p class="mb-0">
                        @if($isHighRisk)
                            <strong>Perhatian:</strong> Berdasarkan analisis faktor risiko, Anda memiliki indikasi tinggi Diabetes Melitus Tipe 2. Segera konsultasikan ke dokter.
                        @else
                            <strong>Selamat!</strong> Anda memiliki risiko rendah. Pertahankan gaya hidup sehat dan pola makan bergizi.
                        @endif
                    </p>
                </div>
                
                <!-- Kemenkes Guideline Box -->
                <div class="alert alert-info border-start border-info border-4 mb-5 p-4 bg-light shadow-sm">
                    <h5 class="fw-bold text-info-emphasis mb-2"><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>Rekomendasi Standar Kemenkes RI</h5>
                    <p class="mb-0 small text-dark">
                        Berdasarkan Standar Prosedur Operasional (SOP) Skrining PTM Kementerian Kesehatan RI, jika Anda berusia <strong>≥ 40 tahun</strong> atau memiliki faktor risiko (seperti obesitas/tekanan darah tinggi), Anda dianjurkan untuk mengunjungi Puskesmas atau FKTP terdekat guna melakukan:
                        <ul class="mb-0 mt-2">
                            <li>Pengukuran Lingkar Perut (Deteksi obesitas sentral).</li>
                            <li>Pemeriksaan klinis Kadar Gula Darah Puasa (GDP) atau HbA1c.</li>
                        </ul>
                    </p>
                </div>

                <div class="d-flex justify-content-center gap-3 mt-4">
                    <a href="{{ route('screening.pdf', $screening->id) }}" class="btn btn-danger px-4 py-2 fw-semibold">Download Laporan PDF</a>
                    <a href="{{ route('screening.form') }}" class="btn btn-outline-primary px-4 py-2 fw-semibold">Ulangi Skrining</a>
                </div>
                
                <div class="mt-5 pt-4">
                    <h5 class="fw-bold mb-3 border-bottom pb-2">Rincian Kalkulasi Probabilitas Medis</h5>
                    <div class="bg-dark p-3 rounded shadow-inner">
                        <pre class="text-success mb-0 small" style="white-space: pre-wrap;"><code>{{ json_encode(json_decode($screening->probability_details), JSON_PRETTY_PRINT) }}</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
