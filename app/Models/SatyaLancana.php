<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatyaLancana extends Model
{
    use HasFactory;

    protected $table='satyalancana';
    protected $fillable=['nip','pangkat','nama','jabatan','masakerja','skls','status_verifikasi','keterangan','status_verifikasi_prof','user_input','user_edit','filesatya','bulan','tahun'];
}
