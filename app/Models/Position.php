<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    //
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function village()
    {
        return $this->belongsTo(Village_organization::class, 'job_title_id');
    }

    public function youth()
    {
        return $this->belongsTo(Youth_Organization::class, 'job_title_id');
    }

    public function pkk()
    {
        return $this->belongsTo(PKK_Organization::class, 'job_title_id');
    }
}
