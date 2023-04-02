<?php

namespace App\Interfaces\Repositories;

use Illuminate\Http\Request;

interface JourneyRepositoryInterface
{
    public function getAll();
    public function getById($journeyId);
    public function deleteById($journey);
    public function create(object $journey);
    public function update(object $journey);
}
