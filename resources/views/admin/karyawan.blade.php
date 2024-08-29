@extends('admin.layout.app')

@section('konten')
@include('alert.pesan')
<div class="container">
    <h2 class="mt-4">Kelola Pelayan</h2>
    <!-- Form Pencarian -->
    <form action="{{ route('karyawan.search') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="user_query" class="form-control" placeholder="Cari nama karyawan..." value="{{ request('user_query') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Email</th>
                <th scope="col">No Telepon</th>
                <th scope="col">Umur</th>
                <th scope="col">Foto</th>
                <th scope="col">Spesialis</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = $data->firstItem() ?>
            @foreach ($data as $row)
            <tr>
                <th scope="row">{{ $no }}</th>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->jk }}</td>
                <td>{{ $row->email }}</td>
                <td>{{ $row->no_telp }}</td>
                <td>{{ $row->umur }}</td>
                <td><img src="{{ url('images/profile').'/'.$row->foto }}" alt="{{ $row->nama_perawatan }}" width="100"></td>
                <td>{{ $row->spesialis }}</td>
                <td>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editTreatmentModal-{{ $row->id }}"><i class="ri-edit-line"></i> Edit</button>
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteTreatmentModal-{{ $row->id }}"><i class="ri-delete-bin-line"></i> Hapus</button>
                </td>
            </tr>
            <?php $no++ ?>
            @endforeach
        </tbody>
    </table>
    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $data->appends(request()->input())->links('pagination::bootstrap-4') }}
    </div>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTreatmentModal"><i class="ri-add-line"></i> Tambah Pelayan</button>
</div>

<!-- Modal Edit Treatment -->
@foreach ($data as $row)
<div class="modal fade" id="editTreatmentModal-{{ $row->id }}" tabindex="-1" aria-labelledby="editTreatmentModalLabel-{{ $row->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTreatmentModalLabel-{{ $row->id }}">Edit Pelayan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/admin/update-karyawan/'.$row->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="editNamaTreatment-{{ $row->id }}" class="form-label">Nama Pelayan</label>
                        <input type="text" class="form-control" id="editNamaTreatment-{{ $row->id }}" name="nama" value="{{ $row->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="editJK-{{ $row->id }}" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="jk" name="jk" required>
                            <option disabled value="">Pilih Jenis Kelamin</option>
                            <option value="Pria" {{ $row->jk == 'Pria' ? 'selected' : '' }}>Pria</option>
                            <option value="Wanita" {{ $row->jk == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editEmail-{{ $row->id }}" class="form-label">Email</label>
                        <input type="text" class="form-control" id="editEmail-{{ $row->id }}" name="email" value="{{ $row->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="editNotelp-{{ $row->id }}" class="form-label">No Telepon</label>
                        <input type="number" class="form-control" id="editNotelp-{{ $row->id }}" name="no_telp" value="{{ $row->no_telp }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="editUmur-{{ $row->id }}" class="form-label">Umur</label>
                        <input type="number" class="form-control" id="editUmur-{{ $row->id }}" name="umur" value="{{ $row->umur }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="editAlamat-{{ $row->id }}" class="form-label">Alamat</label>
                        <textarea class="form-control" id="editAlamat-{{ $row->id }}" name="alamat" required>{{ $row->alamat }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editFoto-{{ $row->id }}" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="editFoto-{{ $row->id }}"  value="{{ $row->gambar }}"  name="foto">
                        <img src="{{ url('images/profile').'/'.$row->foto }}" alt="{{ $row->foto }}" width="100" class="mt-2">
                    </div>
                    <div class="mb-3">
                        <label for="editSpesialis-{{ $row->id }}" class="form-label">Spesialis</label>
                        <input type="text" class="form-control" id="editSpesialis-{{ $row->id }}" name="spesialis" value="{{ $row->spesialis }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Treatment -->
<div class="modal fade" id="deleteTreatmentModal-{{ $row->id }}" tabindex="-1" aria-labelledby="deleteTreatmentModalLabel-{{ $row->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteTreatmentModalLabel-{{ $row->id }}">Hapus Treatment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus treatment <strong>{{ $row->nama_perawatan }}</strong>?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ url('/admin/hapus-karyawan/'.$row->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Modal Tambah Treatment -->
<div class="modal fade" id="addTreatmentModal" tabindex="-1" aria-labelledby="addTreatmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTreatmentModalLabel">Tambah Pelayan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/tambah-karyawan" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="namaTreatment" class="form-label">Nama Pelayan</label>
                        <input type="text" class="form-control" id="namaTreatment" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="jenisKelamin" name="jk" required>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="noTelepon" class="form-label">No Telepon</label>
                        <input type="number" class="form-control" id="noTelepon" name="no_telp" required>
                    </div>
                    <div class="mb-3">
                        <label for="umur" class="form-label">Umur</label>
                        <input type="number" class="form-control" id="umur" name="umur" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="umur" name="alamat" required>
                    </div>
                    <div class="mb-3">
                        <label for="fotoTreatment" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="fotoTreatment" name="foto" required>
                    </div>
                    <div class="mb-3">
                        <label for="spesialis" class="form-label">Spesialis</label>
                        <input type="text" class="form-control" id="spesialis" name="spesialis" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
