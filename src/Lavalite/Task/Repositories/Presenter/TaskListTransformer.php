<?php

namespace Lavalite\Task\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class TaskListTransformer extends TransformerAbstract
{
    public function transform(\Lavalite\Task\Models\Task $task)
    {
        return [
            'id'    => $task->eid,
            'user_id'   => $task->user_id,
            'start' => $task->start,
            'end'   => $task->end,
            'task'  => $task->task,
            'status'    => $task->status,           
        ];
    }
}