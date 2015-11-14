<?php

namespace Lavalite\Task\Http\Controllers;

use App\Http\Controllers\PublicController as CMSPublicController;

class PublicController extends CMSPublicController
{
    /**
     * Constructor.
     *
     * @param type \Lavalite\Task\Interfaces\TaskRepositoryInterface $task
     *
     * @return type
     */
    public function __construct(\Lavalite\Task\Interfaces\TaskRepositoryInterface $task)
    {
        $this->model = $task;
        parent::__construct();
    }

    /**
     * Show task's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index($slug)
    {
        $data['task'] = $this->model->all();

        return $this->theme->of('task::public.task.index', $data)->render();
    }

    /**
     * Show task.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $data['task'] = $this->model->getTask($slug);

        return $this->theme->of('task::public.task.show', $data)->render();
    }
}
