<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Job Board | Find & Post Jobs</title>
    @include('layouts.partials.head')
</head>
<body>
@include('layouts.partials.header')

<main class="container mt-5">
    @if (isset($featuredJobs) && count($featuredJobs) > 0)
        <section class="featured-jobs mb-5">
            <h2>Featured Jobs</h2>
            <div class="row">
                @foreach ($featuredJobs as $job)
                    <div class="col-md-6 mb-3">
                        <a href="{{ route('job.show', $job->id) }}" class="job-card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $job->title }}</h5>
                                <p class="card-text">{{ $job->company->name }}</p>
                                <ul class="list-unstyled">
                                    <li><i class="bi bi-map"></i> {{ $job->location }}</li>
                                    <li><i class="bi bi-briefcase"></i> {{ $job->category }}</li>
                                </ul>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <section class="all-jobs">
        <h2>All Jobs</h2>
        <form action="{{ route('jobs.search') }}" method="GET" class="mb-3">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="keyword" placeholder="Search by keyword" class="form-control">
                </div>
                <div class="col-md-3">
                    <select name="category" class="form-control">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="location" class="form-control">
                        <option value="">Select Location</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
        <div class="job-listings">
            @foreach ($jobs as $job)
                <div class="job-card mb-3">
                    <a href="{{ route('job.show', $job->id) }}" class="card-body">
                        <h5 class="card-title">{{ $job->title }}</h5>
                        <p class="card-text">{{ $job->company->name }}</p>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-map"></i> {{ $job->location }}</li>
                            <li><i class="bi bi-briefcase"></i> {{ $job->category }}</li>
                        </ul>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
</main>

@include('layouts.partials.footer')

@include('layouts.partials.scripts')
</body>
</html>
