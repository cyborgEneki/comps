<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PathwayOutcome extends Model
{
    use HasFactory;

    protected $table = 'Dim_Pathway_Outcome';

    protected $fillable = ['name'];
}
