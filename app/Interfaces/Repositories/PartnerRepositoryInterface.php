<?php

namespace App\Interfaces\Repositories;

use Illuminate\Http\Request;

interface PartnerRepositoryInterface
{
    public function getAll();
    public function getById($partnerId);
    public function deleteById($partner);
    public function create(array $dto);
    public function update($id,array $dto);
}
