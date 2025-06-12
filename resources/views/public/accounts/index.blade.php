@extends('public.layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Danh sách tài khoản</h3>
        <a href="{{ route('accounts.create') }}" class="btn btn-primary">
            + Tạo tài khoản
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="px-4 py-3">ID</th>
                            <th class="py-3">Chủ tài khoản</th>
                            <th class="py-3">Số dư</th>
                            <th class="py-3 text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($accounts as $account)
                        <tr>
                            <td class="px-4 py-3">
                                <span class="text-muted">#{{ $account->id }}</span>
                            </td>
                            <td class="py-3">
                                <strong>{{ $account->owner_name }}</strong>
                            </td>
                            <td class="py-3">
                                <span class="badge bg-success fs-6">
                                    {{ number_format($account->balance, 0, ',', '.') }}đ
                                </span>
                            </td>
                            <td class="py-3 text-center">
                                <a href="{{ route('accounts.show', $account) }}" class="btn btn-outline-primary btn-sm">
                                    Xem chi tiết
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border: none;
        border-radius: 10px;
    }

    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
    }

    .btn {
        border-radius: 6px;
    }

    .shadow-sm {
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
</style>
@endsection