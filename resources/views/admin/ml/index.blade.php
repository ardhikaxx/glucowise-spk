<x-app-layout>
    <x-slot name="header">
        <h2 class="fs-4 mb-0">Laboratorium Machine Learning & Data</h2>
    </x-slot>

    <div class="container mt-4">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                
                <!-- Preprocessing -->
                <div class="mb-5 border-bottom pb-4">
                    <h4 class="fw-bold text-primary mb-3">1. Preprocessing Data & Pembersihan</h4>
                    <p class="text-muted mb-4">Fitur ini menjalankan algoritma otomatis untuk <strong>Normalisasi</strong>, <strong>Validasi Data Kosong (Null Handling)</strong>, serta mendeteksi <strong>Duplikasi Data</strong> pada Dataset Training sebelum dilatih.</p>
                    <form action="{{ route('admin.ml.preprocess') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning px-4 fw-semibold text-dark shadow-sm">Jalankan Preprocessing Engine</button>
                    </form>
                </div>

                <!-- K-Fold / Holdout -->
                <div class="mb-5 border-bottom pb-4">
                    <h4 class="fw-bold text-purple text-primary mb-3">2. Pengujian Validitas Ilmiah (Model Validation)</h4>
                    <p class="text-muted mb-4">Lakukan pengujian secara komprehensif untuk memastikan performa model Naive Bayes tidak mengalami <em>overfitting</em>.</p>
                    <form action="{{ route('admin.ml.validate') }}" method="POST" class="d-flex align-items-end gap-3">
                        @csrf
                        <div class="flex-grow-1" style="max-width: 400px;">
                            <label class="form-label fw-semibold">Metode Evaluasi</label>
                            <select name="method" class="form-select shadow-sm">
                                <option value="holdout">Holdout Validation (Skema 70% Train : 30% Test)</option>
                                <option value="k-fold">K-Fold Cross Validation (K=10)</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 fw-semibold shadow-sm">Mulai Analisis Validasi</button>
                    </form>
                </div>

                <!-- ROC Curve -->
                <div>
                    <h4 class="fw-bold text-dark mb-3">Visualisasi Kinerja (ROC Curve)</h4>
                    <p class="text-muted mb-4">Area Under Curve (AUC) dan Receiver Operating Characteristic (ROC) untuk memonitor Trade-off antara True Positive Rate dan False Positive Rate.</p>
                    <div class="bg-light d-flex flex-column align-items-center justify-content-center text-secondary border border-dashed rounded" style="height: 300px;">
                        <span class="fs-1 mb-2">📊</span>
                        <span>Render Engine ROC Curve Chart.js (Menunggu Trigger Validasi)</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
