<?php

namespace App\Providers;

use App\Interfaces\Api\EmployeeLogicInterface;
use App\Services\TakeNormalVacation\TakeNormalVacationService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerVacationFactory();
    }
    public function registerVacationFactory()
    {
        if(isset($_POST['type'])){
            $typeVacation = $_POST['type'];
            $serviceConfig = config('services.vacation.' . $typeVacation);
            if ($serviceConfig)
                return $this->app->bind(EmployeeLogicInterface::class, $serviceConfig);
        }

        return $this->app->bind(EmployeeLogicInterface::class, TakeNormalVacationService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
