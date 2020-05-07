<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(
            [
                CooperativeSeeder::class,
                RoleSeeder::class,
                UserSeeder::class,

                AdressSeeder::class,
                PhoneNumberSeeder::class,
                CategorySeeder::class,
                ProductSeeder::class,
                ReviewSeeder::class,
                ImageSeeder::class,
                // CartSeeder::class,
                // OrderSeeder::class,
                // OrderProductSeeder::class
            ]
        );
    }
}
