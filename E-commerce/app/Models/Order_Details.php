<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Details extends Model
{
    use HasFactory;

    protected $table = 'order_details';

    protected $fillable = [
        'id_history',
        'id_product',
        'name_product',
        'product_price',
        'product_sold_quantity',
        

    ];
}
