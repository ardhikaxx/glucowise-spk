<x-app-layout>
    <x-slot name="header">
        <h2 class="fs-4 mb-0">Tambah Artikel Baru</h2>
    </x-slot>

    <div class="container mt-4">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.articles.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kategori (ID)</label>
                        <input type="number" name="category_id" value="1" required class="form-control">
                        <div class="form-text">Gunakan ID Kategori (misal: 1)</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Artikel</label>
                        <input type="text" name="title" required class="form-control">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Konten Edukasi</label>
                        <textarea name="content" rows="6" required class="form-control"></textarea>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary px-4 fw-semibold">Simpan Artikel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
