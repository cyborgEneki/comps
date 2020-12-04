<?php

namespace App\Http\Controllers\Api;

use App\Comps\Repositories\DimPracticeRepository;
use App\Http\Controllers\Controller;
use App\Models\DimPractice;

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
}
