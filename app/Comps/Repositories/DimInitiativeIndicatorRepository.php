<?php 

namespace App\Comps\Repositories;

use App\Models\DimInitiativeIndicator;

class DimInitiativeIndicatorRepository 
{
    protected $initiative;
    
    public function __construct()
    {
        $this->initiativeIndicator = new DimInitiativeIndicator();
    }

    public function findInitiativeIndicatorById($id)
    {
        return $this->initiativeIndicator->findOrFail($id);
    }
}