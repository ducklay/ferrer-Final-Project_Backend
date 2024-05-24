<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BMWRequest;
use App\Models\BMW;
use Illuminate\Http\Request;

class BMWController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function all(Request $request)
    {
        return BMW::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return BMW::findOrFail($id);
    }


    /**
    * Store a newly created resource in storage.
    */
    public function store(BMWRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();

        // Check if the image is present in the request and store it if it is
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->storePublicly('bmw', 'public');
        }

        // Create the post with the validated data
        $bmw = BMW::create($validated);

        return $bmw;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bmw = BMW::findOrFail($id);
        $bmw->delete();

        return $bmw;
    }
}
