<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Traits\UploadImage;

class Post extends Model
{
    use HasFactory, UploadImage;

    protected $guarded = [];

    protected $casts = [
        'published' => 'datetime',
    ];
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

    // Relación uno a uno Polimórfica
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
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
