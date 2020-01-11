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
        factory(Task::class)->times(5)->create();
    }
}
