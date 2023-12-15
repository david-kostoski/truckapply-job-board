<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TruckApply.com</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
<header class="container-fluid bg-primary text-white p-3 mb-5">
    <h1>TruckApply.com</h1>
    <p>Built for Truckers by Truckers - Find your dream job today!</p>
</header>
<main class="container">
    <section class="row">
        <div class="col-md-8">
            <h2>Search for jobs</h2>
            <form method="GET" action="{{ route('jobs.index') }}">
                <div class="form-group row">
                    <label for="keyword" class="col-sm-2 col-form-label">Keyword</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Job title, keyword, or company">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="location" class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="location" name="location" placeholder="City, state, or zip code">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="categories" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="categories" name="category">
                            <option value="">All Categories</option>
                            @if (isset($categories))
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Search Jobs</button>
            </form>
        </div>
        <div class="col-md-4">
            <h2>Featured Jobs</h2>
            @if (isset($featuredJobs) && $featuredJobs->count())
                <ul class="list-group">
                    @foreach ($featuredJobs as $job)
                        <li class="list-group-item">
                            <a href="{{ route('jobs.show', $job->id) }}">{{ $job->title }}</a>
                            <p class="text-muted">{{ $job->company_name }}</p>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No featured jobs available at this time.</p>
            @endif
        </div>
    </section>
    <section class="row mt-5">
        <div class="col-md-6">
            <h2>About [Job Board Name]</h2>
            <p>[Insert description of your job board platform and its mission]</p>
        </div>
        <div class="col-md-6">
            <h2>Call to Action</h2>
            <ul>
                @auth
                    <li><a href="{{ route('jobs.create') }}">Post a Job</a></li>
                @else
                    <li><a href="{{ route('register') }}">Create a Free Account</a></li>
                    <li><a href="{{ route('login') }}">Sign In</a></li>
                @endauth
                <li><a href="#">Browse Job Categories</a></li>
                <li><a href="#">Learn About Job Hunting Resources</a></li>
            </ul>
        </div>
    </section>
</main>
<footer class="container-fluid bg-dark text-white p-3 mt-5">
    <p>&copy; [TruckApply.com] </p>
</footer>
