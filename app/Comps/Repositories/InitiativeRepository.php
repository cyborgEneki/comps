<?php 

namespace App\Comps\Repositories;

use App\Models\DimInitiative;

class InitiativeRepository 
{
    protected $initiative;
    
    public function __construct()
    {
        $this->initiative = new DimInitiative();
    }

    public function getAllInitiatives()
    {
        return $this->initiative->all();
    }
}