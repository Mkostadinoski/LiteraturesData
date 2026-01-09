<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citat;

class CitatiController extends Controller
{
    public function index()
    {
        return Citat::paginate(10);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:500',
            'author'  => 'nullable|string|max:255',
        ]);

        $citat = Citat::create($validated);

        return response()->json($citat, 201);
    }

    public function show($id)
    {
        return Citat::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $citat = Citat::findOrFail($id);

        $validated = $request->validate([
            'content' => 'sometimes|string|max:500',
            'author'  => 'nullable|string|max:255',
        ]);

        $citat->update($validated);

        return response()->json($citat);
    }

    public function destroy($id)
    {
        $citat = Citat::findOrFail($id);
        $citat->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }
}