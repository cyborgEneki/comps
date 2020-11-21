<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InitiativeIndicators extends Model
{
    use HasFactory;

    protected $table = 'Dim_Practice';

    protected $fillable = ['name'];
}
