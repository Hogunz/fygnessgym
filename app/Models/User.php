<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function gyms()
    {
        return $this->hasMany(Gym::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'owner_id');
    }

    public function subscribeGym()
    {
        return $this->hasMany(GymUser::class);
    }

    public function isNotSubscribed(Gym $gym)
    {
        $gymUser = $this->subscribeGym()->where('gym_id', $gym->id)->latest()->first();

        // Check if $gymUser is null before accessing its properties
        if ($gymUser === null) {
            return true;
        }

        if ($gymUser->status == 'pending') {
            return false;
        }

        $expirationDate = Carbon::parse($gymUser->expiration_date);
        $isExpired = Carbon::now()->greaterThan($expirationDate);

        if ($isExpired) {
            return true;
        }

        return false;
    }
}
