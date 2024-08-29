<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - PijatNspa</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="/css/produk.css">
    <link rel="stylesheet" href="/css/pemijat.css">
    <link rel="stylesheet" href="/css/footer.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header class="bg-dark text-white p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logoUtama">
                {{-- <img src="/image/Vector.png" alt="Logo" style="width: 40px; height: 40px;"> --}}
                <h1 class="d-inline-block ml-2">Pijat N Spa</h1>
            </div>
            <nav>
                <a href="/admin" class="text-white mx-2">Dashboard</a>
                <a href="/admin/data-reservasi" class="text-white mx-2">Data Reservasi</a>
                <a href="/admin/data-treatment" class="text-white mx-2">Data Treatment</a>
                <a href="/admin/data-karyawan" class="text-white mx-2">Data Pelayan</a>
                <a href="/logout" class="text-white mx-2">Logout</a>
            </nav>
        </div>
    </header>

    @yield('konten')

    <footer class="bg-dark text-white py-3" style=" 
    bottom: 0;
    width: 100%;">
        <div class="container text-center">
            <p>&copy; 2024 pijatNspa. All rights reserved.</p>
        </div>
    </footer>

    <script src="/js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
