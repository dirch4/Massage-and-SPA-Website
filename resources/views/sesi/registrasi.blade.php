<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css -->

    <link rel="stylesheet" href="/css/pendaftaran.css">
    <link rel="stylesheet" href="/css/style.css">

    <!-- CDN Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container-fluid bg-hero ">


        <div class="row ">
            <div class="hero-logo">
                <div class="logo ">
                    <img src="/image/Vector.png" alt="">
                </div>
            </div>
        </div>
        @include('alert.pesan')
        @if ($errors->any())
          <script>
            document.addEventListener('DOMContentLoaded', function() {
              Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                html: '@foreach ($errors->all() as $error){{ $error }} <br> @endforeach'
              });
            });
          </script>
         @endif
        <div class="resgistrasi-baru ">
            <div class="registration-container">
                <h2 class="text-center">Form Registrasi</h2>
                <form action="" method="POST">
                    @csrf
                    <div class="kelas-asli ">

                        <div class="kelas-input-semua">
                            <div class="text-atas">
                                <h6>Nama</h6>
                            </div>
 
                            <div class="kelas-input">
                                <input type="text" name="name" placeholder="Nama" value="{{ old('name') }}" required>
                            </div>
                        </div>
                        <div class="kelas-input-semua">
                            <div class="text-atas">
                                <h6>Email</h6>
                            </div>

                            <div class="kelas-input">
                                <input type="text" name="email" value="{{ old('email') }}" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="kelas-input-semua">
                            <div class="text-atas">
                                <h6>No Telepon</h6>
                            </div>

                            <div class="kelas-input">
                                <input type="text" name="no_telp" value="{{ old('no_telp') }}" placeholder="No Telepon" required>
                            </div>
                        </div>
                       
                        <!-- alamat -->
                        <div class="kelas-semua ">
                            <div class="text-alamat">
                                <h6>Alamat</h6>
                            </div>

                            <div class="kelas-textarea">
                                <textarea name="alamat" placeholder="Alamat"  required>{{ old('alamat') }}</textarea>
                            </div>
                        </div>

                        <div class="kelas-input-semua-tanggal">
                            <div class="text-atas">
                                <h6>Password</h6>
                            </div>

                            <div class="kelas-input">
                                <input type="password" name="password" placeholder="Password" required>
                            </div>
                        </div>


                        <div class="kelas-input-semua">
                            <div class="text-atas">
                                <h6>Konfirmasi Password</h6>
                            </div>

                            <div class="kelas-input">
                                <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
                            </div>
                        </div>
                        
                        <div class="kelas-buat-akun">
                            <button class="mt-3 w-50 buat-akun" type="submit">Buat Akun</button>
                        </div>

                    </div>


                </form>
            </div>
        </div>
    </div>

</body>

</html>