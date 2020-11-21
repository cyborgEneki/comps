<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimInitiative extends Model
{
    use HasFactory;

    protected $table = 'Dim_Initiatives';

    protected $fillable = ['name', 'lead_name', 'lead_email', 'start_year', 'end_year', 'statement', 'number_of_subcategories'];
}
