<?php

namespace App\Http\Controllers;

use App\Models\Literature;
use Illuminate\Http\Request;
use App\Http\Resources\LiteratureResource;

class LiteratureController extends Controller
{
    // GET /api/literatures
public function index()
{
    return LiteratureResource::collection(Literature::paginate(10));
}

    // POST /api/literatures
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'author'  => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'nullable|string',
        ]);

        $literature = Literature::create($validated);

        return new LiteratureResource($literature);
    }

    // GET /api/literatures/{id}
    public function show($id)
    {
        $literature = Literature::findOrFail($id);
        return new LiteratureResource($literature);
    }

    // PUT/PATCH /api/literatures/{id}
    public function update(Request $request, $id)
    {
        $literature = Literature::findOrFail($id);

        $validated = $request->validate([
            'title'   => 'sometimes|string|max:255',
            'author'  => 'sometimes|string|max:255',
            'content' => 'sometimes|string',
            'image'   => 'nullable|string',
        ]);

        $literature->update($validated);

        return new LiteratureResource($literature);
    }

    // DELETE /api/literatures/{id}
    public function destroy($id)
    {
        $literature = Literature::findOrFail($id);
        $literature->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }
}