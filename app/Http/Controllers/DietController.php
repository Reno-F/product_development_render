<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DietController extends Controller
{
    public function showCalculator()
    {
        return view('kalkulator_kalori');
    }
}
