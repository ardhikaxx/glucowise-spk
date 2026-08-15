<x-app-layout>
    <x-slot name="header">
        <h2 class="fs-4 mb-0">Manajemen Pengguna & Role</h2>
    </x-slot>

    <div class="container mt-4">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Terdaftar Pada</th>
                                <th>Aksi Ubah Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td class="fw-semibold">{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('d M Y') }}</td>
                                <td>
                                    <form action="{{ route('admin.users.updateRole', $user->id) }}" method="POST" class="d-flex gap-2 m-0">
                                        @csrf
                                        @method('PATCH')
                                        <select name="role" class="form-select form-select-sm" style="width: auto;">
                                            <option value="user">User Biasa</option>
                                            <option value="admin">Administrator</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $users->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
