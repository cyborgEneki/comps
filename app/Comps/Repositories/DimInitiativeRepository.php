<?php 

namespace App\Comps\Repositories;

use App\Models\DimInitiative;

class DimInitiativeRepository 
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

    public function findInitiativeById($id)
    {
        return $this->initiative->findOrFail($id);
    }
}