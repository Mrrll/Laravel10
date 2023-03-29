<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected function name(): Attribute {
        return new Attribute(
            get:fn($value) => ucwords($value),
            set:fn($value) => strtolower($value)
        );
    }
    // Relación uno a uno
    public function profile()
    {
        // $profile = Profile::where('user_id', $this->id)->first();
        // return $profile;
        // $profile = Profile::where('foreing_key', $this->local_key)->first();
        // return $this->hasOne('App\Models\Profile', 'foreing_key', 'local_key' );
        return $this->hasOne(Profile::class);
    }
}
