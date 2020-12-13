<?php 

namespace App\Comps\Repositories;

use App\Models\DimYear;

class DimYearRepository 
{
    protected $year;
    
    public function __construct()
    {
        $this->year = new DimYear();
    }

    public function getAllYears()
    {
        return $this->year->orderBy('Year')->all();
    }
}