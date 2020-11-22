<?php

namespace App\Http\Controllers\Api;

use App\Comps\Repositories\InitiativeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function store(Request $request)
    {
        dd($request->all());
    }
}
