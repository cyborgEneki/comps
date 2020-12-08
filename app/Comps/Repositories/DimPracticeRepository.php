<?php 

namespace App\Comps\Repositories;

use App\Models\DimPractice;

class DimPracticeRepository 
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

    public function findPracticeById($id)
    {
        return $this->practice->findOrFail($id);
    }
}