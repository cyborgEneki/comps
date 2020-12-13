<?php

namespace App\Http\Controllers\Api;

use App\Comps\Repositories\DimInitiativeRepository;
use App\Models\DimInitiative;
use App\Models\DimInitiativeIndicator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InitiativeIndicatorController extends Controller
{
    protected $dimInitiativeRepository;

    public function __construct()
    {
        $this->dimInitiativeRepository = new DimInitiativeRepository();
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
        $initiativeIndicator = DimInitiativeIndicator::create($request->all());
        $initiative = $this->dimInitiativeRepository->findInitiativeById($initiativeId);
        $initiative->initiativeIndicators()->attach($initiativeIndicator->id);

        return response()->json(['success' => 'success'], 200);
    }
}
