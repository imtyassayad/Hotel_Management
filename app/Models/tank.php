<?php

namespace App\Models;


use App\Models\motor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tank extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function motor()
    {
        return $this->hasMany(motor::class);
    }

}
