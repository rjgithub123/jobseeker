<?php
namespace App\Repositories\Eloquent;

use App\Models\JobSeeker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\JobSeekerAuthRepositoryInterface;

class JobSeekerAuthRepository implements JobSeekerAuthRepositoryInterface
{
    public function attemptLogin(array $credentials): bool
    {
        return Auth::guard('web')->attempt($credentials);
    }

    public function logout(): void
    {
        Auth::guard('web')->logout();
    }

    public function getUser()
    {
        return Auth::guard('web')->user();
    }
}
