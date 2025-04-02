<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currencies;

class CurrenciesController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Currencies::query();

        if ($search) {
            $query->where('char_code', 'like', "%{$search}%");
        }

        $currencies = $query->paginate(10);

        return view('currencies', compact('currencies'));
    }
}
