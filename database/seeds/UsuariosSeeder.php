<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 20; $i++) { 
            DB::table('users')->insert(array(
                'name'=>$faker->name,
                'edad'=>$faker->numberBetween($min=18,$max=100),
                'email'=>$faker->email,
                'password'=>'12345'
            ));
        }
    }
}
