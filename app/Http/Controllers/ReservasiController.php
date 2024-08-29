<?php

namespace App\Http\Controllers;

use App\Models\Perawatan;
use App\Models\reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    function index()
    {
        $layanans = Perawatan::all();
        return view('reservasi', compact('layanans'));
    }
    function reservasi(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'tanggal' => 'required',
            'jam_kerja' => 'required',
            'id_perawatan' => 'required',
            'catatan' => 'required',
        ],
        [
            'nama.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'no_telp.required' => 'Nomor HP wajib diisi',
            'tanggal.required' => 'Tanggal wajib diisi',
            'jam_kerja.required' => 'Jam wajib diisi',
            'id_perawatan.required' => 'Layanan wajib diisi',
            'catatan.required' => 'Catatan wajib diisi',
        ]);
        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'tanggal' => $request->tanggal,
            'jam_kerja' => $request->jam_kerja,
            'id_perawatan' => $request->id_perawatan,
            'catatan' => $request->catatan,
            'status' => 'pending'
        ];

        $perawatan = Perawatan::find($request->id_perawatan);
        $namaPerawatan = $perawatan ? $perawatan->nama_perawatan : 'Perawatan tidak ditemukan';

        $whatsappUrl = "https://api.whatsapp.com/send?phone=0895613165087&text=" . 
                   "Nama: " . urlencode($request->nama) . 
                   "%0AEmail: " . urlencode($request->email) . 
                   "%0AJam Kerja: " . urlencode($request->jam_kerja) . 
                   "%0APerawatan: " . urlencode($namaPerawatan);
        
        reservasi::create($data);
        return redirect('/reservasi')->with('pesan', 'Konfirmasi Pembayaran')->with('whatsappUrl', $whatsappUrl);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required',
            'tanggal' => 'required|date',
            'jam_kerja' => 'required',
            'id_perawatan' => 'required',
            'catatan' => 'required',
            'status' => 'required'
        ]);

        $reservasi = Reservasi::find($id);
        $reservasi->update($request->all());

        return redirect('/admin/data-reservasi')->with('pesan', 'Reservasi berhasil diperbarui');
    }
    public function destroy($id)
    {
        $reservasi = Reservasi::find($id);
        $reservasi->delete();

        return redirect('/admin/data-reservasi')->with('pesan', 'Reservasi berhasil dihapus');
    }

}
