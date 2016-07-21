<?php

namespace Lavalite\Task\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class TaskListTransformer extends TransformerAbstract
{
    public function transform(\Lavalite\Task\Models\Task $task)
    {
        return [
            'id'                => $task->getRouteKey(),
            'parent_id'         => $task->parent_id,
            'start'             => $task->start,
            'end'               => $task->end,
            'category'          => $task->category,
            'task'              => $task->task,
            'time_required'     => $task->time_required,
            'time_taken'        => $task->time_taken,
            'priority'          => $task->priority,
            'status'            => $task->status,
            'created_by'        => $task->created_by,
            'created_at'        => $task->created_at,
        ];
    }
}