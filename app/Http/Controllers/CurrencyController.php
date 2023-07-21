<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currencies;

class CurrencyController extends Controller
{
    public function index()
{
    return Currencies::all();
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
