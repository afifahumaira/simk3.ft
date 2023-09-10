<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hazard extends Model
{
    use HasFactory;
    protected $guarded;
    public $timestamps = false;

    
    public function hirarc()
    {
        return $this->hasMany(Hirarc::class);
    }
}
