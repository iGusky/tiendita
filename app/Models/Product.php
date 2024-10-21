<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'code',
        'description',
        'price',
        'stock'
    ];
    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $keyType = 'string';
}
