<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'description',
        'owner',
        'address',
        'phone',
        'image',
        'start_time',
        'end_time',
    ];
    protected $with = ['inclusion'];
    public function inclusion()
    {
        return $this->hasMany(Inclusion::class);
    }
}
