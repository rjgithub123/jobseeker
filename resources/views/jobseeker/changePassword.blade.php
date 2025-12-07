@extends('layouts.app')
@section('content')
<form method="POST"  action="{{ route('jobseeker.change.password') }}">
    @csrf
    <div>
        <label for="old_password">Old Password:</label>
        <input type="password" id="old_password" name="old_password" >
        @error('old_password')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="password">New Password:</label>
        <input type="password" id="password" name="password" >
        @error('password')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="password_confirmation">Confirm New Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" >
        @error('password_confirmation')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button class="" type="submit">Change Password</button>
</form>
@endsection