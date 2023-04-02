<?php

namespace App\Interfaces\Repositories;

use Illuminate\Http\Request;

interface UniversityRepositoryInterface
{
    public function getAll();
    public function getById($universityId);
    public function deleteById($university);
    public function create(array $dto);
    public function update($universityId, array $university);
}
