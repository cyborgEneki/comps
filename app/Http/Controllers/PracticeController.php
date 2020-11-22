<?php

namespace App\Http\Controllers;

use App\Comps\Repositories\PracticeRepository;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    protected $practiceRepository;

    public function __construct()
    {
        $this->practiceRepository = new PracticeRepository();
    }

    public function index()
    {
        $practices = $this->practiceRepository->getAllPractices();

        return response()->json(['practices' => $practices]);
    }
}
