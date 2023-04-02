<?php

namespace App\Interfaces\Repositories;

use Illuminate\Http\Request;

interface CribRepositoryInterface
{
    public function getAll();
    public function getById($crib);
    public function deleteById($crib);
    public function create(object $crib);
    public function update(object $crib);
}
