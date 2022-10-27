<?php

namespace App\Interfaces\Repositories;

use Illuminate\Http\Request;

interface RequestUsersRepositoryInterface
{
    public function getAll();
    public function getById($requestUserId);
    public function deleteById($requestUser);
    public function create(array $dto);
    public function update($requestUserId, array $requestUser);
}
