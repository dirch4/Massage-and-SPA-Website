@extends('admin.layout.app')

@section('konten')
@include('alert.pesan')
<div class="container">
    <h2 class="mt-4">Kelola Treatment</h2>
    <!-- Form Pencarian -->
    <form action="{{ route('treatment.search') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="user_query" class="form-control" placeholder="Cari nama treatment..." value="{{ request('user_query') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Perawatan</th>
                <th scope="col">Harga</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Foto</th>
                <th scope="col">Durasi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = $data->firstItem() ?>
            @foreach ($data as $row)
            <tr>
                <th scope="row">{{ $no }}</th>
                <td>{{ $row->nama_perawatan }}</td>
                <td>{{ $row->harga }}</td>
                <td>{{ $row->deskripsi }}</td>
                <td><img src="{{ url('images').'/'.$row->gambar }}" alt="{{ $row->nama_perawatan }}" width="100"></td>
                <td>{{ $row->durasi }}</td>
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
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTreatmentModal"><i class="ri-add-line"></i> Tambah Treatment</button>
</div>
     
<!-- Modal Edit Treatment -->
@foreach ($data as $row)
<div class="modal fade" id="editTreatmentModal-{{ $row->id }}" tabindex="-1" aria-labelledby="editTreatmentModalLabel-{{ $row->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTreatmentModalLabel-{{ $row->id }}">Edit Treatment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/admin/update-treatment/'.$row->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="editNamaTreatment-{{ $row->id }}" class="form-label">Nama Treatment</label>
                        <input type="text" class="form-control" id="editNamaTreatment-{{ $row->id }}" name="nama_perawatan" value="{{ $row->nama_perawatan }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="editHarga-{{ $row->id }}" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="editHarga-{{ $row->id }}" name="harga" value="{{ $row->harga }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="editDeskripsi-{{ $row->id }}" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="editDeskripsi-{{ $row->id }}" name="deskripsi" required>{{ $row->deskripsi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editFoto-{{ $row->id }}" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="editFoto-{{ $row->id }}"  value="{{ $row->gambar }}"  name="foto">
                        <img src="{{ url('images').'/'.$row->gambar }}" alt="{{ $row->nama_perawatan }}" width="100" class="mt-2">
                    </div>
                    <div class="mb-3">
                        <label for="editDurasi-{{ $row->id }}" class="form-label">Durasi</label>
                        <input type="text" class="form-control" id="editDurasi-{{ $row->id }}" name="durasi" value="{{ $row->durasi }}" required>
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
                <form action="{{ url('/admin/hapus-treatment/'.$row->id) }}" method="POST">
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
                <h5 class="modal-title" id="addTreatmentModalLabel">Tambah Treatment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/tambah-treatment" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="namaTreatment" class="form-label">Nama Perawatan</label>
                        <input type="text" class="form-control" id="namaTreatment" name="nama_perawatan" required>
                    </div>
                    <div class="mb-3">
                        <label for="hargaTreatment" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="hargaTreatment" name="harga" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsiTreatment" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsiTreatment" name="deskripsi" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="fotoTreatment" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="fotoTreatment" name="foto" required>
                    </div>
                    <div class="mb-3">
                        <label for="durasiTreatment" class="form-label">Durasi</label>
                        <input type="text" class="form-control" id="durasiTreatment" name="durasi" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
