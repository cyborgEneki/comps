<?php

namespace App\Http\Controllers\Api;

use App\Comps\Repositories\DimPracticeRepository;
use App\Comps\Repositories\FactInitiativeIndicatorRepository;
use App\Http\Controllers\Controller;
use App\Models\DimPractice;
use App\Models\FactInitiativeIndicator;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    protected $dimPracticeRepository,
        $factInitiativeIndicatorRepository;

    public function __construct()
    {
        $this->dimPracticeRepository = new DimPracticeRepository();
        $this->factInitiativeIndicatorRepository = new FactInitiativeIndicatorRepository();
    }

    public function index()
    {
        $practices = $this->dimPracticeRepository->getAllPractices();

        return response()->json(['practices' => $practices]);
    }

    public function getPracticeById($id)
    {
        return DimPractice::findOrFail($id);
    }

    public function store(Request $request)
    {
        FactInitiativeIndicator::updateOrCreate(
            ['Initiative_Key' => $request->get('Initiative_Key')],
            ['Practice_Key' => $request->get('Practice_Key')]
        );
        
        return response()->json([
            'success' => 'success'
        ], 200);
    }
}
