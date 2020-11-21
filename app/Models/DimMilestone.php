<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimMilestone extends Model
{
    use HasFactory;

    protected $table = 'Dim_Milestones';

    protected $fillable = ['milestone', 'target', 'status_justification', 'display'];
}
