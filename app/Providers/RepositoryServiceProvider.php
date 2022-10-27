<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Repositories\DirectionRepositoryInterface;
use App\Interfaces\Repositories\EmployeeRepositoryInterface;
use App\Interfaces\Repositories\OrderMissionRepositoryInterface;
use App\Interfaces\Repositories\RequisitionRepositoryInterface;
use App\Interfaces\Repositories\SubDirectionRepositoryInterface;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Interfaces\Repositories\VacationRepositoryInterface;

use App\Models\Settings;
use App\Repositories\DirectionRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\OrderMissionRepository;
use App\Repositories\RequisitionRepository;
use App\Repositories\SubDirectionRepository;
use App\Repositories\UsersRepository;
use App\Repositories\VacationRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

    public function register()
    {

        $this->registerUser();
 
        //
        

    }


    public function registerAccouts()
    {
        $this->app->bind(Accounts::class, DirectionRepository::class);
    }
    public function registerEmployee()
    {
        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeRepository::class);
    }
    public function registerOrder()
    {
        $this->app->bind(OrderMissionRepositoryInterface::class, OrderMissionRepository::class);
    }
    public function registerRequisition()
    {
        $this->app->bind(RequisitionRepositoryInterface::class, RequisitionRepository::class);
    }

    public function registerSubDirection()
    {
        $this->app->bind(SubDirectionRepositoryInterface::class, SubDirectionRepository::class);
    }
 
    public function registerUser()
    {
        $this->app->bind(UserRepositoryInterface::class, UsersRepository::class);
    }

    public function registerVacation()
    {
        $this->app->bind(VacationRepositoryInterface::class, VacationRepository::class);
    }
   
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
