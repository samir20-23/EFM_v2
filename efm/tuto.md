composer require nwidart/laravel-modules
php artisan vendor:publish --provider="Nwidart\Modules\LaravelModulesServiceProvider"
php artisan module:make PkgWidget
php artisan config:clear
