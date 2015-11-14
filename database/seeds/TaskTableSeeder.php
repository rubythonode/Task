<?php

namespace Lavalite\Task;

use DB;
use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tasks')->insert([
            // Uncomment  and edit this section for entering value to task table.
            /*
            array(
               "id"        => "Id",
               "parent_id"        => "Parent id",
               "user_id"        => "User id",
               "start"        => "Start",
               "end"        => "End",
               "category"        => "Category",
               "task"        => "Task",
               "time_required"        => "Time required",
               "time_taken"        => "Time taken",
               "proprity"        => "Proprity",
               "status"        => "Status",
               "created_by"        => "Created by",
               "created_at"        => "Created at",
               "updated_at"        => "Updated at",
               "deleted_at"        => "Deleted at",
            ),
            */

        ]);

        DB::table('permissions')->insert([
            [
                'name'          => 'task.task.view',
                'readable_name' => 'View Task',
            ],
            [
                'name'          => 'task.task.create',
                'readable_name' => 'Create Task',
            ],
            [
                'name'          => 'task.task.edit',
                'readable_name' => 'Update Task',
            ],
            [
                'name'          => 'task.task.delete',
                'readable_name' => 'Delete Task',
            ],
        ]);

        DB::table('settings')->insert([
            // Uncomment  and edit this section for entering value to settings table.
            /*
            array(
                'key'      => 'task.task.key',
                'name'     => 'Some name',
                'value'    => 'Some value',
                'type'     => 'Default',
            ),
            */
        ]);
    }
}
