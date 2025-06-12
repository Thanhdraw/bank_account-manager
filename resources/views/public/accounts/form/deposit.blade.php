<div class="col-md-6 mb-3">
    <div class="card shadow-sm">
        <div class="card-header bg-light">
            <h6 class="mb-0">
                <i class="fas fa-plus-circle me-2 text-success"></i>Nạp tiền
            </h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('accounts.deposit', $account->id) }}">
                @csrf
                <div class="mb-3">
                    <label for="deposit_amount" class="form-label">Số tiền nạp</label>
                    <div class="input-group">
                        <input type="number" id="deposit_amount" name="amount" step="0.01" class="form-control"
                            placeholder="0.00" required>
                        <span class="input-group-text">VND</span>
                    </div>
                </div>
                <button type="submit" class="btn btn-success w-100">
                    <i class="fas fa-plus me-2"></i>Nạp tiền
                </button>
            </form>
        </div>
    </div>
</div>