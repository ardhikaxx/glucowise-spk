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

                <form method="POST" action="{{ route('screening.store') }}">
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
</x-app-layout>
