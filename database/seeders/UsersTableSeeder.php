<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Artisan;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $adminEmail = env('TALLCMS_ADMIN_EMAIL');
        $adminPassword = env('TALLCMS_ADMIN_PASSWORD');

        if (blank($adminEmail) || blank($adminPassword)) {
            throw new \RuntimeException(
                'Set TALLCMS_ADMIN_EMAIL and TALLCMS_ADMIN_PASSWORD in .env before seeding the database.'
            );
        }

        // Superadmin user
        $sid = Str::uuid();
        DB::table('users')->insert([
            'id' => $sid,
            'username' => env('TALLCMS_ADMIN_USERNAME', 'admin'),
            'firstname' => env('TALLCMS_ADMIN_FIRST_NAME', 'Administrator'),
            'lastname' => env('TALLCMS_ADMIN_LAST_NAME', ''),
            'email' => $adminEmail,
            'email_verified_at' => now(),
            'password' => Hash::make($adminPassword),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Bind superadmin user to FilamentShield
        Artisan::call('shield:super-admin', ['--user' => $sid]);

        $roles = DB::table('roles')->whereNot('name', 'super_admin')->get();
        foreach ($roles as $role) {
            for ($i = 0; $i < 2; $i++) {
                $userId = Str::uuid();
                DB::table('users')->insert([
                    'id' => $userId,
                    'username' => $faker->unique()->userName,
                    'firstname' => $faker->firstName,
                    'lastname' => $faker->lastName,
                    'email' => $faker->unique()->safeEmail,
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                DB::table('model_has_roles')->insert([
                    'role_id' => $role->id,
                    'model_type' => 'App\Models\User',
                    'model_id' => $userId,
                ]);
            }
        }
    }
}
