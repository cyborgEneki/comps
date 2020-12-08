<?php

namespace App\Comps\Repositories;

use App\Models\DimInitiative;
use App\Models\DimPractice;
use App\Models\FactInitiativeIndicator;

class FactInitiativeIndicatorRepository
{
    protected $factInitiativeIndicator,
        $practice;


    public function __construct()
    {
        $this->factInitiativeIndicator = new FactInitiativeIndicator();
        $this->practice = new DimPractice();
    }

    public function findFactInitiativeIndicatorByInitiativeId($initiativeId)
    {
        return $this->factInitiativeIndicator->where('Initiative_Key', $initiativeId)->first();
    }

    public function getPracticeByInitiativeId($initiativeId)
    {
        $practiceId = $this->factInitiativeIndicator->select('Practice_Key')->where('Initiative_Key', $initiativeId)->first()->Practice_Key;
        return $this->practice->findOrFail($practiceId);
    }
}
