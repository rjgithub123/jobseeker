<?php
namespace App\Repositories\Interfaces;
use App\Models\JobSeeker;

interface AdminAuthRepositoryInterface
{
    public function attemptLogin(array $credentials): bool;
    public function logout(): void;
    public function getUser();
}
