<?php
namespace App\Repositories\Eloquent;
use App\Repositories\Interfaces\JobSeekerRepositoryInterface;
use Illuminate\Support\Facades\Storage;

use App\Models\JobSeeker;
use App\Models\Location;

class JobSeekerRepository implements JobSeekerRepositoryInterface
{
    public function create(array $data){
        return JobSeeker::create($data);
    }

    public function getLocations(){
        return Location::all();
    }

    public function getAll($filters){

        $query = JobSeeker::with('location');

        if(isset($filters['name']))
            $query->where('name','like','%'.$filters['name'].'%');

        if(isset($filters['email']))
            $query->where('email',$filters['email']);

        if(isset($filters['min_exp']))
            $query->where('experience','>=',$filters['min_exp']);

        if(isset($filters['max_exp']))
            $query->where('experience','<=',$filters['max_exp']);

        if(isset($filters['skills']))
            $query->where('skills','like','%'.$filters['skills'].'%');

        if(isset($filters['location']))
            $query->where('location_id','=',$filters['location']);

        if($filters== null || empty($filters))
            $query->orderBy('created_at','desc');



        return $query->get();
    }

    public function find($id){
        return JobSeeker::findOrFail($id);
    }

    public function delete($id){
        // delete associated files
    $user = $this->find($id);

$files = array_filter([$user->photo_path, $user->resume_path]); // remove nulls

if(!empty($files)) {
    Storage::disk('public')->delete($files); // specify disk
}

return JobSeeker::find($id)->delete();

    }

    public function update($id, array $data){
         $user = $this->find($id);
       //  Storage::delete([$user->photo_path,$user->resume_path]);
        return JobSeeker::where('id',$id)->update($data);
    }
}
