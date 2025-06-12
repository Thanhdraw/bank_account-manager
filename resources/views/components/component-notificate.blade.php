@if (session('success'))
<script>
    Swal.fire({
            icon: 'success',
            title: 'Thành công!',
            text: '{{ session('success') }}',
            timer: 5000,
            showConfirmButton: false
        });
</script>
@endif

@if (session('error'))
<script>
    Swal.fire({
            icon: 'error',
            title: 'Lỗi!',
            text: '{{ session('error') }}',
            timer: 5000,
            showConfirmButton: false
        });
</script>
@endif