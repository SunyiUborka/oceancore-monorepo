<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'quantity'
    ];
}
