<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JabatanRiwayat;
use App\Models\Cuti;
use App\Models\Pelatihan;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'jabatan',
        'golongan',
        'status',
        'tanggal_lahir',
        'alamat',
    ];

    public function jabatanRiwayats()
    {
        return $this->hasMany(JabatanRiwayat::class);
    }

    public function cuti()
    {
        return $this->hasMany(Cuti::class);
    }

    public function pelatihan()
    {
        return $this->hasMany(Pelatihan::class);
    }
}
