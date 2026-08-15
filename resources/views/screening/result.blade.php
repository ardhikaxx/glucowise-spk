<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('dashboard') }}" class="btn-back" style="display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; border-radius: 8px; color: #71717a; text-decoration: none; background: #f4f4f5;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            </a>
            <div>
                <h2 class="premium-header fs-3 mb-0" style="letter-spacing: -0.03em; font-weight: 700; color: #09090b;">Hasil Skrining</h2>
                <p class="premium-subtitle mt-1 mb-0" style="color: #71717a; font-size: 0.875rem;">Ref #{{ str_pad($screening->id, 5, '0', STR_PAD_LEFT) }} &bull; {{ $screening->created_at->format('d M Y, H:i') }}</p>
            </div>
        </div>
    </x-slot>

    <style>
        .result-card {
            background: #ffffff;
            border: 1px solid #e4e4e7;
            border-radius: 16px;
            box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.05);
            padding: 3rem 2rem;
            margin-top: 1.5rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .score-circle {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin: 0 auto 1.5rem;
            border: 8px solid;
            background: #ffffff;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            position: relative;
            z-index: 2;
        }
        .score-value {
            font-size: 2.5rem;
            font-weight: 800;
            letter-spacing: -0.05em;
            line-height: 1;
        }
        .score-label {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #71717a;
            margin-top: 0.25rem;
        }
        
        .high-risk .score-circle { border-color: #f43f5e; color: #e11d48; }
        .low-risk .score-circle { border-color: #10b981; color: #059669; }
        
        .result-title {
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            margin-bottom: 0.75rem;
        }
        .high-risk .result-title { color: #e11d48; }
        .low-risk .result-title { color: #059669; }
        
        .result-desc {
            font-size: 0.9375rem;
            color: #52525b;
            line-height: 1.6;
            max-width: 480px;
            margin: 0 auto 2rem;
        }
        
        .kemenkes-box {
            background: #f0fdfa;
            border: 1px solid #ccfbf1;
            border-radius: 12px;
            padding: 1.5rem;
            text-align: left;
            margin: 0 auto 2.5rem;
            max-width: 600px;
        }
        .kemenkes-title {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #0d9488;
            font-weight: 600;
            font-size: 0.9375rem;
            margin-bottom: 0.75rem;
        }
        .kemenkes-text {
            color: #115e59;
            font-size: 0.875rem;
            margin: 0;
            line-height: 1.5;
        }
        
        .btn-premium-primary {
            background: #1B9C85;
            border: 1px solid #1B9C85;
            color: #ffffff;
            font-size: 0.9375rem;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(27, 156, 133, 0.2);
        }
        .btn-premium-primary:hover {
            background: #137c6a;
            border-color: #137c6a;
            transform: translateY(-1px);
            color: #ffffff;
        }
        
        .btn-premium-outline {
            background: #ffffff;
            border: 1px solid #e4e4e7;
            color: #18181b;
            font-size: 0.9375rem;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        .btn-premium-outline:hover {
            background: #fafafa;
            border-color: #d4d4d8;
            color: #18181b;
        }
        
        .details-section {
            text-align: left;
            margin-top: 3rem;
            border-top: 1px solid #e4e4e7;
            padding-top: 2rem;
        }
        .details-code {
            background: #18181b;
            color: #10b981;
            padding: 1.25rem;
            border-radius: 10px;
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
            font-size: 0.75rem;
            overflow-x: auto;
        }
    </style>

    @php
        $isHighRisk = strtolower($screening->result_class) == 'risiko tinggi';
        $wrapperClass = $isHighRisk ? 'high-risk' : 'low-risk';
    @endphp

    <div class="result-card {{ $wrapperClass }} mb-5">
        <div class="score-circle">
            <div class="score-value">{{ number_format($screening->risk_percentage, 0) }}<span style="font-size: 1.25rem;">%</span></div>
            <div class="score-label">Probabilitas</div>
        </div>
        
        <h3 class="result-title">{{ $screening->result_class }}</h3>
        
        <p class="result-desc">
            @if($isHighRisk)
                Berdasarkan evaluasi AI terhadap profil kesehatan Anda, Anda memiliki indikasi tinggi <strong>Diabetes Melitus Tipe 2</strong>. Kami sangat menyarankan Anda untuk menjadwalkan konsultasi dengan dokter sesegera mungkin.
            @else
                Kabar baik! Profil kesehatan Anda saat ini menunjukkan <strong>risiko rendah</strong>. Terus pertahankan gaya hidup sehat, aktivitas fisik rutin, dan pola makan bergizi Anda.
            @endif
        </p>
        
        <div class="kemenkes-box">
            <div class="kemenkes-title">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                Standar Kemenkes RI
            </div>
            <div class="kemenkes-text">
                Berdasarkan Pedoman Pengendalian PTM, individu dengan faktor risiko sangat dianjurkan untuk mengunjungi Fasilitas Kesehatan Tingkat Pertama (FKTP) terdekat guna melakukan pemeriksaan klinis diagnostik pasti seperti <strong>Kadar Gula Darah Puasa (GDP)</strong> atau <strong>HbA1c</strong>.
            </div>
        </div>
        
        <div class="d-flex flex-column flex-md-row justify-content-center gap-3">
            <a href="{{ route('screening.pdf', $screening->id) }}" class="btn-premium-outline">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                Unduh PDF
            </a>
            <a href="{{ route('dashboard') }}" class="btn-premium-primary">
                Selesai
            </a>
        </div>
        
        <div class="details-section">
            <h5 style="font-size: 0.9375rem; font-weight: 600; color: #18181b; margin-bottom: 1rem;">Log Kalkulasi Model Medis</h5>
            <div class="details-code">
                <pre style="margin: 0; white-space: pre-wrap;">{{ json_encode(json_decode($screening->probability_details), JSON_PRETTY_PRINT) }}</pre>
            </div>
        </div>
    </div>
</x-app-layout>
