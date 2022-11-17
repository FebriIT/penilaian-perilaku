<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    use HasFactory;

    protected $table='unkerja';
    protected $fillable=['fstatus'];

    public function jawabanygdinilai()
    {
        return $this->hasMany(JawabanYangDinilai::class);
    }
}
