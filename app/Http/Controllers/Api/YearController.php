<?php

namespace App\Http\Controllers\Api;

use App\Comps\Repositories\DimYearRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class YearController extends Controller
{
    protected $yearRepository;

    public function __construct()
    {
        $this->yearRepository = new DimYearRepository();
    }

    public function index()
    {
        $years = $this->yearRepository->getAllYears();
        return response()->json(['years' => $years], 200);
    }
}
