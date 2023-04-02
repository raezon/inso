<?php

namespace App\Interfaces\Repositories;

use Illuminate\Http\Request;

interface JourneyRepositoryInterface
{
    public function getAll();
    public function getById($journeyId);
    public function deleteById($journey);
    public function create(array $dto);
    public function update($journeyId, array $journey);
}
