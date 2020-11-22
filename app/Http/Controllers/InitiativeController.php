<?php

namespace App\Http\Controllers;

use App\Comps\Repositories\InitiativeRepository;
use Illuminate\Http\Request;

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
}
