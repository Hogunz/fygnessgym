<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inclusion extends Model
{
    use HasFactory;
    protected $fillable = [
        'gym_id',
        'title',
        'description',
        'start_time',
        'end_time',
    ];

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }
}
