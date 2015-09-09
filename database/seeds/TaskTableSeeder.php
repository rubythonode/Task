<?php

namespace Lavalite\Task;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TaskTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('tasks')->insert(array(
            // Uncomment  and edit this section for entering value to task table.
            /*
            array(
                'name'      => 'Some name',
            ),
            */

        ));

        DB::table('permissions')->insert(array(
            array(
                'name' => 'task.task.view',
                'readable_name' => 'View Task'
            ),
            array(
                'name' => 'task.task.create',
                'readable_name' => 'Create Task'
            ),
            array(
                'name' => 'task.task.edit',
                'readable_name' => 'Update Task'
            ),
            array(
                'name' => 'task.task.delete',
                'readable_name' => 'Delete Task'
            )
        ));

        DB::table('settings')->insert(array(
            // Uncomment  and edit this section for entering value to settings table.
            /*
            array(
                'key'      => 'task.task.key',
                'name'     => 'Some name',
                'value'    => 'Some value',
                'type'     => 'Default',
            ),
            */
        ));
    }
}