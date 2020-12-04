<?php

namespace App\Http\Controllers\Api;

use App\Comps\Repositories\DimInitiativeRepository;
use App\Comps\Repositories\DimPracticeRepository;
use App\Comps\Repositories\FactInitiativeIndicatorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DimInitiative;
use App\Models\FactInitiativeIndicator;
use Carbon\Carbon;

class InitiativeController extends Controller
{
    protected $dimInitiativeRepository,
        $factInitiativeIndicatorRepository,
        $dimPracticeRepository;

    public function __construct()
    {
        $this->dimInitiativeRepository = new DimInitiativeRepository();
        $this->factInitiativeIndicatorRepository = new FactInitiativeIndicatorRepository();
        $this->dimPracticeRepository = new DimPracticeRepository();
    }

    public function index()
    {
        $initiatives = $this->dimInitiativeRepository->getAllInitiatives();

        return response()->json(['initiatives' => $initiatives]);
    }

    public function show(DimInitiative $initiative)
    {
        return response()->json(['initiative' => $initiative]);
    }

    public function store(Request $request, $id)
    {
        $initiative = $this->dimInitiativeRepository->findInitiativeById($id);
        $practice = $this->dimPracticeRepository->findPracticeById($request->get('Practice_Key'));

        $initiative->update($request->all());

        FactInitiativeIndicator::create($request->only('Initiative_Key', 'Practice_Key'));

        return response()->json([
            'success' => 'success',
            'initiative' => $initiative,
            'practice' => $practice
        ], 200);
    }
}
