<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurants extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'working_time',
        'closing_time',
        'description'
    ];

    public function meniulists()
    {
        return $this->hasOne(Meniulists::class);
    }
}
