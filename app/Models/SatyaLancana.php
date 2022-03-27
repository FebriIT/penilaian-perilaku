<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SatyaLancana extends Model
{
    use HasFactory;

    protected $table='satyalancana';
    protected $fillable=['nip','pangkat','nama','jabatan','masakerja','skls','status_verifikasi',
    'keterangan','status_verifikasi_prof','user_input','user_edit','filesatya','bulan','tahun','opd_id'];

    public function opd()
    {
        return $this->belongsTo(Opd::class);
    }


}
