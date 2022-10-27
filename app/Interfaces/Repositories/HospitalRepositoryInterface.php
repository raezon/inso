<?php

namespace App\Interfaces\Repositories;

use Illuminate\Http\Request;

interface HospitalRepositoryInterface
{
    public function getAll();
    public function getById($hospitalId);
    public function deleteById($hospital);
    public function create(array $dto);
    public function update($hospitalId, array $hospital);
}
