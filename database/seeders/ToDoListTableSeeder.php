<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TodoList;

class ToDoListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //$t = new ToDoList;
        //$t->todoname = 'make breakfast';
        //$t->completed = 0;
        //$t->group_id = 1;
        //$t->save();


        $toDoList = TodoList::factory()->count(5)->create();

    }
}
