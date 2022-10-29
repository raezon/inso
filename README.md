### Instllation
composer install
### Generate models example
php artisan krlove:generate:model User --table-name=user
### Generate controller

### Generate ressource example
php artisan make:resource UserResource

### Generate ressource controller example
php artisan make:controller sharkController --resource 

### Generate CustomStorageLinkCommand
php artisan make:command CustomStorageLinkCommand

### Excute spatie seed
php artisan db:seed --class=PermissionTableSeeder
php artisan db:seed --class=CreateAdminUserSeeder

### List routes
php artisan route:list
### Run websocket serve
php artisan websockets:serve