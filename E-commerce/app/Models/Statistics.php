<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    use HasFactory;

    protected $table = 'statistics';

    protected $fillable = [
        'finish_date',
        'income',
        'total_quantity',
        'total_order'
    ];
}
