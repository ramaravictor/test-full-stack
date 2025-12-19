<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    protected $table = 'bahans';

    protected $fillable = [
        'nama_bahan',
        'jumlah',
        'satuan',
    ];

    public function reseps()
    {
        return $this->belongsToMany(Resep::class, 'bahan_resep', 'bahan_id', 'resep_id');
    }
}
