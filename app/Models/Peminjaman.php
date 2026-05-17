<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamen';

    protected $fillable = [

        'nama_peminjam',

        'identitas',

        'judul_buku',

        'tanggal_pinjam',

        'tenggat_kembali',

        'status'

    ];
}