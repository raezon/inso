<?php

namespace App\Interfaces\Repositories;

use Illuminate\Http\Request;

interface AgencyRepositoryInterface
{
    public function getAll();
    public function getById($agencyId);
    public function deleteById(object $agency);
    public function create(object $agency);
    public function update(object $agency);
}
