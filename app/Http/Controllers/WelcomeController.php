<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job; // Replace with your actual Job model

class WelcomeController extends Controller
{
    public function index()
    {
        // Fetch featured jobs (replace with your desired query)
        $featuredJobs = Job::where('featured', true)->get();

        // Pass featured jobs to the view
        return view('welcome', compact('featuredJobs'));
    }
}
