<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
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
    // Relación uno a muchos Polimórfica
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    // Relación muchos a muchos Polimórfica
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
