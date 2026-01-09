<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proza;

class ProzaController extends Controller
{
    public function index()
    {
        return Proza::paginate(10);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'image'   => 'nullable|string|max:500',
            'author'  => 'nullable|string|max:255',
            'content' => 'required|string',
        ]);

        $proza = Proza::create($validated);

        return response()->json($proza, 201);
    }

    public function show($id)
    {
        return Proza::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $proza = Proza::findOrFail($id);

        $validated = $request->validate([
            'title'   => 'sometimes|string|max:255',
            'image'   => 'nullable|string|max:500',
            'author'  => 'nullable|string|max:255',
            'content' => 'sometimes|string',
        ]);

        $proza->update($validated);

        return response()->json($proza);
    }

    public function destroy($id)
    {
        $proza = Proza::findOrFail($id);
        $proza->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }
}