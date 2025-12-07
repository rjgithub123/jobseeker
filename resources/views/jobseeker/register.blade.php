@extends('layouts.app')
@section('content')

<h2>Job Seeker Registration</h2>
<form method="POST" action="{{ route('jobseeker.store') }}" enctype="multipart/form-data" class="form-contact contact_form">
@csrf
<table>
<tr>
   <td>Name</td>
   <td><input class="form-control" type="text" name="name" value="{{ old('name') }}">
@error('name')
      <div class="text-danger">{{ $message }}</div>
   @enderror
</td>
</tr>

<tr>
   <td>Email</td>
   <td><input type="email" class="form-control" name="email" value="{{ old('email') }}">
@error('email')
      <div class="text-danger">{{ $message }}</div>
   @enderror
</td>
</tr>

<tr>
   <td>Phone</td>
   <td><input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
@error('phone')
      <div class="text-danger">{{ $message }}</div>
@enderror
</td>
</tr>

<tr>
   <td>Experience (Years)</td>
   <td><input type="number" class="form-control" name="experience" value="{{ old('experience') }}">
@error('experience')
      <div class="text-danger">{{ $message }}</div>
@enderror
</td>
</tr>

<tr>
   <td>Notice Period (Days)</td>
   <td><input type="number" class="form-control" name="notice_period"
              value="{{ old('notice_period') }}">
@error('notice_period')
      <div class="text-danger">{{ $message }}</div>
   @enderror
</td>
</tr>

<tr>
   <td>Skills</td>
   <td><input type="text" class="form-control" name="skills" value="{{ old('skills') }}">
@error('skills')
      <div class="text-danger">{{ $message }}</div>
   @enderror
</td>
</tr>

<tr>
   <td>Job Location</td>
   <td>
      <select name="location_id" class="form-control">
          <option value="">-- Select City --</option>
          @foreach($locations as $location)
              <option value="{{ $location->id }}"
                {{ old('location_id')==$location->id?'selected':'' }}>
                {{ $location->city }}
              </option>
          @endforeach
      </select>
      @error('location_id')
         <div class="text-danger">{{ $message }}</div>
      @enderror
   </td>
</tr>

<tr>
   <td>Resume</td>
   <td><input type="file" class="form-control" name="resume">
@error('resume')
      <div class="text-danger">{{ $message }}</div>
   @enderror
</td>
</tr>

<tr>
   <td>Photo</td>
   <td><input type="file" class="form-control" name="photo">
@error('photo')
      <div class="text-danger">{{ $message }}</div>
   @enderror
</td>
</tr>

<tr>
   <td>Password</td>
   <td><input type="password" class="form-control" name="password">

@error('password')
      <div class="text-danger">{{ $message }}</div>
   @enderror
</td>
</tr>

<tr>
   <td>Confirm Password</td>
   <td>
      <input type="password" class="form-control" name="password_confirmation">
   </td>
</tr>

<tr>
   <td colspan="2">
      <button class="form-control" type="submit">Register</button>
   </td>
</tr>

</table>

<br>

<a href="{{ route('jobseeker.login') }}">
    Already registered? Login here
</a>

@endsection



