<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Pump;
use App\Models\Sale;
use App\Policies\UserPolicy;
use App\Policies\PumpPolicy;
use App\Policies\SalePolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Auto-create migrations table if it doesn't exist
        try {
            if (!DB::getSchemaBuilder()->hasTable('migrations')) {
                DB::statement("
                    CREATE TABLE `migrations` (
                      `id` int unsigned NOT NULL AUTO_INCREMENT,
                      `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                      `batch` int NOT NULL,
                      PRIMARY KEY (`id`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
                ");
            }
        } catch (\Throwable $e) {
            // Ignore errors during bootstrap
        }

        // register simple authorization policies and admin gate
        try {
            Gate::policy(User::class, UserPolicy::class);
            Gate::policy(Pump::class, PumpPolicy::class);
            Gate::policy(Sale::class, SalePolicy::class);

            Gate::define('admin', function (?User $user) {
                return $user && method_exists($user, 'isAdmin') && $user->isAdmin();
            });
        } catch (\Throwable $e) {
            // ignore during early bootstrap when classes may not be available (e.g., artisan vendor:publish)
        }
    }
}
