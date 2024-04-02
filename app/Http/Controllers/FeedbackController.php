<?php

namespace App\Http\Controllers;

use App\Http\Resources\FeedbackCollection;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Log;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedback = Feedback::paginate(20);
        return new FeedbackCollection($feedback);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'category_id' => 'required|numeric',
            ]);


            $feedback = new Feedback();
            $feedback->title = $request->input('title');
            $feedback->description = $request->input('description');
            $feedback->category_id = $request->input('category_id');
            $feedback->user_id = auth()->user()->id;
            $feedback->save();

            return response()->json(['message' => 'Feedback stored successfully', 'feedback' => $feedback], 201);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json(['message' => 'Internal server!'], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
