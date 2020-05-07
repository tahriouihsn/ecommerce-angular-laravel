<?php

use App\PhoneNumber;
use Illuminate\Database\Seeder;

class PhoneNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        factory(PhoneNumber::class, 10)->create();
    }
}
