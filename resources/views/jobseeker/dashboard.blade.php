@extends('layouts.app')
@section('content')

<h2>Job Seeker Dashboard</h2>
<p>Welcome, {{ auth('web')->user()->name }}!</p>



@endsection