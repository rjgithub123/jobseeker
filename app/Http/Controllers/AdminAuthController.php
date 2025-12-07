<?php

namespace App\Http\Controllers;
use App\Repositories\Interfaces\AdminAuthRepositoryInterface;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    protected $authRepo;

    public function __construct(AdminAuthRepositoryInterface $authRepo)
    {
        $this->authRepo = $authRepo;
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|string'
        ]);

        if($this->authRepo->attemptLogin($request->only('email','password'))){
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email'=>'Invalid credentials']);
    }

    public function logout()
    {
        $this->authRepo->logout();
        return redirect()->route('admin.login');
    }
}