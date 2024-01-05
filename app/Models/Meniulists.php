<?php

namespace App\Models;

use App\Models\Products;
use App\Models\Restaurants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meniulists extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurants_id',
        'name',
    ];

    public function restaurants()
    {
        return $this->belongsTo(Restaurants::class, 'restaurants_id');
    }

    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
