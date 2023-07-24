<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Pair;

class PairController extends Controller
{
    public function index()
    {
        return Pair::all();
    }

    public function edit($id)
    {
        $pair = Pair::findOrFail($id);
        return view('edit_pair', compact('pair'));
    }

    public function show($id)
    {
        return Pair::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $pair = Pair::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'value' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $pair->update($request->all());
        return response()->json($pair, 200);
    }

    public function delete($id)
    {
        $pair = Pair::find($id);

        if (!$pair) {
            return response()->json(['error' => 'Paire de devises non trouvée'], 404);
        }

        $pair->delete();

        return response()->json(['message' => 'Paire de devises supprimée avec succès'], 200);
    }
}
