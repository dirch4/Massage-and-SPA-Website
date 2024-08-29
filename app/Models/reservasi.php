<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservasi extends Model
{
    use HasFactory;
    public function perawatan()
    {
        return $this->belongsTo(Perawatan::class, 'id_perawatan'); 
    }
    protected $fillable = [
        'nama',
        'email',
        'no_telp',
        'tanggal',
        'jam_kerja',
        'id_perawatan',
        'catatan',
        'status'
    ];
    protected $table = 'reservasi';
    public $timestamps = false;
}
