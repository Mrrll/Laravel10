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

    public function getRouteKeyName()
    {
        return 'name';
    }

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
    // Relación uno a muchos
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    // Relación uno a muchos
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
    // Relación muchos a muchos
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    protected function password(): Attribute {
        return new Attribute(
            set:function($value){
                return bcrypt($value);
            }
        );
    }
    /**
     * @return mixed
     */
    // Relación muchos a muchos
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    // Asegurarse que el usuario tenga un rol para las rutas.
    public function hasRole($role)
    {
        if ($this->roles->contains('slug',$role)) {
            return true;
        }
       return false;
    }
}
