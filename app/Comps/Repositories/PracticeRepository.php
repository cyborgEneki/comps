<?php 

namespace App\Comps\Repositories;

use App\Models\DimPractice;

class PracticeRepository 
{
    protected $practice;
    
    public function __construct()
    {
        $this->practice = new DimPractice();
    }

    public function getAllPractices()
    {
        return $this->practice->all();
    }
}