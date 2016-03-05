<?php

namespace Lavalite\Task;

class Task
{
    protected $task;

    public function __construct(\Lavalite\Task\Interfaces\TaskRepositoryInterface $task)
    {
        $this->task = $task;
    }

    /**
     * Display tasks of the user.
     *
     * @return Response
     */
    public function display($view)
    {
        return view('task::admin.task.'.$view);
    }
      /**
     * Returns count of tasks.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count()
    {
        return  $this->task->getCount();
    }
     public function completed()
    {
        return  $this->task->completed();
    }

    public function todo()
    {
        return  $this->task->todo();
    }

    public function tasks()
    {
        return  $this->task->tasks();
    }
}
