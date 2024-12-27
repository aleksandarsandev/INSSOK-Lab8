<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jet extends Model
{
    protected $fillable = ['name', 'model', 'capacity', 'hourly_rate'];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
