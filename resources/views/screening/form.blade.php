<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="premium-header fs-3 mb-0">Skrining Diabetes</h2>
                <p class="premium-subtitle mt-1 mb-0">Deteksi dini risiko Diabetes Melitus Tipe 2 berbasis AI.</p>
            </div>
        </div>
    </x-slot>

    <style>
        .premium-header { letter-spacing: -0.03em; color: #09090b; font-weight: 700; }
        .premium-subtitle { color: #71717a; font-size: 0.875rem; letter-spacing: -0.01em; }
        
        .panel-container {
            background: #ffffff;
            border: 1px solid #e4e4e7;
            border-radius: 16px;
            box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.05);
            padding: 2rem 1.5rem;
            margin-top: 1rem;
        }
        
        .form-section-title {
            font-size: 1.0625rem;
            font-weight: 600;
            color: #18181b;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            letter-spacing: -0.01em;
        }
        
        .premium-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: #3f3f46;
            margin-bottom: 0.625rem;
            display: block;
        }
        
        .premium-select {
            width: 100%;
            padding: 0.875rem 1rem;
            font-size: 0.9375rem;
            color: #18181b;
            background-color: #fafafa;
            border: 1px solid #e4e4e7;
            border-radius: 10px;
            transition: all 0.2s ease;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2371717a' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1em;
        }
        .premium-select:focus {
            outline: none;
            border-color: #1B9C85;
            box-shadow: 0 0 0 3px rgba(27, 156, 133, 0.15);
            background-color: #ffffff;
        }
        
        .btn-premium-primary {
            background: #1B9C85;
            border: 1px solid #1B9C85;
            color: #ffffff;
            font-size: 1rem;
            font-weight: 600;
            padding: 0.875rem 1.5rem;
            border-radius: 10px;
            width: 100%;
            transition: all 0.2s ease;
            box-shadow: 0 4px 6px -1px rgba(27, 156, 133, 0.2);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        .btn-premium-primary:hover {
            background: #137c6a;
            border-color: #137c6a;
            transform: translateY(-1px);
            box-shadow: 0 6px 12px -2px rgba(27, 156, 133, 0.3);
        }
        
        .premium-alert {
            background-color: #fef2f2;
            border: 1px solid #fecdd3;
            border-radius: 10px;
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
        }
        .premium-alert-text {
            color: #e11d48;
            font-size: 0.875rem;
            margin: 0;
            padding-left: 1rem;
        }
        
        /* Loading Overlay */
        .ai-overlay {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
        }
        .spinner-custom {
            width: 4rem;
            height: 4rem;
            border: 0.25em solid rgba(27, 156, 133, 0.2);
            border-right-color: #1B9C85;
            border-radius: 50%;
            animation: spinner-border .75s linear infinite;
        }
        
        @keyframes spinner-border {
            to { transform: rotate(360deg); }
        }
    </style>

    <div class="panel-container mb-5">
        @if($errors->any())
            <div class="premium-alert">
                <ul class="premium-alert-text">
                    @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                </ul>
            </div>
        @endif
        @if(session('error'))
            <div class="premium-alert" style="padding-left: 1.25rem;">
                <span class="premium-alert-text" style="padding-left: 0;">{{ session('error') }}</span>
            </div>
        @endif
        
        <div class="form-section-title">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#1B9C85" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
            Kuesioner Medis Pengguna
        </div>

        <form id="screeningForm" method="POST" action="{{ route('screening.store') }}">
            @csrf
            <div class="row g-4 mb-4">
                @foreach($attributes as $attr)
                <div class="col-md-6 col-12">
                    <label class="premium-label">{{ ucwords(str_replace('_', ' ', $attr->name)) }}</label>
                    <select name="{{ $attr->name }}" class="premium-select" required>
                        <option value="" disabled selected>-- Pilih Kondisi Anda --</option>
                        @foreach(explode(',', $attr->possible_values) as $val)
                            <option value="{{ trim($val) }}">{{ trim($val) }}</option>
                        @endforeach
                    </select>
                </div>
                @endforeach
            </div>
            
            <div class="mt-5 pt-4 border-top" style="border-color: #f4f4f5 !important;">
                <button type="submit" class="btn-premium-primary">
                    Analisis Risiko Sekarang
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </button>
                <p class="text-center mt-3 mb-0" style="font-size: 0.8125rem; color: #a1a1aa;">Data medis Anda diproses secara aman menggunakan algoritma C4.5 / Naive Bayes tertutup.</p>
            </div>
        </form>
    </div>

    <div id="aiLoadingOverlay" class="d-none position-fixed top-0 start-0 w-100 h-100 ai-overlay" style="z-index: 9999;">
        <div class="d-flex flex-column justify-content-center align-items-center h-100 text-center px-4">
            <div class="spinner-custom mb-4"></div>
            <h3 class="fw-bold mb-2" style="color: #09090b; letter-spacing: -0.02em;">Menganalisis Pola Medis...</h3>
            <p style="color: #71717a; font-size: 0.9375rem; max-width: 320px;">Kecerdasan Buatan sedang mengevaluasi riwayat dan parameter kesehatan Anda.</p>
        </div>
    </div>

    <script>
        document.getElementById('screeningForm').addEventListener('submit', function() {
            document.getElementById('aiLoadingOverlay').classList.remove('d-none');
            setTimeout(() => { this.submit(); }, 600); 
        });
    </script>
</x-app-layout>
