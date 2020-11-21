<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimInitiativeCurrentData extends Model
{
    use HasFactory;

    protected $table = 'Fact_Initiative_Current_Data';

    protected $fillable = ['initiative_key', 'year_key', 'value'];
}
