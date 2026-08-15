<x-app-layout>
    <x-slot name="header">
        <h2 class="fs-4 mb-0">Sistem Pemantauan (Audit Log)</h2>
    </x-slot>

    <div class="container mt-4">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-4">Riwayat Aktivitas Penting Sistem</h5>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>ID Log</th>
                                <th>Aktivitas (Status)</th>
                                <th>Waktu Eksekusi</th>
                                <th>Akurasi Dicatat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($logs as $log)
                            <tr>
                                <td class="fw-semibold text-secondary">#{{ $log->id }}</td>
                                <td>Training ML ({{ $log->status }})</td>
                                <td>{{ $log->created_at }}</td>
                                <td><span class="badge bg-success">{{ $log->accuracy }}%</span></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">Belum ada riwayat aktivitas yang tercatat.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $logs->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
