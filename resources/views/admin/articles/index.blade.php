<x-app-layout>
    <x-slot name="header">
        <h2 class="fs-4 mb-0">Manajemen Artikel Edukasi</h2>
    </x-slot>

    <div class="container mt-4">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold mb-0">Daftar Artikel</h5>
                    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary btn-sm fw-semibold">+ Tambah Artikel</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Judul Artikel</th>
                                <th>Tanggal Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($articles as $article)
                            <tr>
                                <td class="fw-semibold">{{ $article->title }}</td>
                                <td>{{ $article->created_at->format('d M Y') }}</td>
                                <td>
                                    <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" class="m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-4 text-muted">Belum ada artikel edukasi.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $articles->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
