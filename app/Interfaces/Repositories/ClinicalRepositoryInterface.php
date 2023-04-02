<?php

namespace App\Interfaces\Repositories;

use Illuminate\Http\Request;

interface ClinicalRepositoryInterface
{
    public function getAll();
    public function getById($clinicalId);
    public function deleteById($clinical);
    public function create(object $clinical);
    public function update(object $clinical);
}
