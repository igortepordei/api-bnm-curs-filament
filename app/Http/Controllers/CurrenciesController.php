<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currencies;

class CurrenciesController extends Controller
{
    public function index()
    {
//        dd('asdasd');
        //        return response()->json(Currencies::paginate(10));


        return view('currencies', [
            'currencies' => Currencies::paginate(10),
        ]);
    }
}
