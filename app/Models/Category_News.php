<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_News extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function news()
    {
        return $this->hasMany(News::class, 'category_id');
    }
}
