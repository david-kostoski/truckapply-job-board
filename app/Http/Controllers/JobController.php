<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Job;

// Include the Category model

class JobController extends Controller
{
    public function index(Request $request): View
    {
        $categoryId = $request->input('category'); // Get category ID from request

        // Filter jobs based on category
        if ($categoryId) {
            $jobs = Job::where('category_id', $categoryId)->get();
        } else {
            $jobs = Job::all(); // Get all jobs if no category selected
        }

        // Your existing logic for displaying jobs ...

        return view('jobs.index', compact('jobs'));
    }

    public function store(Request $request): RedirectResponse
    {
        // Validate user input and job information
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'company' => 'required|string',
            // ... Add additional validation rules as needed
        ]);

        // Create and save the new job record
        $job = Job::create($validatedData);

        // Handle success or failure messages and redirects
        if ($job) {
            // Display success message
            // ...

            return redirect()->route('jobs.index');
        } else {
            // Handle error and display message
            // ...

            return redirect()->back()->withInput();
        }
    }
}
