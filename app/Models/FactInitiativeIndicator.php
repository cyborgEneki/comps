<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactInitiativeIndicator extends Model
{
    use HasFactory;

    protected $table = 'Fact_Initiative_Indicators',
        $primaryKey = 'Initiative_Key';

    protected $fillable = [
        'Initiative_Key',
        'Year_Key',
        'Practice_Key',
        'Target_Value',
        'Total_Cost_Budget',
        'Total_Funds_Secured',
        'Total_Funds_Anticipated'
    ];

    public function initiative()
    {
        return $this->hasOne(DimInitiative::class, 'Initiative_Key');
    }
}
