<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';

    protected $fillable = [
        'title',
        'blog_tags',
        'blog_slug',
        'image',
        'description',
        'content',
        'id_auth'
        
    ];

    public function comment()
    {
        return $this->hasMany('App\Models\Comment', 'id_blog');
    }
}
