<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

		//$this->call('ReportsTableSeeder');
    }
}

class ProductTableSeeder extends Seeder {
 
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
 
        for($i = 0; $i<30; $i++){
 
            \DB::table('reportss')->insert(array(
                'name'         => $faker->name,
                'description'  => $faker->paragraph(),
                'serial'       => $faker->numberBetween(54826571,95653254),
                'quantity'     => $faker->numberBetween(0,1000)
            ));
        }
    }
}
