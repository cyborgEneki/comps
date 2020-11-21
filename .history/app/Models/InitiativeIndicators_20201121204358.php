<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InitiativeIndicators extends Model
{
    use HasFactory;

    protected $table = 'Fact_Initiative_Indicators';

    protected $fillable = [
        'initiative_key', 
        'year_key', 
        'practice_key', 
        'target_value', 
        'total_cost_budget', 'total_funds_secured', 'total_funds_anticipated'];
}
