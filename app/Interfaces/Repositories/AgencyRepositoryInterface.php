<?php

namespace App\Interfaces\Repositories;

use Illuminate\Http\Request;

interface AgencyRepositoryInterface
{
    public function getAll();
    public function getById($agencyId);
    public function deleteById($agency);
    public function create(array $dto);
    public function update($agencyId, array $agency);
}
