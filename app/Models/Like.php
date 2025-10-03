<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    // Don't forget to pray before you start coding!
    use HasFactory;

    protected $fillable = [
        'person_id',
        'actor_id',
        'type',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
