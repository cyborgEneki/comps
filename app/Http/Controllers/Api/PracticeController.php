<?php

namespace App\Http\Controllers\Api;

use App\Comps\Repositories\DimPracticeRepository;
use App\Http\Controllers\Controller;
use App\Models\DimPractice;
use App\Models\FactInitiativeIndicator;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    protected $dimPracticeRepository;

    public function __construct()
    {
        $this->dimPracticeRepository = new DimPracticeRepository();
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
        $practice = $this->dimPracticeRepository->findPracticeById($request->get('Practice_Key'));
        FactInitiativeIndicator::create($request->all());

        return response()->json([
            'success' => 'success',
            'practice' => $practice
        ], 200);
    }
}
