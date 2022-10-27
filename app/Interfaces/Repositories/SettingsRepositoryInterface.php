<?php

namespace App\Interfaces\Repositories;

use Illuminate\Http\Request;

interface SettingsRepositoryInterface
{
    public function getAll();
    public function getById($settingsId);
    public function deleteById($settings);
    public function create(array $dto);
    public function update($settingsId, array $settings);
}
