<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('admin.articles.index') }}" class="btn-back" aria-label="Kembali">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            </a>
            <div>
                <h2 class="premium-header fs-3 mb-0">Tambah Artikel Baru</h2>
                <p class="premium-subtitle mt-1 mb-0">Tulis dan publikasikan konten edukasi kesehatan yang bermanfaat.</p>
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
        
        .btn-back {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 8px;
            color: #71717a;
            background: transparent;
            transition: all 0.2s ease;
            text-decoration: none;
        }
        .btn-back:hover {
            background: #e4e4e7;
            color: #09090b;
        }

        /* Panel Container */
        .panel-container {
            background: #ffffff;
            border: 1px solid #e4e4e7;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02), 0 1px 2px rgba(0, 0, 0, 0.04);
            padding: 2rem 2.5rem;
            max-width: 800px;
        }
        
        /* Premium Form Controls */
        .premium-label {
            font-size: 0.875rem;
            font-weight: 600;
            color: #18181b;
            margin-bottom: 0.5rem;
            display: block;
            letter-spacing: -0.01em;
        }
        .premium-input, .premium-textarea {
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 0.9375rem;
            color: #18181b;
            background-color: #ffffff;
            border: 1px solid #e4e4e7;
            border-radius: 8px;
            transition: all 0.2s ease;
            box-shadow: 0 1px 2px rgba(0,0,0,0.01) inset;
        }
        .premium-input:focus, .premium-textarea:focus {
            outline: none;
            border-color: #1B9C85; box-shadow: 0 0 0 1px #1B9C85;
        }
        .premium-hint {
            font-size: 0.8125rem;
            color: #71717a;
            margin-top: 0.5rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }

        /* Premium Buttons */
        .btn-premium-primary {
            background: #1B9C85; border: 1px solid #1B9C85;
            color: #ffffff;
            font-size: 0.9375rem;
            font-weight: 500;
            padding: 0.625rem 1.5rem;
            border-radius: 8px;
            transition: all 0.2s ease;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }
        .btn-premium-primary:hover {
            background: #137c6a; border-color: #137c6a;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        
        /* Alerts */
        .premium-alert {
            background-color: #fef2f2;
            border: 1px solid #fecdd3;
            border-radius: 8px;
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
        }
        .premium-alert-text {
            color: #991b1b;
            font-size: 0.875rem;
            margin: 0;
            padding-left: 1.25rem;
        }
    </style>

    <div class="container-fluid mt-4 px-0">
        <div class="panel-container">
            @if($errors->any())
                <div class="premium-alert">
                    <ul class="premium-alert-text">
                        @foreach($errors->all() as $error) 
                            <li>{{ $error }}</li> 
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.articles.store') }}" method="POST">
                @csrf
                
                <div class="form-group" style="max-width: 200px;">
                    <label class="premium-label">ID Kategori</label>
                    <input type="number" name="category_id" value="1" required class="premium-input" placeholder="Misal: 1">
                    <div class="premium-hint">Kategori pengelompokan artikel.</div>
                </div>

                <div class="form-group">
                    <label class="premium-label">Judul Artikel</label>
                    <input type="text" name="title" required class="premium-input" placeholder="Masukkan judul artikel yang menarik...">
                </div>

                <div class="form-group mb-4">
                    <label class="premium-label">Konten Edukasi</label>
                    <textarea name="content" rows="8" required class="premium-textarea" placeholder="Tuliskan isi edukasi di sini..."></textarea>
                </div>

                <div class="d-flex justify-content-end pt-2 border-top" style="border-color: #e4e4e7 !important; padding-top: 1.5rem !important; margin-top: 2rem;">
                    <button type="submit" class="btn-premium-primary">Publikasikan Artikel</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
