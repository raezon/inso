<?php

namespace App\Interfaces\Repositories;

use Illuminate\Http\Request;

interface CarouselsRepositoryInterface
{
    public function getAll();
    public function getById($carouselId);
    public function deleteById($carousel);
    public function create(array $dto);
    public function update($carouselId, array $carousel);
}
