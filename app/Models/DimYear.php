<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimYear extends Model
{
    use HasFactory;

    protected $table = 'Dim_Years';

    protected $fillable = ['name', 'year'];
}
