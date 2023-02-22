<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'id_user',
        'name',
        'price',
        'quantity',
        'sold_quantity',
        'id_category',
        'id_brand',
        'status',
        'sale',
        'product_revenue',
        'company',
        'image',
        'detail'

    ];

    public function Comment()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
