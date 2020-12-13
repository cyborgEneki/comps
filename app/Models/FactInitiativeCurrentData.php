<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactInitiativeCurrentData extends Model
{
    use HasFactory;

    protected $table = 'Fact_Initiative_Current_Data',
        $fillable = ['Initiative_Key', 'Year_Key', 'Value'],
        $primaryKey = 'Initiative_Key';
}
