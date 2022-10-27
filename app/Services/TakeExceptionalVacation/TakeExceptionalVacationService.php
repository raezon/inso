<?php

declare(strict_types=1);

namespace App\Services\TakeExceptionalVacation;

use App\Interfaces\Api\EmployeeLogicInterface;

class TakeExceptionalVacationService implements EmployeeLogicInterface
{
    public function consume(){
        dd("exceptional vacation");
    }
}
