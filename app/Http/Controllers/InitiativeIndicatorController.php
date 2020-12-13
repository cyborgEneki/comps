<?php

namespace App\Http\Controllers;

use App\Comps\Repositories\DimInitiativeRepository;
use App\Models\DimInitiative;
use App\Models\DimInitiativeIndicator;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class InitiativeIndicatorController extends Controller
{
    protected $dimInitiativeRepository;

    public function __construct()
    {
        $this->dimInitiativeRepository = new DimInitiativeRepository();
    }

    public function show($id)
    {
        # code...
    }

    public function store(Request $request, $initiativeId, $pathwayId = null)
    {
        $initiativeIndicator = DimInitiativeIndicator::create($request->all());
        $initiative = $this->dimInitiativeRepository->findInitiativeById($initiativeId);
        $initiative->initiativeIndicators()->attach($initiativeIndicator->id);
        
        return response()->json(['success' => 'success'], 200);
    }
}
