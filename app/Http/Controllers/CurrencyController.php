<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currencies;
use App\Models\Pair;

class CurrencyController extends Controller
{
    public function index()
    {
        return Currencies::all();
    }

    public function convertCurrency($from, $to, $amount)
    {
        $currencyFrom = Currencies::where('name', $from)->first();
        $currencyTo = Currencies::where('name', $to)->first();

        if (!$currencyFrom || !$currencyTo) {
            return response()->json(['error' => 'Currency not found'], 404);
        }

        $pair = Pair::where('from', $currencyFrom->id)->where('to', $currencyTo->id)->first();

        if (!$pair) {
            return response()->json(['error' => 'Conversion rate not found'], 404);
        }

        $convertedAmount = $amount * $pair->value;

        return response()->json(['converted_amount' => $convertedAmount], 200);
    }


    public function show($id)
    {
        return Currencies::findOrFail($id);
    }

    public function store(Request $request)
    {
        return Currencies::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $currency = Currencies::findOrFail($id);
        $currency->update($request->all());
        return $currency;
    }

    public function destroy($id)
    {
        $currency = Currencies::findOrFail($id);
        $currency->delete();
        return response()->json(['message' => 'Currency deleted successfully']);
    }
}
