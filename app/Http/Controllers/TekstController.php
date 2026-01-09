<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tekst;

class TekstController extends Controller
{
    public function index()
    {
        return Tekst::paginate(10);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'author'  => 'nullable|string|max:255',
            'content' => 'required|string',
        ]);

        $tekst = Tekst::create($validated);

        return response()->json($tekst, 201);
    }

    public function show($id)
    {
        return Tekst::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $tekst = Tekst::findOrFail($id);

        $validated = $request->validate([
            'title'   => 'sometimes|string|max:255',
            'author'  => 'nullable|string|max:255',
            'content' => 'sometimes|string',
        ]);

        $tekst->update($validated);

        return response()->json($tekst);
    }

    public function destroy($id)
    {
        $tekst = Tekst::findOrFail($id);
        $tekst->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }
}