<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'zip_code',
        'federal_entity_id',
        'municipality_id'
    ];
    
    public function federal_entity()
    {
        return $this->belongsTo(FederalEntity::class);
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }

    public function settlements()
    {
        return $this->belongsToMany(Settlement::class);
    }

    public function cities()
    {
        return $this->belongsToMany(City::class);
    }
}
