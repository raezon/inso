<?php

declare(strict_types=1);

namespace App\Services\TakeNormalVacation;

use App\Interfaces\Api\EmployeeLogicInterface;

class TakeNormalVacationService implements EmployeeLogicInterface
{
    public function consume()
    {
        dd("normal vacation");
    }
}
