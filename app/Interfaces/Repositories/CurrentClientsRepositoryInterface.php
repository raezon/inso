<?php

namespace App\Interfaces\Repositories;

use Illuminate\Http\Request;

interface CurrentClientsRepositoryInterface
{
    public function getAll();
    public function getById($currentClientId);
    public function deleteById($currentClient);
    public function create(array $dto);
    public function update($currentClientId, array $currentClient);
}
