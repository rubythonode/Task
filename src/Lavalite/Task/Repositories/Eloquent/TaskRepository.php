<?php

namespace Lavalite\Task\Repositories\Eloquent;

use Lavalite\Task\Interfaces\TaskRepositoryInterface;

class TaskRepository extends BaseRepository implements TaskRepositoryInterface
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return 'Lavalite\\Task\\Models\\Task';
    }
}
