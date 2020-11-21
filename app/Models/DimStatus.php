<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimStatus extends Model
{
    use HasFactory;

    protected $table = 'Dim_Statuses';

    protected $fillable = ['status'];
}
