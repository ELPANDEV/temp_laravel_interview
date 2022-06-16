<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// c_mnpio => id
// D_mnpio => name

class Municipality extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'code',
        'federal_entity_id'
    ];

    public function settlements()
    {
        return $this->hasMany(Settlement::class);
    }

    public function federal_entity()
    {
        return $this->belongsTo(FederalEntity::class);
    }
}
