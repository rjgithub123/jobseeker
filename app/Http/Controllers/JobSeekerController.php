<?php

namespace App\Http\Controllers;
use App\Http\Requests\JobSeekerRegisterRequest;
use App\Jobs\SendRegistrationMail;
use App\Repositories\Interfaces\JobSeekerRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class JobSeekerController extends Controller
{
   private $repo;

   public function __construct(JobSeekerRepositoryInterface $repo)
   {
      $this->repo = $repo;
   }

   public function showRegistrationForm()
   {
      $locations = $this->repo->getLocations();
      return view('jobseeker.register', compact('locations'));
   }

   public function index(Request $request)
{
   $jobSeekers = $this->repo->getAll($request->all());
   $locations = $this->repo->getLocations();

   return view('admin.dashboard',compact('jobSeekers', 'locations'));
}




   public function store(JobSeekerRegisterRequest $request)
   {
      $data = $request->validated();

      $data['resume_path'] = $request->file('resume')->store('resumes','public');
      $data['photo_path'] = $request->file('photo')->store('photos','public');
      $data['password'] = bcrypt($request->password);

       $jobseeker = $this->repo->create($data);

      SendRegistrationMail::dispatch($jobseeker);

      return back()->with('success','Registered successfully');
   }

   public function destroy($id)
{
   $user = $this->repo->find($id);

   $files = array_filter([
    $user->resume_path,
    $user->photo_path
]);

Storage::delete($files);
   $this->repo->delete($id);

   return back()->with('success','Deleted');
}

public function dashboard()
{
   return view('jobseeker.dashboard');
}

public function show($id)
{
   $jobSeeker = $this->repo->find($id);
   return view('admin.jobseekerView',compact('jobSeeker'));
}

public function editProfile()
{
   $user = auth()->user();
   $locations = $this->repo->getLocations();
   return view('jobseeker.editProfile',compact('user','locations'));
}

public function updateProfile(Request $req)
{
  $data=$req->validate([
     'name'=>'required|string|max:255',
     'phone'=>'required|string|max:20',
     'experience'=>'nullable|numeric|min:0',
     'notice_period'=>'nullable|numeric|min:0',
     'skills'=>'nullable|string',
     'location_id'=>'nullable|exists:locations,id',
     'resume'=>'nullable|file|mimes:pdf,doc,docx|max:2048',
     'photo'=>'nullable|image|mimes:jpg,jpeg,png|max:1024'
   ]);

   $data = $data;

   $this->repo->update(auth()->id(), $data);

   return back()->with('success','Profile updated');
}

public function showChangePasswordForm()
{
   return view('jobseeker.changePassword');
}

public function changePassword(Request $req)
{
   $req->validate([
     'old_password'=>'required',
     'password'=>'required|confirmed|min:6'
   ]);


   $user = auth()->user();

   if(!Hash::check($req->old_password,$user->password)){
      return back()->withErrors('Old password incorrect');
   }

   $user->update([
      'password'=>Hash::make($req->password)
   ]);

   return back()->with('success','Password updated');
}
}