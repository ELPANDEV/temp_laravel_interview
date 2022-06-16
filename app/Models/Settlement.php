<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// id_asenta_cpcons => id
// d_asenta         => name

class Settlement extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'code',
        'zone_type',
        'settlement_type_id',
        'municipality_id'
    ];

    public function settlement_type()
    {
        return $this->belongsTo(SettlementType::class);
    }
}
