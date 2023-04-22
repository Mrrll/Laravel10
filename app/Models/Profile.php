<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $guarded = [];
   
    // Relación uno a uno (inversa)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
