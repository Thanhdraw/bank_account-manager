@extends('public.layouts.app')

@section('content')
<form method="POST" action="{{ route('accounts.store') }}">
    @csrf
    <div class="mb-3">
        <label>Chủ tài khoản</label>
        <input type="text" name="owner_name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Mật Khẩu</label>

        <input type="number" name="password" class="form-control" required>
    </div>
    <button class="btn btn-success">Tạo</button>
</form>
@endsection