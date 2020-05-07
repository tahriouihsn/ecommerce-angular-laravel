<?php

use Illuminate\Database\Seeder;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\OrderProduct::class, 50)->create();
    }
}
