<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jk',
        'email',
        'no_telp',
        'umur',
        'alamat',
        'foto',
        'spesialis'
    ];
    protected $table = 'karyawan';
    public $timestamps = false;
}
