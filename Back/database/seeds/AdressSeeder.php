<?php

use App\Adress;
use Illuminate\Database\Seeder;

class AdressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        factory(App\Adress::class, 10)->create();
    }
}
