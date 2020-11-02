<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class personasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
        {
            //$personas=new persona();
            //$personas->nombre="brayan";
            //$personas->apellido="garcia";
            //$personas->nomUsuario="mejia";
            //$personas->contrasena="12345";
            //$personas->save();
    
            $faker = Faker::create();
            for ($i=0; $i < 20; $i++) { 
                DB::table('personas')->insert(array(
                    'nombre'=>$faker->name,
                    'apellido'=>$faker->lastName,
                    'nomUsuario'=>$faker->unique()->userName,
                    'contrasena'=>'12345'
                ));
            }
        }
    }