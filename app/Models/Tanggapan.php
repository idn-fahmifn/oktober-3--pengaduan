<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    // kenalkan dengan tabel
    protected $table = 'tanggapan';
    // kenalkan juga dengan column nya 
    protected $guarded;

    public function laporan()
    {
        return $this->belongsTo(Laporan::class, 'id_laporan');
    }



}

