<?php

namespace App\Http\Controllers;
use App\Repositories\Interfaces\JobSeekerAuthRepositoryInterface;

use Illuminate\Http\Request;

class JobSeekerAuthController extends Controller
{
    protected $authRepo;

    public function __construct(JobSeekerAuthRepositoryInterface $authRepo)
    {
        $this->authRepo = $authRepo;
    }

    public function showLoginForm()
    {
        return view('jobseeker.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|string'
        ]);

        if($this->authRepo->attemptLogin($request->only('email','password'))){
            return redirect()->route('jobseeker.dashboard');
        }

        return back()->withErrors(['email'=>'Invalid credentials']);
    }

    public function logout()
    {
        $this->authRepo->logout();
        return redirect()->route('jobseeker.login');
    }
}