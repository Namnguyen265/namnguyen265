<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comment';

    protected $fillable = [
        'comment',
        'id_blog',
        'id_user',
        'name',
        'avatar',
        'level'
        
    ];

    protected $primaryKey = 'id';
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'id_blog');
    }
}
