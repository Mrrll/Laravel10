<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];
    // Relación muchos a muchos
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    // Relación muchos a muchos
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}