<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'excerpt', 'body', 'slug', 'category_id', 'user_id', 'date_start', 'date_end', 'start_hour', 'end_hour', 'latitude', 'longitude', 'address', 'image', 'post_id'];

    public function comments()
    {
        return $this->hasMany(CommentaryPost::class);
    }

    public function participation()
    {
        return $this->hasMany(ParticipationPost::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
