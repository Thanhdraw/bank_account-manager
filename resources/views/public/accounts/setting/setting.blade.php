<div class="tab-pane fade" id="settings" role="tabpanel">
    <div class="card shadow-sm">
        <div class="card-header bg-light">
            <h6 class="mb-0">
                <i class="fas fa-cog me-2"></i>Cài đặt tài khoản
            </h6>
        </div>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tên chủ tài khoản</label>
                        <input type="text" class="form-control" value="{{ $account->owner_name }}" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tên chủ tài khoản</label>
                        <input type="text" class="form-control" disabled value="{{ $account->number_account }}"
                            readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email thông báo</label>
                        <input type="email" class="form-control" placeholder="example@email.com">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Hạn mức rút tối đa</label>
                        <select class="form-select">
                            <option>1,000,000 VND</option>
                            <option>5,000,000 VND</option>
                            <option>10,000,000 VND</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" id="notifications">
                            <label class="form-check-label" for="notifications">
                                Nhận thông báo qua email
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Lưu cài đặt
                </button>
            </form>
        </div>
    </div>
</div>