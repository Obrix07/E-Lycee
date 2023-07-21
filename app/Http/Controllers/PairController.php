<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pair;

class PairController extends Controller
{
    public function index()
    {
        return Pair::all();
    }

    public function show($id)
    {
        return Pair::findOrFail($id);
    }

    public function store(Request $request)
    {
        return Pair::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $currency = Pair::findOrFail($id);
        $currency->update($request->all());
        return $currency;
    }

    public function destroy($id)
    {
        $currency = Pair::findOrFail($id);
        $currency->delete();
        return response()->json(['message' => 'Currency deleted successfully']);
    }
}
