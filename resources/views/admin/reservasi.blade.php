@extends('admin.layout.app')

@section('konten')
@include('alert.pesan')
<div class="container">
    <h2 class="mt-4">Kelola Reservasi</h2>
    <!-- Form Pencarian -->
    <form action="{{ route('reservasi.search') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="user_query" class="form-control" placeholder="Cari nama pelanggan, email, atau perawatan..." value="{{ request('user_query') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Email</th>
                <th scope="col">No Telp</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jam Kerja</th>
                <th scope="col">Perawatan</th>
                <th scope="col">Catatan</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = $data->firstItem() ?>
            @foreach ($data as $row)
            <tr>
                <th scope="row">{{ $no }}</th>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->email }}</td>
                <td>{{ $row->no_telp }}</td>
                <td>{{ $row->tanggal }}</td>
                <td>{{ $row->jam_kerja }}</td>
                <td>{{ $row->Perawatan->nama_perawatan }}</td>
                <td>{{ $row->catatan }}</td>
                <td>
                    @if ($row->status == 'pending')
                    <span class="badge bg-warning text-dark">{{ $row->status }}</span>
                    @elseif ($row->status == 'approved')
                    <span class="badge bg-success">{{ $row->status }}</span>
                    @else
                    <span class="badge bg-danger">{{ $row->status }}</span>
                    @endif
                </td>
                
                <td>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editReservationModal-{{ $row->id }}"><i class="ri-edit-line"></i> Edit</button>
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteReservationModal-{{ $row->id }}"><i class="ri-delete-bin-line"></i> Hapus</button>

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
  
</div>
{{-- Modal Edit --}}
@foreach ($data as $row)
<div class="modal fade" id="editReservationModal-{{ $row->id }}" tabindex="-1" aria-labelledby="editReservationModalLabel-{{ $row->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editReservationModalLabel-{{ $row->id }}">Edit Reservasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('reservasi.update', $row->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="editNamaPelanggan-{{ $row->id }}" class="form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="editNamaPelanggan-{{ $row->id }}" name="nama" value="{{ $row->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="editEmail-{{ $row->id }}" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editEmail-{{ $row->id }}" name="email" value="{{ $row->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="editNoTelp-{{ $row->id }}" class="form-label">No Telp</label>
                        <input type="text" class="form-control" id="editNoTelp-{{ $row->id }}" name="no_telp" value="{{ $row->no_telp }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="editTanggalReservasi-{{ $row->id }}" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="editTanggalReservasi-{{ $row->id }}" name="tanggal" value="{{ $row->tanggal }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="editJamKerja-{{ $row->id }}" class="form-label">Jam Kerja</label>
                        <select class="form-select" id="jam" name="jam_kerja" required>
                            <option disabled value="">Pilih Jam Kerja</option>
                            <option value="08:00 - 11:00" {{ $row->jam_kerja == '08:00 - 11:00' ? 'selected' : '' }}>08:00 - 11:00</option>
                            <option value="13:00 - 17:00" {{ $row->jam_kerja == '13:00 - 17:00' ? 'selected' : '' }}>13:00 - 17:00</option>
                            <option value="19:00 - 22:00" {{ $row->jam_kerja == '19:00 - 22:00' ? 'selected' : '' }}>19:00 - 22:00</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editPerawatan-{{ $row->id }}" class="form-label">Perawatan</label>
                        <select class="form-select" id="editPerawatan-{{ $row->id }}" name="id_perawatan" required>
                            <option selected disabled value="">Pilih layanan...</option>
                            @foreach ($layanans as $layanan)
                                <option value="{{ $layanan->id }}" {{ $row->id_perawatan == $layanan->id ? 'selected' : '' }}>{{ $layanan->nama_perawatan }}</option>
                            @endforeach
                        </select> 
                    </div>
                    <div class="mb-3">
                        <label for="editCatatan-{{ $row->id }}" class="form-label">Catatan</label>
                        <textarea class="form-control" id="editCatatan-{{ $row->id }}" name="catatan" required>{{ $row->catatan }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editStatus-{{ $row->id }}" class="form-label">Status</label>
                        <select class="form-select" id="editStatus-{{ $row->id }}" name="status" required>
                            <option value="pending" {{ $row->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ $row->status == 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="rejected" {{ $row->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- Modal Hapus Reservasi -->
    <div class="modal fade" id="deleteReservationModal-{{ $row->id }}" tabindex="-1" aria-labelledby="deleteReservationModalLabel-{{ $row->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteReservationModalLabel-{{ $row->id }}">Hapus Reservasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus reservasi untuk <strong>{{ $row->nama }}</strong> pada tanggal <strong>{{ $row->tanggal }}</strong>?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('reservasi.destroy', $row->id) }}" method="POST">
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


@endsection