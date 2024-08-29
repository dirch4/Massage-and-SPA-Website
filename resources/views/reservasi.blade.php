<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi</title>
    <!-- CDN Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            background-color: #bb9a5c; /* Ubah dengan warna latar belakang yang sesuai */
        }

        .top-right-button {
            position: absolute;
            top: 20px;
            right: 20px;
            color: aliceblue;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="top-right-button">
        <a href="/" class="btn btn-secondary">Kembali ke halaman utama</a>
    </div>
    @if (Session::has('pesan'))
          <script>
            document.addEventListener('DOMContentLoaded', function() {
              Swal.fire({
                icon: 'info',
                title: '{{ Session::get('pesan') }}',
                html: `
                    Harap Hubungi Admin kami melalui 
                    <a href="{{ Session::get('whatsappUrl') }}">WhatsApp</a>,
                    untuk melakukan proses pembayaran.
                `,
                showCloseButton: true,
                showCancelButton: true,
              });
            });
          </script>
    @endif
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
    <div class="container mt-5">
        <h1 class="text-center mb-4">Formulir Reservasi</h1>
        <form action="" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="nama" value="{{ Auth::user()->name }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}"  required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Nomor Telepon</label>
                <input type="tel" class="form-control" id="phone" name="no_telp" value="{{ Auth::user()->no_telp }}" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Tanggal Reservasi</label>
                <input type="date" class="form-control" id="date" name="tanggal" required>
            </div>
            <div class="mb-3">
                <label for="jam" class="form-label">Jam Kerja</label>
                <select class="form-select" id="jam" name="jam_kerja" required>
                    <option value="">Pilih Jam Kerja</option>
                    <option value="08:00 - 11:00">08:00 - 11:00</option>
                    <option value="13:00 - 17:00">13:00 - 17:00</option>
                    <option value="19:00 - 22:00">19:00 - 22:00</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="service" class="form-label">Jenis Layanan</label>
                <select class="form-select" id="service" name="id_perawatan" required>
                    <option value="">Pilih Layanan</option>
                    @foreach ($layanans as $layanan)
                    <option value="{{ $layanan->id }}">{{ $layanan->nama_perawatan }} – {{ $layanan->durasi }}</option>
                    @endforeach
                    
                </select>
            </div>
            <div class="mb-3">
                <label for="notes" class="form-label">Catatan Tambahan</label>
                <textarea class="form-control" id="notes" rows="3" name="catatan"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+rn5S+L+qtZ5dN3v1D3yD0KVd1f" crossorigin="anonymous">
    </script>
</body>

</html>
