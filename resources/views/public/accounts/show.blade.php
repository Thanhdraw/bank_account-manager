@extends('public.layouts.app')

@section('content')
<h3>Chủ tài khoản: {{ $account->owner_name }}</h3>
<p>Số dư hiện tại: <strong>{{ number_format($account->balance, 2) }}</strong></p>

@if (session('status'))
<div class="alert alert-info">{{ session('status') }}</div>
@endif

<form method="POST" action="{{ route('accounts.deposit', $account->id) }}" class="mb-3">
    @csrf
    <div class="input-group">
        <input type="number" name="amount" step="0.01" class="form-control" placeholder="Số tiền nạp" required>
        <button class="btn btn-primary">Nạp tiền</button>
    </div>
</form>

<form method="POST" action="{{ route('accounts.withdraw', $account->id) }}">
    @csrf
    <div class="input-group">
        <input type="number" name="amount" step="0.01" class="form-control" placeholder="Số tiền rút" required>
        <button class="btn btn-danger">Rút tiền</button>
    </div>
</form>

<a href="{{ route('accounts.index') }}" class="btn btn-secondary mt-3">Quay lại danh sách</a>
@endsection