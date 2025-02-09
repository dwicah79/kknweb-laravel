<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Youth_Organization extends Model
{
    //
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function village()
    {
        return $this->belongsTo(Position::class, 'job_title_id');
    }
}
