<x-app-layout>
    <x-slot name="header">
        <h2 class="fs-4 mb-0">Manajemen Data Latih (Dataset)</h2>
    </x-slot>

    <div class="container mt-4">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title fw-bold mb-0">Dataset Diabetes Melitus Tipe 2</h5>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.training.export') }}" class="btn btn-success btn-sm px-3">Export Excel</a>
                        <form action="{{ route('admin.training.train') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm px-3 fw-bold">▶ Latih Model ML (Queue)</button>
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered w-100" id="dataset-table">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Usia</th>
                                <th>Gender</th>
                                <th>BMI</th>
                                <th>Hipertensi</th>
                                <th>Target (Kelas)</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#dataset-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.training.index') }}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'age_group', name: 'age_group'},
                    {data: 'gender', name: 'gender'},
                    {data: 'bmi_category', name: 'bmi_category'},
                    {data: 'hypertension_history', name: 'hypertension_history'},
                    {data: 'classification_result', name: 'classification_result'}
                ]
            });
        });
    </script>
</x-app-layout>
