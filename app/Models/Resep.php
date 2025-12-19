<?php

namespace App\Models;

use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $table = 'reseps';

    protected $fillable = [
        'category_id',
        'nama_resep',
        'bahan_id',
        'instruksi',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function bahans()
    {
        return $this->belongsToMany(Bahan::class, 'bahan_resep', 'resep_id', 'bahan_id');
    }
}
