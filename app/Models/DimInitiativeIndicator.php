<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimInitiativeIndicator extends Model
{
    use HasFactory;

    protected $table = 'Dim_Initiative_Indicators',
    $primaryKey = 'Initiative_Indicator_Key';

    protected $fillable = [
        'Statement',
        'Indicator_Description',
        'Indicator_Label',
        'Indicator_Units',
        'Indicator_Data_Source',
        'Number_of_Subcategories',
        'Indicator_Type'
    ];

    public function initiatives()
    {
        return $this->belongsToMany(DimInitiative::class, 'Initiative_Initiative_Indicator_Bridge', 'Initiative_Indicator_Key', 'Initiative_Key');
    }
}
