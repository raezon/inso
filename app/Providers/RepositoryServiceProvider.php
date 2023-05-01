<?php

namespace App\Providers;

use App\Carousels;
use App\CurrentClients;
use App\Interfaces\Repositories\AccountsRepositoryInterface;
use App\Interfaces\Repositories\AppointementRepositoryInterface;
use App\Interfaces\Repositories\CarouselsRepositoryInterface;
use App\Interfaces\Repositories\CurrentClientsRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\Repositories\HospitalRepositoryInterface;
use App\Interfaces\Repositories\PartnerRepositoryInterface;
use App\Interfaces\Repositories\RequestUsersRepositoryInterface;
use App\Interfaces\Repositories\SettingsRepositoryInterface;
use App\Interfaces\Repositories\SocialMediaRepositoryInterface;
use App\Interfaces\Repositories\SpecialityRepositoryInterface;
use App\Interfaces\Repositories\UserRepositoryInterface;
//repositories
use App\Repositories\AccountsRepository;
use App\Repositories\AppointementRepository;
use App\Repositories\CarouselsRepository;
use App\Repositories\CurrentClientsRepository;
use App\Repositories\HospitalRepository;
use App\Repositories\PartnerRepository;
use App\Repositories\RequestUsersRepository;
use App\Repositories\SettingsRepository;
use App\Repositories\SocialMediaRepository;
use App\Repositories\SpecialityRepository;
use App\Repositories\UsersRepository;


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
        $this->registerAppointement();
        $this->registePartner();
    }

    public function registePartner()
    {
        $this->app->bind(PartnerRepositoryInterface::class, PartnerRepository::class);
    }
    public function registerUser()
    {
        $this->app->bind(UserRepositoryInterface::class, UsersRepository::class);
    }

    public function registerAccounts()
    {
        $this->app->bind(AccountsRepositoryInterface::class, AccountsRepository::class);
    }
    public function registerCarousels()
    {
        $this->app->bind(CarouselsRepositoryInterface::class, CarouselsRepository::class);
    }
    public function registerCurrentClients()
    {
        $this->app->bind(CurrentClientsRepositoryInterface::class, CurrentClientsRepository::class);
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
        $this->app->bind(SocialMediaRepositoryInterface::class, SocialMediaRepository::class);
    }
    public function registerSpeciality()
    {
        $this->app->bind(SpecialityRepositoryInterface::class, SpecialityRepository::class);
    }
    public function registerAppointement()
    {
        $this->app->bind(AppointementRepositoryInterface::class, AppointementRepository::class);
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
