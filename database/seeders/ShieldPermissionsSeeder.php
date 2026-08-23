<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use RuntimeException;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class ShieldPermissionsSeeder extends Seeder
{
    /**
     * Generate the permissions required by Filament Shield before users are seeded.
     *
     * Resources are hidden by their policies when the permission records do not
     * exist. Keeping this as an explicit seed step makes a fresh installation
     * fail fast instead of rendering an apparently empty Filament panel.
     */
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $exitCode = Artisan::call('shield:generate', [
            '--all' => true,
            '--no-interaction' => true,
        ]);

        if ($exitCode !== 0) {
            throw new RuntimeException('Filament Shield could not generate permissions.');
        }

        app(PermissionRegistrar::class)->forgetCachedPermissions();

        if (Permission::query()->count() === 0) {
            throw new RuntimeException('Filament Shield generated no permissions.');
        }
    }
}
