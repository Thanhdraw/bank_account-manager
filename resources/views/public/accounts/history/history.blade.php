<table class="table table-hover">
    <thead>
        <tr>
            <th>Ngày</th>
            <th>Loại</th>
            <th>Số tiền</th>
            <th>Số dư sau</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($info['data'] as $item)
            <tr>
                <td>{{ \Carbon\Carbon::parse($item['created_at'])->format('d/m/Y H:i') }}</td>
                <td>{{ \App\Enums\TypeTransaction::from($item['type'])->label() }}</td>
                <td>
                    <span class="badge {{ $item['type'] == 10 ? 'bg-success' : 'bg-danger' }}">
                        {{ $type[$item['type']] ?? 'Không rõ' }}
                    </span>
                </td>

                <td>{{ number_format($item['balance_after'], 0, ',', '.') }} đ</td>
            </tr>
        @endforeach
    </tbody>
</table>
