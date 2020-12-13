<?php

namespace App\Http\Controllers\Api;

use App\Comps\Repositories\DimInitiativeIndicatorRepository;
use App\Comps\Repositories\DimInitiativeRepository;
use App\Models\DimInitiative;
use App\Models\DimInitiativeIndicator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InitiativeIndicatorController extends Controller
{
    protected $dimInitiativeRepository,
        $dimInitiativeIndicatorRepository;

    public function __construct()
    {
        $this->dimInitiativeRepository = new DimInitiativeRepository();
        $this->dimInitiativeIndicatorRepository = new DimInitiativeIndicatorRepository();
    }

    public function showallInitiativeIndicators($initiativeId, $indicatorType)
    {
        $initiative = $this->dimInitiativeRepository->findInitiativeById($initiativeId);
        if ($indicatorType == "P") {
            $initiativeIndicators = $initiative->initiativeIndicators()->whereIndicatorType("P")->get();
        }
        if ($indicatorType == "O") {
            $initiativeIndicators = $initiative->initiativeIndicators()->whereIndicatorType("O")->get();
        }
        return response()->json(['initiativeIndicators' => $initiativeIndicators], 200);
    }

    public function store(Request $request, $initiativeId, $pathwayId = null)
    {
        if($pathwayId) {
            $initiativeIndicator = $this->dimInitiativeIndicatorRepository->findInitiativeIndicatorById($pathwayId);
            $initiativeIndicator->update($request->all());
            $initiative = $this->dimInitiativeRepository->findInitiativeById($initiativeId);
            $initiative->initiativeIndicators()->sync($initiativeIndicator->Initiative_Indicator_Key);
        } else {
            $initiativeIndicator = DimInitiativeIndicator::create($request->all());
            $initiative = $this->dimInitiativeRepository->findInitiativeById($initiativeId);
            $initiative->initiativeIndicators()->attach($initiativeIndicator->Initiative_Indicator_Key);
        }

        return response()->json(['success' => 'success'], 200);
    }
}
