<?php

namespace App\Providers;

use App\Services\ScopedInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $repositories = app_path('Services/Repositories'); // مسیر پوشه اینترفیس‌ها

        $files = glob($repositories . '/*.php');


        foreach ($files as $file) {

            $className = 'App\\Services\\Repositories\\' . basename($file, '.php');

            $reflection = new \ReflectionClass($className);

            if ($reflection->implementsInterface(ScopedInterface::class)) {
                $implementationClass = 'App\\Services\\Implements\\' . basename($file, 'Interface.php'); // اسم کلاس پیاده‌سازی

                $this->app->scoped($className, $implementationClass);
            }
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
