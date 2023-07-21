<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Console\Commands\CreatePermissionsCommand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // \App\Models\Manager::factory()->create([
        //     'fname' => 'Disbleer',
        //     'lname' => 'Disbleer',
        //     'email' => 'disbleer@hophearts.com.ps',
        //     'password' => Hash::make('password'),
        //     'status' => 'active',
        // ]);

        // $this->call(\Lwwcas\LaravelCountries\Database\Seeders\LcDatabaseSeeder::class);
    }
}
