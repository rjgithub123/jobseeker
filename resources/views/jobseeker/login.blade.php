@extends('layouts.app')
@section('content')
<div class="container">
<h2>Job Seeker Login</h2>

<form method="POST" action="{{ route('jobseeker.login') }}" class="form-contact contact_form">
@csrf
<table>
<tr>
   <td>Email</td>
   <td><input type="email" class="form-control" name="email" value="{{ old('email') }}">
@error('email')
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
   <td colspan="2">
      <button class="form-control" type="submit">Login</button>
   </td>
</tr>
</table>
</form>
</div>

@endsection