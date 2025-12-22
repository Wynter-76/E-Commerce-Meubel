<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Admin | Dwijaya Mebel')</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>
<body>

    {{-- NAVBAR ADMIN --}}
    @include('layouts.navbar_admin')

    {{-- FLASH MESSAGE --}}
    {{-- @include('layouts.flash-message')
    @include('layouts.validasi') --}}

    {{-- KONTEN --}}
    <div class="container mt-4">
        @yield('content')
    </div>

    {{-- JS --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
</body>
</html>
