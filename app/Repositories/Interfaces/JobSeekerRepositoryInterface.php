<?php

namespace App\Repositories\Interfaces;

use App\Models\JobSeeker;

interface JobSeekerRepositoryInterface
{
    public function create(array $data);
    public function getAll($filters);
    public function find($id);
    public function delete($id);
      public function getLocations();
public function update($id, array $data);

}
