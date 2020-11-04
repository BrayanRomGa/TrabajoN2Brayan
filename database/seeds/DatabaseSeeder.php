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
        $this->call(personasSeeder::class);
        $this->call(productosSeeder::class);
        $this->call(comentariosSeeder::class);
        $this->call(UsuariosSeeder::class);
    }
}
