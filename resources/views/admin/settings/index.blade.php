<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="premium-header fs-3 mb-0">Pengaturan Sistem</h2>
                <p class="premium-subtitle mt-1 mb-0">Kelola identitas aplikasi, konten pusat bantuan, dan informasi kontak.</p>
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

        /* Panel Container */
        .panel-container {
            background: #ffffff;
            border: 1px solid #e4e4e7;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02), 0 1px 2px rgba(0, 0, 0, 0.04);
            overflow: hidden;
            max-width: 900px;
        }
        
        /* Sections */
        .setting-section {
            padding: 2.25rem 2.5rem;
            border-bottom: 1px solid #e4e4e7;
        }
        .setting-section:last-of-type {
            border-bottom: none;
        }
        
        .section-header {
            display: flex;
            align-items: center;
            gap: 0.875rem;
            margin-bottom: 1.5rem;
        }
        .section-icon-wrap {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            background: #f4f4f5;
            border: 1px solid #e4e4e7;
            border-radius: 8px;
            color: #52525b;
        }
        .section-title {
            font-size: 1.0625rem;
            font-weight: 600;
            color: #18181b;
            letter-spacing: -0.01em;
            margin: 0;
        }
        
        /* Premium Form Controls */
        .premium-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: #18181b;
            margin-bottom: 0.5rem;
            display: block;
        }
        .premium-input, .premium-textarea {
            width: 100%;
            padding: 0.625rem 1rem;
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
        .form-hint {
            font-size: 0.8125rem;
            color: #71717a;
            margin-top: 0.5rem;
        }
        
        /* Action Footer */
        .action-footer {
            padding: 1.5rem 2.5rem;
            background: #fafafa;
            border-top: 1px solid #e4e4e7;
            display: flex;
            justify-content: flex-end;
        }

        /* Buttons */
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
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        .btn-premium-primary:hover {
            background: #137c6a; border-color: #137c6a;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        
        .code-snippet {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
            font-size: 0.75rem;
            color: #52525b;
            background: #f4f4f5;
            padding: 0.125rem 0.375rem;
            border-radius: 4px;
            border: 1px solid #e4e4e7;
        }
        
        @media (max-width: 768px) {
            .setting-section { padding: 1.5rem; }
            .action-footer { padding: 1.5rem; }
        }
    </style>

    <div class="container-fluid mt-4 px-0">
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            
            <div class="panel-container mb-5">
                
                <!-- 1. Pengaturan Inti Sistem -->
                <div class="setting-section">
                    <div class="section-header">
                        <div class="section-icon-wrap">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                        </div>
                        <h3 class="section-title">Identitas Aplikasi</h3>
                    </div>
                    
                    <div style="max-width: 520px;">
                        <label class="premium-label">Nama Aplikasi</label>
                        <input type="text" name="app_name" value="GlucoWise ML Screening" class="premium-input">
                        <div class="form-hint">Nama ini akan digunakan pada seluruh tajuk dan surel notifikasi sistem.</div>
                    </div>
                </div>

                <!-- 2. Manajemen FAQ -->
                <div class="setting-section">
                    <div class="section-header">
                        <div class="section-icon-wrap">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                        </div>
                        <h3 class="section-title">Pusat Bantuan (FAQ)</h3>
                    </div>
                    
                    <div>
                        <label class="premium-label">Konten Pertanyaan & Jawaban</label>
                        <textarea name="faq_content" rows="7" class="premium-textarea" placeholder='[{"q":"Apa itu GlucoWise?","a":"Sistem deteksi dini..."}]'></textarea>
                        <div class="form-hint">Harap mematuhi struktur JSON yang valid. Contoh: <span class="code-snippet">[{"q": "Pertanyaan", "a": "Jawaban"}]</span></div>
                    </div>
                </div>
                
                <!-- 3. Manajemen Informasi Kontak -->
                <div class="setting-section">
                    <div class="section-header">
                        <div class="section-icon-wrap">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        </div>
                        <h3 class="section-title">Informasi Kontak & Darurat</h3>
                    </div>
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="premium-label">Email Dukungan Pelanggan</label>
                            <input type="email" name="contact_email" value="support@glucowise.test" class="premium-input">
                        </div>
                        <div class="col-md-6">
                            <label class="premium-label">Nomor Telepon Darurat</label>
                            <input type="text" name="contact_phone" value="119" class="premium-input">
                        </div>
                    </div>
                </div>

                <div class="action-footer">
                    <button type="submit" class="btn-premium-primary">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                        Simpan Pengaturan
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
