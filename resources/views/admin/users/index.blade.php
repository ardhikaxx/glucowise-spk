<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="premium-header fs-3 mb-0">Manajemen Pengguna & Role</h2>
                <p class="premium-subtitle mt-1 mb-0">Kelola informasi dan hak akses seluruh pengguna sistem.</p>
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
            letter-spacing: 0.06em;
            font-size: 0.75rem;
            padding: 1rem 1.5rem;
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

        /* Form & Buttons */
        .premium-select-sm {
            padding: 0.375rem 2rem 0.375rem 0.75rem;
            font-size: 0.8125rem;
            color: #18181b;
            background-color: #ffffff;
            border: 1px solid #e4e4e7;
            border-radius: 6px;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%2371717a' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.5rem center;
            background-size: 14px;
            transition: all 0.2s ease;
            cursor: pointer;
            font-weight: 500;
        }
        .premium-select-sm:focus {
            outline: none;
            border-color: #1B9C85; box-shadow: 0 0 0 1px #1B9C85;
        }
        
        .btn-premium-accent {
            background: #ffffff;
            border: 1px solid #e4e4e7;
            color: #09090b;
            font-size: 0.8125rem;
            font-weight: 600;
            padding: 0.375rem 1rem;
            border-radius: 6px;
            transition: all 0.2s ease;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.03);
            cursor: pointer;
        }
        .btn-premium-accent:hover {
            border-color: #d4d4d8;
            background: #fafafa;
        }

        /* User Profile Style */
        .user-profile {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #fafafa;
            border: 1px solid #e4e4e7;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #3f3f46;
            font-weight: 600;
            font-size: 0.875rem;
            flex-shrink: 0;
        }
        .user-details {
            display: flex;
            flex-direction: column;
            gap: 0.125rem;
        }
        .user-name {
            font-weight: 600;
            color: #18181b;
            font-size: 0.875rem;
            letter-spacing: -0.01em;
        }
        .user-email {
            font-size: 0.8125rem;
            color: #71717a;
        }
        
        /* Pagination Override */
        .pagination-container {
            padding: 1.25rem 1.5rem;
            border-top: 1px solid #e4e4e7;
            background: #ffffff;
        }
        .pagination {
            margin-bottom: 0;
            gap: 0.25rem;
        }
        .page-item.active .page-link {
            background-color: #1B9C85; border-color: #1B9C85;
            color: #ffffff;
            border-radius: 6px;
        }
        .page-link {
            color: #3f3f46;
            border-color: transparent;
            border-radius: 6px;
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
            font-weight: 500;
        }
        .page-link:hover {
            color: #18181b;
            background-color: #f4f4f5;
            border-color: transparent;
        }
        .page-item.disabled .page-link {
            color: #a1a1aa;
            background-color: transparent;
        }
    </style>

    <div class="container-fluid mt-4 px-0">
        <div class="panel-container mb-5">
            <div class="table-wrapper">
                <table class="premium-table">
                    <thead>
                        <tr>
                            <th>Pengguna</th>
                            <th>Terdaftar Pada</th>
                            <th>Role & Hak Akses</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                                <div class="user-profile">
                                    <div class="user-avatar">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <div class="user-details">
                                        <span class="user-name">{{ $user->name }}</span>
                                        <span class="user-email">{{ $user->email }}</span>
                                    </div>
                                </div>
                            </td>
                            <td style="font-size: 0.8125rem; color: #52525b; font-weight: 500;">
                                {{ $user->created_at->format('d M Y') }}
                            </td>
                            <td>
                                <form action="{{ route('admin.users.updateRole', $user->id) }}" method="POST" class="d-flex align-items-center gap-2 m-0">
                                    @csrf
                                    @method('PATCH')
                                    <select name="role" class="premium-select-sm" style="min-width: 150px;">
                                        <option value="user" {{ (isset($user->role) && $user->role == 'user') ? 'selected' : '' }}>User Biasa</option>
                                        <option value="admin" {{ (isset($user->role) && $user->role == 'admin') ? 'selected' : '' }}>Administrator</option>
                                    </select>
                                    <button type="submit" class="btn-premium-accent">Update</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="pagination-container d-flex justify-content-end">
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</x-app-layout>
