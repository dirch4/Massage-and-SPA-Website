<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perawatan extends Model
{
    use HasFactory;
    public function reservasi()
    {
        return $this->hasMany(Reservasi::class, 'id_perawatan');
    }
    protected $fillable = [
        'nama_perawatan',
        'harga',
        'deskripsi',
        'gambar',
        'durasi'
    ];
    protected $table = 'perawatan';
    public $timestamps = false;
}
