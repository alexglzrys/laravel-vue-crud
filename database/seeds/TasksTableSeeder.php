<?php

use App\Task;
use Illuminate\Database\Seeder;

/**
 * Comando artisan
 * php artisan make:seeder TasksTableSeeder
 * 
 */

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generar 35 registros falsos
        factory(Task::class)->times(35)->create();
    }
}
