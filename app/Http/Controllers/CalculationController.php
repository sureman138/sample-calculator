<?php

namespace App\Http\Controllers;

use App\Calculation;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class CalculationController extends Controller
{
    use ValidatesRequests;

    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'number_1' => 'required|integer',
            'number_2' => 'required|integer',
            'calculation' => 'required|in:add,subtract,multiply,divide',
        ]);

        $number_1 = $request->number_1;
        $number_2 = $request->number_2;
        $calculatedValue = '';

        switch ($request->calculation) {
            case 'add':
                $calculatedValue = $number_1 . ' plus ' . $number_2 . ' equals ' . (round($number_1 + $number_2, 2));
                break;
            case 'subtract':
                $calculatedValue = $number_1 . ' minus ' . $number_2 . ' equals ' . (round($number_1 - $number_2, 2));
                break;
            case 'multiply':
                $calculatedValue = $number_1 . ' multiplied by ' . $number_2 . ' equals ' . (round($number_1 * $number_2, 2));
                break;
            case 'divide':
                $calculatedValue = $number_1 . ' divided by ' . $number_2 . ' equals ' . (round($number_1 / $number_2, 2));
                break;
        }

        $calculation = new Calculation();
        $calculation->value = $calculatedValue;
        $calculation->save();

        return back()->with('success', $calculation->value);
    }
}
