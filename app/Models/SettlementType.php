<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// c_tipo_asenta => id
// d_tipo_asenta    => name

class SettlementType extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'code',
    ];
}
