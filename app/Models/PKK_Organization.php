<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKK_Organization extends Model
{
    //
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function village()
    {
        return $this->hasOne(Position::class, 'id');
    }
}
