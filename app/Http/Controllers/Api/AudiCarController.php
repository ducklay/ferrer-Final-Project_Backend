<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AudiCarRequest;
use App\Models\AudiCar;
use App\Models\Post;
use Illuminate\Http\Request;

class AudiCarController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function all(Request $request)
    {
        return AudiCar::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return AudiCar::findOrFail($id);
    }


    /**
    * Store a newly created resource in storage.
    */
    public function store(AudiCarRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();

        // Check if the image is present in the request and store it if it is
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->storePublicly('Audi', 'public');
        }

        // Create the post with the validated data
        $audiCar = AudiCar::create($validated);

        return $audiCar;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $audiCar = AudiCar::findOrFail($id);
        $audiCar->delete();

        return $audiCar;
    }
}
