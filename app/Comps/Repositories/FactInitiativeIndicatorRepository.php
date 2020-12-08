<?php 

namespace App\Comps\Repositories;

use App\Models\DimInitiative;
use App\Models\DimPractice;
use App\Models\FactInitiativeIndicator;

class FactInitiativeIndicatorRepository 
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
        return DimInitiative::findOrFail($id);
    }

    public function getPracticeByInitiativeId($initiativeId)
    {
        $practiceId = FactInitiativeIndicator::select('Practice_Key')->where('Initiative_Key', $initiativeId)->first()->Practice_Key;
        return DimPractice::findOrFail($practiceId);
    }
}