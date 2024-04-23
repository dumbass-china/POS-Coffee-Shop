<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
    'productname',
    'productprice',
    'name1',
    'name2',
    'ice1',
    'ice2',
    'ice3',
    'sugar1',
    'sugar2',
    'sugar3',
    'isactive',
    'image',
    'category_id'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

