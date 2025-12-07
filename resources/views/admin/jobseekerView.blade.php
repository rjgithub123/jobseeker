@extends('layouts.app')
@section('content')

<h2> {{ $jobSeeker->name }} Details</h2>

<div class="container">
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <td>{{ $jobSeeker->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $jobSeeker->email }}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{ $jobSeeker->phone }}</td>
        </tr>
        <tr>
            <th>Experience</th>
            <td>{{ $jobSeeker->experience }} Years</td>
        </tr>
        <tr>
            <th>Notice Period</th>
            <td>{{ $jobSeeker->notice_period }} Days</td>
        </tr>
        <tr>
            <th>Location</th>
            <td>{{ $jobSeeker->location->city ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Skills</th>
            <td>{{ $jobSeeker->skills }}</td>
        </tr>
        <tr>
            <th>Resume</th>
            <td><a href="{{ asset('storage/' . $jobSeeker->resume_path) }}" style="color: black">Download Resume</a></td>
        </tr>
        <tr>
            <th>Photo</th>
            <td><img src="{{ asset('storage/' . $jobSeeker->photo_path) }}" alt="Photo" width="100"></td>
        </tr>
    </table>

@endsection