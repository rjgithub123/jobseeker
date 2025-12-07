@extends('layouts.app')
@section('content')

<h2>Job Seeker Edit Profile</h2>
<form method="POST" action="{{ route('jobseeker.profile.update') }}" enctype="multipart/form-data" class="form-contact contact_form">
@csrf
<table>
<tr>
   <td>Name</td>
   <td><input class="form-control" type="text" name="name" value="{{ old('name', $user->name) }}">
@error('name')
      <div class="text-danger">{{ $message }}</div>
   @enderror
</td>
</tr>

{{-- <tr>
   <td>Email</td>
   <td><input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
@error('email')
      <div class="text-danger">{{ $message }}</div>
   @enderror
</td>
</tr> --}}

<tr>
   <td>Phone</td>
   <td><input type="text" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}">
@error('phone')
      <div class="text-danger">{{ $message }}</div>
@enderror
</td>
</tr>

<tr>
   <td>Experience (Years)</td>
   <td><input type="number" class="form-control" name="experience" value="{{ old('experience', $user->experience) }}">
@error('experience')
      <div class="text-danger">{{ $message }}</div>
@enderror
</td>
</tr>

<tr>
   <td>Notice Period (Days)</td>
   <td><input type="number" class="form-control" name="notice_period"
              value="{{ old('notice_period', $user->notice_period) }}">
@error('notice_period')
      <div class="text-danger">{{ $message }}</div>
   @enderror
</td>
</tr>

<tr>
   <td>Skills</td>
   <td><input type="text" class="form-control" name="skills" value="{{ old('skills', $user->skills) }}">
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
                {{ old('location_id', $user->location_id)==$location->id?'selected':'' }}>
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
    <img src="{{ asset('storage/'.$user->resume_path) }}" alt="Resume" width="100">
@error('resume')
      <div class="text-danger">{{ $message }}</div>
   @enderror
</td>
</tr>

<tr>
   <td>Photo</td>
   <td><input type="file" class="form-control" name="photo">
    <img src="{{ asset('storage/'.$user->photo_path) }}" alt="Photo" width="100">
@error('photo')
      <div class="text-danger">{{ $message }}</div>
   @enderror
</td>
</tr>

<tr>
   <td colspan="2">
      <button class="form-control" type="submit">Update Profile</button>
   </td>
</tr>

</table>



@endsection



