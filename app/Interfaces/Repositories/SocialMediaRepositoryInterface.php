<?php

namespace App\Interfaces\Repositories;

use Illuminate\Http\Request;

interface SocialMediaRepositoryInterface
{
    public function getAll();
    public function getById($socialMediaId);
    public function deleteById($socialMedia);
    public function create(array $dto);
    public function update($socialMediaId, array $socialMedia);
}
