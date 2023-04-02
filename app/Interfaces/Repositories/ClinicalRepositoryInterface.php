<?php

namespace App\Interfaces\Repositories;

use Illuminate\Http\Request;

interface ClinicalRepositoryInterface
{
    public function getAll();
    public function getById($clinicalId);
    public function deleteById($clinical);
    public function create(array $dto);
    public function update($clinicalId, array $clinical);
}
