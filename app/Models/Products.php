<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'meniulists_id',
        'name',
        'image',
        'price',
        'description',
        'active',
    ];

    public function meniulists()
    {
        return $this->belongsTo(Meniulists::class, 'meniulists_id');
    }
}
