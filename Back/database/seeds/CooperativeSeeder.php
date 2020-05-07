<?php


use Illuminate\Database\Seeder;

class CooperativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Cooperative::class, 10)->create();
    }
}
