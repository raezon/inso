<?php

namespace App\Providers;

use App\Carousels;
use App\CurrentClients;
use App\Interfaces\Repositories\AccountsRepositoryInterface;
use App\Interfaces\Repositories\CarouselsRepositoryInterface;
use App\Interfaces\Repositories\CurrentClientsRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\Repositories\DirectionRepositoryInterface;
use App\Interfaces\Repositories\EmployeeRepositoryInterface;
use App\Interfaces\Repositories\HospitalRepositoryInterface;
use App\Interfaces\Repositories\OrderMissionRepositoryInterface;
use App\Interfaces\Repositories\RequestUsersRepositoryInterface;
use App\Interfaces\Repositories\RequisitionRepositoryInterface;
use App\Interfaces\Repositories\SettingsRepositoryInterface;
use App\Interfaces\Repositories\SocialMediaRepositoryInterface;
use App\Interfaces\Repositories\SpecialityRepositoryInterface;
use App\Interfaces\Repositories\SubDirectionRepositoryInterface;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Interfaces\Repositories\VacationRepositoryInterface;

use App\Models\Settings;
use App\Repositories\DirectionRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\HospitalRepository;
use App\Repositories\OrderMissionRepository;
use App\Repositories\RequestUsersRepository;
use App\Repositories\RequisitionRepository;
use App\Repositories\SettingsRepository;
use App\Repositories\SpecialityRepository;
use App\Repositories\SubDirectionRepository;
use App\Repositories\UsersRepository;
use App\Repositories\VacationRepository;
use App\SocialMedia;

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
        $this->registerAccounts();
        $this->registerCarousels();
        $this->registerCurrentClients();
        $this->registerHospital();
        $this->registerRequestUsers();
        $this->registerSettings();
        $this->registerSocialMedia();
        $this->registerSpeciality();
        $this->registerAccounts();
    }

    public function registerUser()
    {
        $this->app->bind(UserRepositoryInterface::class, UsersRepository::class);
    }

    public function registerAccounts()
    {
        $this->app->bind(AccountsRepositoryInterface::class, AccountsRepositoryInterface::class);
    }
    public function registerCarousels()
    {
        $this->app->bind(CarouselsRepositoryInterface::class, Carousels::class);
    }
    public function registerCurrentClients()
    {
        $this->app->bind(CurrentClientsRepositoryInterface::class, CurrentClients::class);
    }
    public function registerHospital()
    {
        $this->app->bind(HospitalRepositoryInterface::class, HospitalRepository::class);
    }

    public function registerRequestUsers()
    {
        $this->app->bind(RequestUsersRepositoryInterface::class, RequestUsersRepository::class);
    }
 
    public function registerSettings()
    {
        $this->app->bind(SettingsRepositoryInterface::class, SettingsRepository::class);
    }

    public function registerSocialMedia()
    {
        $this->app->bind(SocialMediaRepositoryInterface::class, SocialMedia::class);
    }
    public function registerSpeciality()
    {
        $this->app->bind(SpecialityRepositoryInterface::class, SpecialityRepository::class);
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
