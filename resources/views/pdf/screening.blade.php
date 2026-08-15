<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Skrining GlucoWise</title>
    <style>
        body { font-family: 'Helvetica', 'Arial', sans-serif; font-size: 14px; color: #333; }
        .header { text-align: center; border-bottom: 2px solid #2563eb; padding-bottom: 20px; margin-bottom: 20px; }
        .title { font-size: 24px; color: #1e3a8a; font-weight: bold; }
        .subtitle { color: #6b7280; font-size: 14px; }
        .box { padding: 15px; border-radius: 5px; margin-bottom: 20px; }
        .box-red { background-color: #fef2f2; border-left: 5px solid #ef4444; color: #991b1b; }
        .box-green { background-color: #f0fdf4; border-left: 5px solid #22c55e; color: #166534; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #e5e7eb; padding: 8px; text-align: left; }
        th { background-color: #f9fafb; }
        .footer { position: absolute; bottom: 30px; width: 100%; text-align: center; font-size: 12px; color: #9ca3af; border-top: 1px solid #e5e7eb; padding-top: 10px; }
        .qr { text-align: right; }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">GlucoWise ML Screening</div>
        <div class="subtitle">Laporan Prediksi Dini Risiko Diabetes Melitus Tipe 2</div>
    </div>

    <table style="border:none; margin-bottom: 20px;">
        <tr>
            <td style="border:none; width:70%;">
                <p><strong>ID Skrining:</strong> #{{ $screening->id }}</p>
                <p><strong>Tanggal:</strong> {{ $screening->created_at->format('d F Y H:i') }}</p>
            </td>
            <td style="border:none; width:30%; text-align:right;">
                <img src="data:image/svg+xml;base64,{{ $qrCode }}" alt="QR Code" width="80" height="80">
            </td>
        </tr>
    </table>

    @php $isHigh = $screening->result_class == 'Risiko Tinggi'; @endphp
    <div class="box {{ $isHigh ? 'box-red' : 'box-green' }}">
        <h2 style="margin-top:0;">Hasil Klasifikasi: {{ $screening->result_class }}</h2>
        <p>Tingkat Kepercayaan Model (Confidence): <strong>{{ number_format($screening->risk_percentage, 2) }}%</strong></p>
        <p>
            @if($isHigh)
                Rekomendasi: Berdasarkan algoritma, Anda terindikasi Risiko Tinggi Diabetes Melitus Tipe 2. Segera periksakan diri ke fasilitas kesehatan terdekat untuk pemeriksaan klinis lanjutan.
            @else
                Rekomendasi: Anda berada pada tingkat risiko rendah. Tetap pertahankan pola makan seimbang dan gaya hidup aktif.
            @endif
        </p>
    </div>

    <h3>Data Faktor Risiko (Input)</h3>
    <table>
        <tr><th>Faktor</th><th>Jawaban</th></tr>
        @foreach($answers as $ans)
        <tr>
            <td>{{ ucwords(str_replace('_', ' ', $ans->attribute)) }}</td>
            <td>{{ $ans->answer_value }}</td>
        </tr>
        @endforeach
    </table>

    <div class="footer">
        * Laporan ini dihasilkan secara otomatis oleh sistem Kecerdasan Buatan (Naive Bayes).<br>
        Ini bukan diagnosis medis resmi. Gunakan sebagai bahan konsultasi dengan dokter.
    </div>
</body>
</html>
