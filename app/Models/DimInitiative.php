<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimInitiative extends Model
{
    use HasFactory;

    protected $table = 'Dim_Initiatives',
        $guarded = ['Initiative_Key'],
        $primaryKey = 'Initiative_Key';

    public function initiativeIndicators()
    {
        return $this->belongsToMany(DimInitiativeIndicator::class, 'Initiative_Initiative_Indicator_Bridge', 'Initiative_Key', 'Initiative_Indicator_Key');
    }
}
