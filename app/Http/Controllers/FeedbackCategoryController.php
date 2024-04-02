<?php

namespace App\Http\Controllers;

use App\Models\FeedbackCategory;
use Illuminate\Http\Request;

class FeedbackCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(FeedbackCategory::all()->toArray(), 200);
    }
}
