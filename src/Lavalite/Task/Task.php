<?php namespace Lavalite\Task;

class Task
{

    protected $task;

    public function __construct(\Lavalite\Task\Interfaces\TaskRepositoryInterface $task)
    {
        $this->task     = $task;
    }

    /**
     * Display tasks of the user
     *
     * @return Response
     */
    public function display()
    {
                return view('task::admin.task.task');

    }


}
