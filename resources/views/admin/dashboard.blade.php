@extends('layouts.app')
@section('content')
<h2>Admin  Dashboard</h2>
<p>Welcome, {{ auth('admin')->user()->name }}!</p>

<h4>Job Seekers Lists</h4>

<div class="section-top-border">
<div class="row">
<div class="col-md-12">
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form method="GET" action="{{ route('admin.jobseekers') }}">
<div class="form-group">
    <div class="form-row">
<div class="col">
    <input class="form-control" type="text" name="name" placeholder="Filter by name" value="{{ request('name') }}">
</div>
<div class="col">
    <input class="form-control" type="email" name="email" placeholder="Filter by email" value="{{ request('email') }}">
</div>
<div class="col">
    <input class="form-control" type="text" name="phone" placeholder="Filter by phone" value="{{ request('phone') }}">
</div>
<div class="col">
    <input class="form-control" type="number" name="min_exp" placeholder="Filter by experience" value="{{ request('min_exp') }}">
</div>
<div class="col">
    <input class="form-control" type="number" name="max_exp" placeholder="Filter by experience" value="{{ request('max_exp') }}">
</div>
<div class="col">
    <select class="form-control" name="location" placeholder="Filter by location">
        <option value="">Select Location</option>
        @foreach($locations as $location)
            <option value="{{ $location->id }}" {{ request('location') == $location->id ? 'selected' : '' }}>
                {{ $location->city }}
            </option>
        @endforeach
    </select>
</div>
<div class="col">
    <input class="form-control" type="text" name="skills" placeholder="Filter by skills" value="{{ request('skills') }}">
</div>
    <button type="submit" class="btn btn-primary btn-sm">Filter</button>
</form>

</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Experience</th>
        <th scope="col">Photo</th>
        <th scope="col">Download Resume</th>
        <th scope="col">View</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>

        @foreach($jobSeekers as $index => $jobSeeker)

      <tr>
        <th scope="row">{{ $index + 1 }}</th>
        <td>{{ $jobSeeker->name }}</td>
        <td>{{ $jobSeeker->email }}</td>
        <td>{{ $jobSeeker->phone }}</td>
        <td>{{ $jobSeeker->experience }} Years</td>
        <td><img src="{{ asset('storage/' . $jobSeeker->photo_path) }}" alt="Photo" width="50"></td>
        <td><a href="{{ asset('storage/' . $jobSeeker->resume_path) }}" download style="color: black">Download</a></td>
        <td><a href="{{ route('admin.jobseeker.view', $jobSeeker->id) }}" style="color: black">View</a></td>
        <td>
            <form method="POST" action="{{ route('admin.jobseeker.destroy', $jobSeeker->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure you want to delete this job seeker?')">
                    Delete
                </button>
            </form>
        </td>
      </tr>
        @endforeach
     
    </tbody>
</table>
			</div>

@endsection