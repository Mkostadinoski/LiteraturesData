<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poezija;

class PoezijaController extends Controller
{
    public function index()
    {
        return Poezija::paginate(10);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
        'title'   => 'required|string|max:255',
        'image'   => 'nullable|string|max:500',
        'author'  => 'nullable|string|max:255',
        'content' => 'required|string',
    ]);


        $poezija = Poezija::create($validated);

        return response()->json($poezija, 201);
    }

    public function show($id)
    {
        return Poezija::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $poezija = Poezija::findOrFail($id);

        $validated = $request->validate([
        'title'   => 'required|string|max:255',
        'image'   => 'nullable|string|max:500',
        'author'  => 'nullable|string|max:255',
        'content' => 'required|string',
    ]);


        $poezija->update($validated);

        return response()->json($poezija);
    }

    public function destroy($id)
    {
        $poezija = Poezija::findOrFail($id);
        $poezija->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }
}