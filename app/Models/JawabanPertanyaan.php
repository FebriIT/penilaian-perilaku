<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanPertanyaan extends Model
{
    use HasFactory;

    protected $table='jwb_pertanyaan';
    protected $fillable=['id_pertanyaan','nip_penilai','nip_ygdinilai','jawaban'];
}
