<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MNS</title>
    <!-- css -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/produk.css">
    <link rel="stylesheet" href="/css/pemijat.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >

    <!-- <link rel="stylesheet" href="/mentahan/navbar_nav.css"> -->

    <!-- CDN Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">


</head>

<body>
    <section id="home">
        <div class="container-fluid bg-hero ">
            <div class="container">
                <div class="header">
                    <div class="logokUtama">
                        <div class="logoUtama">
                            <img src="/image/Vector.png" alt="">
                            <h1>pijatNspa</h1>
                        </div>
                    </div>


                    <nav>
                        <a href="#home">Beranda</a>
                        <a href="/reservasi">Reservasi</a>
                        <a href="#jasa">Perawatan</a>
                        <a href="#kontak">Kontak</a>
                    </nav>
                    <nav>

                    </nav>


                    <div class="logot">
                        <div class="logotKeluar">
                           @if (Auth::check())
                                <a href="/logout">Logout</a>
                                @else
                                <a href="/login">Login</a>
                           @endif
                        </div>
                    </div>

                </div>

            </div>

            <div class="row ">
                <div class="hero-logo">
                    <div class="logo ">
                        <img src="/image/Vector.png" alt="">
                    </div>
                </div>
                {{-- <div class="text-reservasi">
                    <div class="reservasi">
                        <h1>Reservasi Sekarang</h1>
                    </div>
                </div> --}}

                <div class="layanan">
                    <span>Layanan Pijat Terbaik dengan Penghargaan dan Ahli-Ahli Bersertifikasi</span>
                </div>

                <div class="selamat-datang">
                    <div class="datang">
                        <span>
                            Selamat datang di MNS, layanan pijat resmi yang telah meraih berbagai penghargaan dalam
                            industri kesehatan dan kebugaran. Kami berkomitmen untuk memberikan pengalaman pijat terbaik
                            melalui sentuhan profesional dari para ahli pijat bersertifikasi.
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section">

    </div>
    <div class="container  mt-5 class-atas-1">
        <div class="row  biar-1">
            <div class="col-2">
                <div class="box box-kotak-1">
                    <img src="/image/OIG4 1.png" alt="">
                </div>
            </div>

            <div class="col-9">
                <div class="box box-text-1">
                    <span>
                        Selamat datang di MNS, layanan pijat resmi yang telah meraih berbagai penghargaan dalam industri
                        kesehatan dan kebugaran. Kami berkomitmen untuk memberikan pengalaman pijat terbaik melalui
                        sentuhan profesional dari para ahli pijat bersertifikasi.
                    </span>
                </div>
            </div>
        </div>
    </div>



    <div class="container  mt-5 class-atas-2">
        <div class="row  biar-2">
            <div class="col-9">
                <div class="box box-text-2">
                    <span>
                        Setiap terapis pijat kami memiliki sertifikasi profesional, menjamin Anda mendapatkan perawatan
                        terbaik dan sesuai standar tertinggi.
                    </span>
                </div>
            </div>


            <div class="col-2">
                <div class="box box-kotak-2">
                    <img src="/image/reservasiii.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="container  mt-5 class-atas-1">
        <div class="row  biar-1">
            <div class="col-2">
                <div class="box box-kotak-1">
                    <img src="/image/Turns Out There Are Actual Relationship Benefits to Couples Massages 2.png" alt="">
                </div>
            </div>

            <div class="col-9">
                <div class="box box-text-1">
                    <span>
                        Pesan sesi pijat Anda dengan mudah melalui sistem reservasi online kami. Pilih jenis pijat,
                        waktu yang diinginkan, dan terapis favorit Anda, semuanya dalam beberapa klik saja. Kami juga
                        menyediakan layanan konsultasi untuk membantu Anda memilih terapi pijat yang paling sesuai
                        dengan kebutuhan Anda.
                    </span>
                </div>
            </div>
        </div>
    </div>





    <div class="menu">
        <h1>Perawatan Kami</h1>
    </div>

    <!-- section Treatment -->
    {{-- <section id="jasa">
        @foreach($treatments as $treatment)
            <div class="cardJasa1">
                <div class="card">
                    <img src="{{ url('images/' . $treatment->gambar) }}" alt="Card Image" class="card-img">
                    <div class="card-content">
                        <div class="cardDalam">
                            <h3 class="card-title ">{{ $treatment->nama_perawatan }}</h3>
                            <div class="classS">
                                <p class="card-description">
                                <div class="colorList">                
                                      <ol>{{ $treatment->deskripsi }}   
                                        </ol>                        
                                </div>
                                </p>
                            </div>
                            <div class="classKlik">
                                <button class="card-button">Mulai dari Rp.{{ number_format($treatment->harga, 0, ',', '.') }}</button>
                                <a href="/reservasi"><button class="card-button">Klik Disini Untuk Pesan</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section> --}}
    
    <section id="jasa">
        <div class="cardJasa1">
            @foreach($treatments as $treatment)
                <div class="card">
                    <img src="{{ url('images/' . $treatment->gambar) }}" alt="Card Image" class="card-img">
                    <div class="card-content">
                        <div class="cardDalam">
                            <h3 class="card-title ">{{ $treatment->nama_perawatan }}</h3>
                            <div class="classS">
                                <p class="card-description">{{ $treatment->deskripsi }}</p>
                            </div>
                            <div class="classKlik">
                                <button class="card-button">Mulai dari Rp.{{ number_format($treatment->harga, 0, ',', '.') }}</button>
                                <a href="/reservasi"><button class="card-button">Klik Disini Untuk Pesan</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    
    



    <section id="pelayan">
        <main>
            <div class="textPelayan">
                <h1>Pelayan</h1>
            </div>
            <section class="owners">
                <div class="owners-container">
                    @foreach($karyawans as $karyawan)
                    <div class="owner">
                        <img src="{{ url('images/profile/' . $karyawan->foto) }}" alt="Foto Pemilik 1">
                        <div class="owner-info">
                            <h3>{{ $karyawan->nama }}</h3>
                            <p>Spesialis </p>
                            <p>{{ $karyawan->spesialis }}</p>

                        </div>
                    </div>
                    @endforeach 
                </div>
            </section>


        </main>
    </section>

    <section id="kontak">
        <!-- Section FOOTER -->
        <footer class="lebih">
            <div class="container-fluid">
                <div class="row class-rowk">
                    <div class="col-md-4  logo-class ">
                        <div class="logok ">
                            <img src="/image/Vector.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="me">
                            <h3>kontak</h3>
                            <!-- <hr> -->
                            <div class="icon-ig mt-5">
                                <!-- <i class="ri-whatsapp-line"></i><span>Phone/WhatsApp</span> -->
                                <li><a href="https://www.instagram.com/pijat.spa/" target="_blank"><i
                                            class="ri-instagram-fill"> @pijat.spa.</i>
                                    </a>
                                </li>

                            </div>

                            <div class="icon-ig mt-5    ">
                                <!-- <i class="ri-whatsapp-line"></i><span>Phone/WhatsApp</span> -->
                                <li><a href="https://wa.me/message/4UZ5LVIXJPELD1" target="_blank"><i class="ri-whatsapp-line">WhatsApp</i>
                                    </a>
                                </li>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ab ">
                        <div class="about">
                            <h3>kata-kata Mutiara</h3>
                            <hr>
                            <div class="text-about">
                                <span>
                                    Kami selalu berkomitmen memberikan layanan pijat dan spa terbaik seperti pijat refleksi untuk relaksasi, pijat pasangan untuk momen spesial bersama orang terkasih, dan pijat perawatan tubuh untuk kesehatan optimal. Baik untuk individu yang ingin meremajakan diri maupun perusahaan yang ingin memberikan layanan relaksasi bagi karyawan mereka. Kami juga menyediakan paket perawatan spa yang mencakup aromaterapi, facial, dan body scrub. Selain itu, kami menghadirkan layanan spa eksklusif untuk momen spesial seperti hari ibu, ulang tahun, atau sekadar untuk memanjakan diri Anda.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row mt-5">
                    <span class="text-center by">
                        Created for untuk kita semua
                        <p>@Copyright 2024</p>
                    </span>
                </div>
            </div>
        </footer>

    </section>




    <script src="/js/index.js"></script>








</body>

</html>