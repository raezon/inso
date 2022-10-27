<?php
namespace App\Interfaces\Repositories;
use Illuminate\Http\Request;

interface UserRepositoryInterface 
{
    public function getAll();
    public function getById($userId);
    public function deleteById($userId);
    public function create(array $user) ;
    public function update($userId, array $user);
}

