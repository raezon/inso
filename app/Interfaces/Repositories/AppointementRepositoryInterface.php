<?php

namespace App\Interfaces\Repositories;

use Illuminate\Http\Request;

interface AppointementRepositoryInterface
{
    public function getAll();
    public function getById($appointementId);
    public function deleteById($appointement);
    public function create(array $dto);
    public function update($appointementId, array $appointement);
}
