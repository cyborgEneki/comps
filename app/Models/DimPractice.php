<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimPractice extends Model
{
    use HasFactory;

    protected $table = 'Dim_Practices';

    protected $guarded = ['practice_key'],
        $primaryKey = 'practice_key';
}
