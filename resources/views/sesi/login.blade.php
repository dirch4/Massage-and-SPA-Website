</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="/css/login.css">
  <link rel="stylesheet" href="/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

  <div class="container">
    <div class="header">
        <div class="logokUtama">
            <div class="logoUtama">
                <img src="/image/Vector.png" alt="">
                <h1>pijatNspa</h1>
            </div>
        </div>
        <nav>
            <a href="/#home">Beranda</a>
            <a href="/reservasi">Reservasi</a>
            <a href="/#jasa">Perawatan</a>
            <a href="/#kontak">Kontak</a>
        </nav>
        <nav>
        </nav>
    </div>
  </div>
</div>


  <div class="container-fluid bg-hero">
    <div class="row">
      <div class="hero-logo">
        <div class="logo">
          <img src="/image/Vector.png" alt="">
        </div>
      </div>
    </div>

    <div class="container-baru">

      <div class="login-container">
        
        <div class="login-container-baru">
          @include('alert.pesan')
          <form  action="" method="POST">
            @csrf
            <div class="ema-il">
              <div class="text-mail">
                <h6>E-mail</h6>
              </div>

              <div class="email-asli">
                <div class="box-email">
                  <input type="text" name="email" value="{{ old('email') }}" placeholder="Masukan Email Anda" >
                </div>
              </div>
            </div>

            <div class="pas-word">
              <div class="text-pasword">
                <h6>Password</h6>
              </div>

              <div class="box-pasword">
                <input type="password" name="password" placeholder="Masukan Password" >
              </div>
            </div>

            <div class="kelas-login-bawah">
              <button type="submit" name="login">Login</button>
            </div>
            <div class="text-buat-akun">
              <span>Belum punya akun?</span>
              <a href="/sesi/registrasi">Buat akun</a>
            </div>
          </form>
        </div>

      </div>

    </div>
  </div>
</body>

</html>
