<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanYangDinilai extends Model
{
    use HasFactory;
    protected $table='jwb_ygdinilai';
    protected $fillable=['nip_ygdinilai','id_unitkerja','hasil','atasan','sejawat','bawahan'];

    public function unitkerja()
    {
        return $this->belongsTo(UnitKerja::class);
    }
}
