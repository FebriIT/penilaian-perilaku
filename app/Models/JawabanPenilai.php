<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanPenilai extends Model
{
    use HasFactory;

    protected $table='jwb_penilai';
    protected $fillable=['nip_penilai','nip_ygdinilai','id_unitkerja','tydinilai','hasil'];
}
