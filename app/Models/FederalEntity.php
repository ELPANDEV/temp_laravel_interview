<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// c_estado => id
// d_estado => name

class FederalEntity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code'
    ];

    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }
}
