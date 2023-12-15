<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // Include the Category model

class JobController extends Controller
{
    public function index(Request $request)
    {
        // Fetch featured jobs (optional)
        $featuredJobs = Job::where('featured', true)->get();

        // Fetch all categories (or specific categories if needed)
        $categories = Category::all(); // You can customize this query

        // Pass variables to the view
        return view('welcome', compact('featuredJobs', 'categories'));
    }
}
