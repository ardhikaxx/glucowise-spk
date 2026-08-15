<x-app-layout>
    <x-slot name="header">
        <h2 class="fs-4 mb-0">Form Skrining Diabetes Melitus Tipe 2</h2>
    </x-slot>

    <div class="container mt-4 mb-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white fw-semibold">
                Isi kuesioner medis berikut berdasarkan kondisi Anda saat ini.
            </div>
            <div class="card-body p-4">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form id="screeningForm" method="POST" action="{{ route('screening.store') }}">
                    @csrf
                    <div class="row g-4">
                        @foreach($attributes as $attr)
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-secondary">{{ ucwords(str_replace('_', ' ', $attr->name)) }}</label>
                            <select name="{{ $attr->name }}" class="form-select border-primary-subtle" required>
                                <option value="">-- Pilih --</option>
                                @foreach(explode(',', $attr->possible_values) as $val)
                                    <option value="{{ trim($val) }}">{{ trim($val) }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endforeach
                    </div>
                    <div class="mt-5 pt-3 border-top">
                        <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold">Analisis Risiko Kesehatan Sekarang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="aiLoadingOverlay" class="d-none position-fixed top-0 start-0 w-100 h-100 bg-white" style="z-index: 9999; opacity: 0.95;">
        <div class="d-flex flex-column justify-content-center align-items-center h-100 text-center px-4">
            <div class="spinner-border text-primary mb-4" style="width: 4rem; height: 4rem; border-width: 0.25em;" role="status"></div>
            <h2 class="fw-bold mb-2">Memproses Analisis...</h2>
            <p class="text-muted fs-5">AI sedang mengevaluasi ratusan variabel kesehatan Anda berdasarkan Standar Kemenkes RI.</p>
        </div>
    </div>

    <script>
        document.getElementById('screeningForm').addEventListener('submit', function() {
            document.getElementById('aiLoadingOverlay').classList.remove('d-none');
            // Slight delay before submitting just for effect
            setTimeout(() => { this.submit(); }, 500); 
        });
    </script>
</x-app-layout>
