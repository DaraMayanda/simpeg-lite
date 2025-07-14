<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip', 'nama', 'jabatan', 'golongan', 'pangkat',
        'tanggal_lahir', 'tanggal_masuk', 'alamat', 'status'
    ];

    public function pensiun()
    {
        return $this->hasOne(Pensiun::class);
    }
    
}
