@extends('admin.layout.app')

@section('konten')
    <section id="home" class="bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Selamat datang {{ Auth::user()->name }}</h2>
                    <p>Layanan pijat resmi yang telah meraih berbagai penghargaan dalam industri kesehatan dan kebugaran. Kami berkomitmen untuk memberikan pengalaman pijat terbaik melalui sentuhan profesional dari para ahli pijat bersertifikasi.</p>
                </div>
                <div class="col-md-6">
                    <img src="/image/Vector.png" alt="Logo" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section id="admin" class="bg-dark text-white py-5">
        <div class="container">
            <h2 class="mb-4">Halaman Admin</h2>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card bg-secondary text-white">
                        <div class="card-body">
                            <h3 class="card-title">Manajemen Reservasi</h3>
                            <p class="card-text">Atur dan kelola reservasi pelanggan.</p>
                            <a href="/admin/data-reservasi" class="btn btn-primary">Kelola Reservasi</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card bg-secondary text-white">
                        <div class="card-body">
                            <h3 class="card-title">Manajemen Pelayan</h3>
                            <p class="card-text">Atur dan kelola data pelayan.</p>
                            <a href="/admin/data-karyawan" class="btn btn-primary">Kelola Pelayan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section id="kontak" class="bg-light py-5">
        <div class="container"> 
            <h2>Kontak</h2>
            <ul class="list-unstyled">
                <li><a href="https://www.instagram.com/pijat.spa.purwakarta/" target="_blank" class="text-dark"><i class="ri-instagram-fill"></i> @pijat.spa.purwakarta</a></li>
                <li><a href="https://wa.me/message/4UZ5LVIXJPELD1" target="_blank" class="text-dark"><i class="ri-whatsapp-line"></i> WhatsApp</a></li>
            </ul>
        </div>
    </section> --}}

 @endsection