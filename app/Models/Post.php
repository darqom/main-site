<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'category_id', 'title', 'slug', 'cover', 'content', 'status', 'comment'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function($post) {
            $id = md5(($post->max('id') ?? 0) + 1);
            $id = substr($id, 0, 12);
            $slug = Str::slug("{$post->title} {$id}");

            $post->slug = $slug;
            $post->user_id = Auth::user()->id;
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
