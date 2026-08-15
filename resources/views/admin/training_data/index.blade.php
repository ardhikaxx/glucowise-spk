<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="premium-header fs-3 mb-0">Manajemen Data Latih</h2>
                <p class="premium-subtitle mt-1 mb-0">Kelola dan gunakan dataset untuk melatih model Machine Learning.</p>
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
        }
        
        .panel-header-premium {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid #e4e4e7;
            background: #ffffff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .panel-title {
            font-weight: 600;
            font-size: 1rem;
            color: #18181b;
            letter-spacing: -0.01em;
            margin: 0;
        }
        
        /* Premium Buttons */
        .btn-premium-secondary {
            background: #ffffff;
            border: 1px solid #e4e4e7;
            color: #18181b;
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            text-decoration: none;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.02);
            cursor: pointer;
        }
        .btn-premium-secondary:hover {
            background: #fafafa;
            border-color: #d4d4d8;
            color: #18181b;
        }
        
        .btn-premium-primary {
            background: #1B9C85; border: 1px solid #1B9C85;
            color: #ffffff;
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }
        .btn-premium-primary:hover {
            background: #137c6a; border-color: #137c6a;
            color: #ffffff;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        /* Premium Table */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }
        .premium-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem;
        }
        .premium-table th {
            background: #fafafa;
            color: #71717a;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-size: 0.75rem;
            padding: 0.875rem 1.5rem;
            border-bottom: 1px solid #e4e4e7;
            text-align: left;
        }
        .premium-table td {
            padding: 1rem 1.5rem;
            color: #3f3f46;
            border-bottom: 1px solid #e4e4e7;
            vertical-align: middle;
        }
        .premium-table tbody tr {
            transition: background-color 0.15s ease;
        }
        .premium-table tbody tr:hover {
            background-color: #fafafa;
        }
        .premium-table tbody tr:last-child td {
            border-bottom: none;
        }
        
        /* Badges */
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.625rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.02em;
        }
        .badge-danger {
            background-color: #fff1f2;
            color: #e11d48;
            border: 1px solid #fecdd3;
        }
        .badge-success {
            background-color: #f0fdf4;
            color: #16a34a;
            border: 1px solid #bbf7d0;
        }

        /* DataTables Overrides */
        .dataTables_wrapper .dataTables_length, 
        .dataTables_wrapper .dataTables_filter {
            padding: 1.25rem 1.5rem 0.5rem 1.5rem;
            font-size: 0.875rem;
            color: #71717a;
        }
        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #e4e4e7;
            border-radius: 6px;
            padding: 0.375rem 0.75rem;
            margin-left: 0.5rem;
            outline: none;
            transition: border-color 0.2s;
            color: #18181b;
        }
        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: #09090b;
        }
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_paginate {
            padding: 1rem 1.5rem;
            font-size: 0.875rem;
            color: #71717a;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.375rem 0.75rem;
            margin: 0 0.125rem;
            border: 1px solid transparent;
            border-radius: 6px;
            cursor: pointer;
            color: #3f3f46 !important;
            transition: all 0.2s;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #fafafa !important;
            border-color: #e4e4e7 !important;
            color: #18181b !important;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #1B9C85 !important;
            color: #ffffff !important;
            border-color: #09090b !important;
            font-weight: 500;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            color: #ffffff !important;
        }
        table.dataTable.no-footer {
            border-bottom: 1px solid #e4e4e7;
        }
    </style>

    <div class="container-fluid mt-4 px-0">
        <div class="panel-container">
            <div class="panel-header-premium flex-column flex-md-row gap-3">
                <h5 class="panel-title">Dataset Diabetes Melitus Tipe 2</h5>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.training.export') }}" class="btn-premium-secondary">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                        Export Excel
                    </a>
                    <form action="{{ route('admin.training.train') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="btn-premium-primary">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                            Latih Model ML (Queue)
                        </button>
                    </form>
                </div>
            </div>

            <div class="table-wrapper">
                <table class="premium-table" id="dataset-table">
                    <thead>
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

    @push('scripts')
    <script>
        $(document).ready(function() {
            $('#dataset-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.training.index') }}',
                dom: '<"d-flex flex-column flex-md-row justify-content-between align-items-center"lf>rt<"d-flex flex-column flex-md-row justify-content-between align-items-center"ip>',
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    infoEmpty: "Tidak ada data yang tersedia",
                    infoFiltered: "(disaring dari total _MAX_ data)",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "→",
                        previous: "←"
                    }
                },
                columns: [
                    {data: 'id', name: 'id', render: function(data) {
                        return `<span style="color: #18181b; font-weight: 500;">${data}</span>`;
                    }},
                    {data: 'age_group', name: 'age_group'},
                    {data: 'gender', name: 'gender'},
                    {data: 'bmi_category', name: 'bmi_category'},
                    {data: 'hypertension_history', name: 'hypertension_history'},
                    {data: 'classification_result', name: 'classification_result', 
                     render: function(data) {
                        if(data === 'Risiko Tinggi') {
                            return `<span class="status-badge badge-danger">${data}</span>`;
                        } else if(data === 'Risiko Rendah') {
                            return `<span class="status-badge badge-success">${data}</span>`;
                        }
                        return data;
                     }}
                ]
            });
        });
    </script>
    @endpush
</x-app-layout>
