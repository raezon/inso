<?php

namespace App\Interfaces\Repositories;

use Illuminate\Http\Request;

interface SpecialityRepositoryInterface
{
    public function getAll();
    public function getById($specialityId);
    public function deleteById($speciality);
    public function create(array $dto);
    public function update($specialityId, array $speciality);
}
