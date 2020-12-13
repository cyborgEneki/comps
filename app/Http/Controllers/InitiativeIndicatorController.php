<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InitiativeIndicatorController extends Controller
{
    public function show($id)
    {
        # code...
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
