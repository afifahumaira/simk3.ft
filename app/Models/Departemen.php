<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Departemen extends Model
{
    protected $table = 'departemens';

    use HasFactory;

    protected $fillable = [
        'name', 'departemen_id'
    ];

    public function apar():HasOne
    {
        return $this->hasOne(Apar::class, 'id');
    }

    public function location() {
        return $this->hasMany(Location_masters::class, 'departemen_id', 'id');
    }

    public function investigasi() {
        return $this->hasMany(Investigasi::class, 'departemen_id');
    }

}
