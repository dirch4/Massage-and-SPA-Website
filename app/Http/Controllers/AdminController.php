<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\Perawatan;
use App\Models\reservasi;
use Illuminate\Http\Request;

class AdminController extends Controller    
{
    function index()
    {
        echo view('admin.index');
    }
    function dataReservasi(Request $request)
    {
        $cari = $request->input('user_query');
    
        if ($cari) {
            $data = Reservasi::where('nama', 'like', "%$cari%")
            ->orWhere('email', 'like', "%$cari%")
            ->orWhereHas('perawatan', function ($query) use ($cari) {
                $query->where('nama_perawatan', 'like', "%$cari%");
            })
            ->paginate(5);
        } else {
            $data = reservasi::orderBy('id', 'desc')->paginate(5);
        }
            
        $layanans = Perawatan::all();
        echo view('admin.reservasi', compact('layanans'))->with('data', $data);
    }
    function dataTreatment(Request $request)
    {   
        $cari = $request->input('user_query');
        if ($cari) {
            $data = Perawatan::where('nama_perawatan', 'like', "%$cari%")->paginate(5);
        } else {
            $data = Perawatan::orderBy('id', 'desc')->paginate(5);
        }
        echo view('admin.treatment')->with('data', $data);
    }
    
    function tambahTreatment(Request $request)
    {
        $request->validate([
            'nama_perawatan' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'durasi' => 'required'
        ],
        [
            'nama_perawatan.required' => 'Nama harus diisi',
            'harga.required' => 'Harga harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'foto.required' => 'Foto harus diisi',
            'foto.image' => 'Foto harus berupa gambar',
            'foto.mimes' => 'Foto harus berupa gambar',
            'foto.max' => 'Foto maksimal 2MB',
            'durasi.required' => 'Durasi harus diisi'
        ]);
        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis').".".$foto_ekstensi;
        $foto_file->move(public_path('images'), $foto_nama);

        $data = [
            'nama_perawatan' => $request->nama_perawatan,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar' => $foto_nama,
            'durasi' => $request->durasi
        ];      
        Perawatan::create($data);
        return redirect('admin/data-treatment')->with('pesan', 'Data berhasil ditambahkan');
    }
    function updateTreatment(Request $request, $id)
    {
        $request->validate([
            'nama_perawatan' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'durasi' => 'required'
        ],
        [
            'nama_perawatan.required' => 'Nama harus diisi',
            'harga.required' => 'Harga harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'foto.required' => 'Foto harus diisi',
            'foto.image' => 'Foto harus berupa gambar',
            'foto.mimes' => 'Foto harus berupa gambar',
            'foto.max' => 'Foto maksimal 2MB',
            'durasi.required' => 'Durasi harus diisi'
        ]);
        $treatment = Perawatan::findOrFail($id);

        $data = $request->only(['nama_perawatan', 'harga', 'deskripsi', 'durasi']);
        if ($request->hasFile('foto')) {
            // Menghapus foto lama jika ada
            if ($treatment->gambar && file_exists(public_path('images/' . $treatment->gambar))) {
                unlink(public_path('images/' . $treatment->gambar));
            }

            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis').".".$foto_ekstensi;
            $foto_file->move(public_path('images'), $foto_nama);
            $data['gambar'] = $foto_nama;
        }
        
        Perawatan::where('id', $id)->update($data);
        return redirect('admin/data-treatment')->with('pesan', 'Data berhasil diubah');
    
    }
    function hapusTreatment($id)
    {
        $treatment = Perawatan::findOrFail($id);
        if ($treatment->gambar && file_exists(public_path('images/' . $treatment->gambar))) {
            unlink(public_path('images/' . $treatment->gambar));
        }
        Perawatan::destroy($id);
        return redirect('admin/data-treatment')->with('pesan', 'Data berhasil dihapus');
    }
    function dataKaryawan(Request $request)
    {
        $cari = $request->input('user_query');
    
        if ($cari) {
             $data = karyawan::where('nama', 'like', "%$cari%")->paginate(5);
        } else {
            $data = karyawan::orderBy('id', 'desc')->paginate(5);
        }
        echo view('admin.karyawan')->with('data', $data);
    }

    function tambahKaryawan(Request $request){
        $request->validate([
            'nama' => 'required',
            'jk' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'spesialis' => 'required'
        ],
        [
            'nama.required' => 'Nama harus diisi',
            'jk.required' => 'Jenis kelamin harus diisi',
            'email.required' => 'Email harus diisi',
            'no_telp.required' => 'Nomor telepon harus diisi',
            'umur.required' => 'Umur harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'foto.required' => 'Foto harus diisi',
            'foto.image' => 'Foto harus berupa gambar',
            'foto.mimes' => 'Foto harus berupa gambar',
            'foto.max' => 'Foto maksimal 2MB',
            'spesialis.required' => 'Spesialis harus diisi'
        ]);
        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis').".".$foto_ekstensi;
        $foto_file->move(public_path('images/profile'), $foto_nama);

        $data = [
            'nama' => $request->nama,
            'jk' => $request->jk,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
            'foto' => $foto_nama,
            'spesialis' => $request->spesialis
        ];
        karyawan::create($data);
        return redirect('admin/data-karyawan')->with('pesan', 'Data berhasil ditambahkan');
    }

    function updateKaryawan(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jk' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'spesialis' => 'required'
        ],
        [
            'nama.required' => 'Nama harus diisi',
            'jk.required' => 'Jenis kelamin harus diisi',
            'email.required' => 'Email harus diisi',
            'no_telp.required' => 'Nomor telepon harus diisi',
            'umur.required' => 'Umur harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'foto.image' => 'Foto harus berupa gambar',
            'foto.mimes' => 'Foto harus berupa gambar',
            'foto.max' => 'Foto maksimal 2MB',
            'spesialis.required' => 'Spesialis harus diisi'
        ]);
        $karyawan = karyawan::findOrFail($id);

        $data = $request->only(['nama', 'jk', 'email', 'no_telp', 'umur', 'alamat', 'spesialis']);
        if ($request->hasFile('foto')) {
            // Menghapus foto lama jika ada
            if ($karyawan->foto && file_exists(public_path('images/profile' . $karyawan->foto))) {
                unlink(public_path('images/profile' . $karyawan->foto));
            }

            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis').".".$foto_ekstensi;
            $foto_file->move(public_path('images/profile'), $foto_nama);
            $data['foto'] = $foto_nama;
        }
        
        karyawan::where('id', $id)->update($data);
        return redirect('admin/data-karyawan')->with('pesan', 'Data berhasil diubah');
    
    }
    function hapusKaryawan($id)
    {
        $karyawan = karyawan::findOrFail($id);
        if ($karyawan->foto && file_exists(public_path('images/profile' . $karyawan->foto))) {
            unlink(public_path('images/profile' . $karyawan->foto));
        }
        karyawan::destroy($id);
        return redirect('admin/data-karyawan')->with('pesan', 'Data berhasil dihapus');
    }
}
