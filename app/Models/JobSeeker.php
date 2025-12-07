<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobSeeker extends Authenticatable {

    use SoftDeletes;
     protected $guard = 'jobseeker';

    protected $fillable = [
     'name','email','phone','experience',
     'notice_period','skills','location_id',
     'resume_path','photo_path','password'
    ];

    public function location(){
        return $this->belongsTo(Location::class);
    }
}
