<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimInitiative extends Model
{
    use HasFactory;

    protected $table = 'Dim_Initiatives',
        $guarded = ['Initiative_Key'],
        $primaryKey = 'Initiative_Key';
}
