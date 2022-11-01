<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\StorageLinkCommand;

class CustomStorageLinkCommand extends StorageLinkCommand
{
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a symbolic link from "public/a" to "storage/app/public"';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (file_exists(public_path('a'))) {
            return $this->error('The "public/hospitals" directory already exists.');
        }
        $this->laravel->make('files')->link(
            storage_path('app/public/accounts'), public_path('accounts'),
        );
        
        $this->laravel->make('files')->link(
            storage_path('app/public/carousels'), public_path('carousels')
        );
        $this->laravel->make('files')->link(
            storage_path('app/public/current-clients'),
            public_path('current-clients')
        );
        $this->laravel->make('files')->link(
            storage_path('app/public/hospitals'),
            public_path('hospitals')
        );
        $this->laravel->make('files')->link(
            storage_path('app/public/request-users'),
            public_path('request-users')
        );
        $this->laravel->make('files')->link(
            storage_path('app/public/settings'),
            public_path('settings')
        );
        $this->laravel->make('files')->link(
            storage_path('app/public/speciality'),
            public_path('speciality')
        );
          
        $this->info('The [public/*] all directory has been linked.');
    }
}