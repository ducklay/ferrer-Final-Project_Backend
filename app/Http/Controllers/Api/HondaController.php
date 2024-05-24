<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\HondaRequest;
use App\Models\Honda;
use Illuminate\Http\Request;

class HondaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function all(Request $request)
    {
        return Honda::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Honda::findOrFail($id);
    }


    /**
    * Store a newly created resource in storage.
    */
    public function store(HondaRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();

        // Check if the image is present in the request and store it if it is
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->storePublicly('Honda', 'public');
        }

        // Create the post with the validated data
        $honda = Honda::create($validated);

        return $honda;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $honda = Honda::findOrFail($id);
        $honda->delete();

        return $honda;
    }
}
