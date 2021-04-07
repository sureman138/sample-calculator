<?php

namespace App\Http\Controllers;

use App\Calculation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index()
    {
        $calculations = Calculation::orderBy('created_at', 'DESC')->take(10)->get();
        if ($calculations->isEmpty()) {
            return view('welcome');
        }

        return view('welcome')->with('calculations', $calculations);
    }
}
