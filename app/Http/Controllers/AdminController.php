<?php

namespace App\Http\Controllers;
use App\Repositories\Interfaces\JobSeekerRepositoryInterface;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $jobSeekerRepository;

    public function __construct(JobSeekerRepositoryInterface $jobSeekerRepository)
    {
        $this->jobSeekerRepository = $jobSeekerRepository;
    }
    
    public function dashboard()
    {
        $filters = [];
        $jobSeekers = $this->jobSeekerRepository->getAll($filters);
        $locations = $this->jobSeekerRepository->getLocations();

        return view('admin.dashboard', compact('jobSeekers', 'locations'));
    }
}
