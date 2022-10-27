<?php

namespace App\Interfaces\Repositories;

use Illuminate\Http\Request;

interface AccountsRepositoryInterface
{
    public function getAll();
    public function getById($accountId);
    public function deleteById($account);
    public function create(array $dto);
    public function update($accountId, array $account);
}
