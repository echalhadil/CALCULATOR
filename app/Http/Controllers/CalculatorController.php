<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
class CalculatorController extends Controller
{

    /**
     * @return View
     */
    public function index(): View
    {
        return view("welcome");
    }
}
