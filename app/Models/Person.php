<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    // Don't to pray before you start coding!
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'pictures',
        'latitude',
        'longitude',
    ];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
