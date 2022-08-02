<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GroupTodoList;

class GroupTodoListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $e = new GroupTodoList;
        $e->groupname = 'none';
        $e->completed = 0;
        $e->save();

        //$grouptoDoList = GroupTodoList::factory()->create();
    }
}
