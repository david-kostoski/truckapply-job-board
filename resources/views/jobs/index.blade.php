@extends('layouts.app') // Replace with your actual layout if using one

@section('content')
    <h2>Job Listings</h2>

    <div class="job-listings row">
        @foreach ($jobs as $job)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $job->title }}</h5>
                        <p class="card-text">{{ Str::limit($job->description, 100) }}</p>
                        <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
