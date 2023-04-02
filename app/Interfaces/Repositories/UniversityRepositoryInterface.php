<?php

namespace App\Interfaces\Repositories;

use Illuminate\Http\Request;

interface UniversityRepositoryInterface
{
    public function getAll();
    public function getById($universityId);
    public function deleteById($university);
    public function create(object $university);
    public function update(object $university);
}
