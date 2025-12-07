<?php
namespace App\Repositories\Eloquent;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\AdminAuthRepositoryInterface;

class AdminAuthRepository implements AdminAuthRepositoryInterface
{
    public function attemptLogin(array $credentials): bool
    {
        return Auth::guard('admin')->attempt($credentials);
    }

    public function logout(): void
    {
        Auth::guard('admin')->logout();
    }

    public function getUser()
    {
        return Auth::guard('admin')->user();
    }
}
