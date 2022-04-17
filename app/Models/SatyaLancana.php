<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SatyaLancana extends Model
{
    use HasFactory;

    protected $table='satyalancana';
    protected $fillable=['nip','gl_dpn','nama','gl_blk','tempat_lahir','tgl_lahir','jk','pendidikan_terakhir','no_sk_cpns','tmt_cpns','gol_ruang','tmt_gol_ruang','jabatan','tmt_jabatan','status_verifikasi',
    'keterangan','status_verifikasi_prof','user_input','user_edit','filesatya','periode_id','opd_id','skls','masakerja'];

    public function opd()
    {
        return $this->belongsTo(Opd::class);
    }


}
