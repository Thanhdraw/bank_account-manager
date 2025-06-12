<!doctype html>
<html lang="en">

<head>
    <title>Bank Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body class="container mt-5">
    <h1 class="mb-4">Quản lý tài khoản ngân hàng</h1>
    @yield('content')

    <x-component-notificate />


</body>

</html>
{{--
<script>
    setTimeout(() => {
        let alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            let bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 5000); 
</script> --}}