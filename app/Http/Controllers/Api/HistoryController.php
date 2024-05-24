<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\HistoryRequest;
use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Show data based on logged user
        $history = History::where('user_id', $request->user()->id)->get();

        return $history;
    }

    /**
    * Store a newly created resource in storage.
    */
    public function store(HistoryRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();

        // Check if the image is present in the request and store it if it is
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->storePublicly('Audi', 'public');
        }

        // Create the post with the validated data
        $history = History::create($validated);

        return $history;
    }
}
