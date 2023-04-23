<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Buscar modelo por el campo slug
    public function getRouteKeyName()
    {
        return 'slug';
    }
    // Relación uno a muchos (inversa)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Relación uno a muchos (inversa)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
     protected $casts = [
        'published' => 'datetime',
    ];
    
}
