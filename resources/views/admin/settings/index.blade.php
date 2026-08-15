<x-app-layout>
    <x-slot name="header">
        <h2 class="fs-4 mb-0">Pengaturan Sistem, FAQ, & Kontak</h2>
    </x-slot>

    <div class="container mt-4">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <form action="{{ route('admin.settings.update') }}" method="POST">
                    @csrf
                    
                    <h5 class="fw-bold text-dark mb-3">1. Manajemen FAQ (Frequently Asked Questions)</h5>
                    <div class="mb-4">
                        <label class="form-label text-secondary">Daftar Pertanyaan & Jawaban (Format JSON/Teks)</label>
                        <textarea name="faq_content" rows="4" class="form-control" placeholder='[{"q":"Apa itu GlucoWise?","a":"Sistem deteksi dini..."}]'></textarea>
                    </div>
                    
                    <h5 class="fw-bold text-dark mb-3 mt-5">2. Manajemen Informasi Kontak</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label text-secondary">Email Dukungan Kesehatan</label>
                            <input type="email" name="contact_email" value="support@glucowise.test" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-secondary">Nomor Telepon Darurat</label>
                            <input type="text" name="contact_phone" value="119" class="form-control">
                        </div>
                    </div>

                    <h5 class="fw-bold text-dark mb-3 mt-5">3. Pengaturan Inti Sistem</h5>
                    <div class="mb-5">
                        <label class="form-label text-secondary">Nama Aplikasi</label>
                        <input type="text" name="app_name" value="GlucoWise ML Screening" class="form-control">
                    </div>

                    <div class="text-end border-top pt-3">
                        <button type="submit" class="btn btn-primary px-4 fw-semibold">Simpan Semua Pengaturan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
