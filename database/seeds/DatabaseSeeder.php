<?php

use Illuminate\Database\Seeder;

/**
 * Comando artisan para comenzar a fabricar el semillero de datos
 * php artisan migrate:fresh --seed
 * 
 */

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Registrar todos los seeder a fabricar
        $this->call(TasksTableSeeder::class);
    }
}
