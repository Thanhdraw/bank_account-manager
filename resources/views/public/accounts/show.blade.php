@extends('public.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Account Info Card -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-light">
                    <h4 class="mb-0">
                        <i class="fas fa-user me-2"></i>Thông tin tài khoản
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="mb-2"><strong>Chủ tài khoản:</strong></p>
                            <p class="text-muted">{{ $account->owner_name }}</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-2"><strong>Số dư hiện tại:</strong></p>
                            <h5 class="text-success mb-0">
                                {{ number_format($account->balance, 2) }} VND
                            </h5>
                        </div>
                    </div>
                </div>
                <!-- Account Navigation Menu -->
                @include('public.layouts.partials.navbar')
            </div>

            <!-- Status Alert -->
            @if (session('status'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <i class="fas fa-info-circle me-2"></i>{{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <!-- Tab Content -->
            <div class="tab-content" id="accountTabContent">
                <!-- Transaction Tab -->
                <div class="tab-pane fade show active" id="transaction" role="tabpanel">
                    <div class="row">
                        <!-- Deposit Form -->
                        @include('public.accounts.form.deposit')
                        <!-- Withdraw Form -->
                        @include('public.accounts.form.withdraw')
                    </div>
                </div>

                <!-- History Tab -->
                @include('public.accounts.history.history')

                <!-- Settings Tab -->
                @include('public.accounts.setting.setting')
                <!-- Reports Tab -->
                @include('public.accounts.report.report')
            </div>

            <!-- Navigation -->
            <div class="text-center mt-4">
                <a href="{{ route('accounts.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Quay lại danh sách
                </a>
            </div>
        </div>
    </div>
</div>
@endsection