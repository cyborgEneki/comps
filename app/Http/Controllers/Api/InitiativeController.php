<?php

namespace App\Http\Controllers\Api;

use App\Comps\Repositories\InitiativeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DimInitiative;

class InitiativeController extends Controller
{
    protected $initiativeRepository;

    public function __construct()
    {
        $this->initiativeRepository = new InitiativeRepository();
    }

    public function index()
    {
        $initiatives = $this->initiativeRepository->getAllInitiatives();

        return response()->json(['initiatives' => $initiatives]);
    }

    public function show(DimInitiative $initiative)
    {
        return response()->json(['initiative' => $initiative]);
    }

    public function store(Request $request)
    {
        dd($request->all());
        DimInitiative::create();
    }
}
