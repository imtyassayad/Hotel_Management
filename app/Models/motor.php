<?php

namespace App\Models;

use App\Models\tank;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class motor extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function tank()
    {
        return $this->belongsTo(tank::class);
    }
}
