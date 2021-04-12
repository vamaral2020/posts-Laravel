<?php

use Illuminate\Database\Seeder;
use \database\seeds\CreateAdminUserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(PermissionSeed::class);
         $this->call(CreateAdminUserSeeder::class);
    }
}