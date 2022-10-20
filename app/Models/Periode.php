<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $table='periode';
    protected $fillable=['nip','opd_id','nama','status','start','end','max_penilai'];
    protected $dates=['start','end'];
}

