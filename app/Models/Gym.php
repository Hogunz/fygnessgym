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

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
    public function announcement()
    {
        return $this->hasMany(Announcement::class);
    }
    public function trainers()
    {
        return $this->hasMany(Announcement::class);
    }

    public function customers()
    {
        return $this->hasMany(GymUser::class);
    }

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }

    public function setEmbedGoogleMapAttribute($value)
    {

        preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $value, $match);

        $this->attributes['embed_google_map'] = $match[0][0];
    }
}
