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
        $gymUser = $this->subscribeGym()->latest()->first();

        if (!$gymUser) return true;

        if ($gymUser->gym_id == $gym->id) {
            $expirationDate = Carbon::parse($gymUser->expiration_date);
            $isExpired = Carbon::now()->greaterThan($expirationDate);

            if ($isExpired) {
                return true;
            }
        }

        if ($gymUser == null) return true;

        return false;
    }

    public function subscriptionStatus(Gym $gym)
    {
        $gymUser = $this->subscribeGym()->latest()->first();

        if ($gymUser->gym_id == $gym->id) {
            if ($gymUser->status == 'pending') return "Pending";

            return "Already Subscribed";
        } else {
            return "Subscribed to other gym";
        }
    }
}
