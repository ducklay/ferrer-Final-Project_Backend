<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FordRequest;
use App\Models\Ford;
use Illuminate\Http\Request;

class FordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function all(Request $request)
    {
        return Ford::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Ford::findOrFail($id);
    }


    /**
    * Store a newly created resource in storage.
    */
    public function store(FordRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();

        // Check if the image is present in the request and store it if it is
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->storePublicly('Ford', 'public');
        }

        // Create the post with the validated data
        $ford = Ford::create($validated);

        return $ford;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ford = Ford::findOrFail($id);
        $ford->delete();

        return $ford;
    }
}
