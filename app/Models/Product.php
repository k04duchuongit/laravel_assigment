<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes; 
    use HasFactory;
    //

    protected $fillable = [
        'name',
        'price',
        'quantity',
        'path_img',
        'category_id',
        'description',
        'status',
    ];
}
