<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimInitiativeIndicator extends Model
{
    use HasFactory;

    protected $table = 'Dim_Initiative_Indicators';

    protected $fillable = [
        'statement', 
        'indicator_description', 
        'indicator_label', 
        'indicator_units', 
        'indicator_data_source', 
        'number_of_subcategories', 
        'indicator_type'
    ];
}
