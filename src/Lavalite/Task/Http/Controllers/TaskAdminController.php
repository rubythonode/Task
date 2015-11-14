<?php

namespace Lavalite\Task\Http\Controllers;

use Former;
use Response;
use App\Http\Controllers\AdminController as AdminController;

use Lavalite\Task\Http\Requests\TaskRequest;
use Lavalite\Task\Interfaces\TaskRepositoryInterface;

/**
 *
 * @package Tasks
 */

class TaskAdminController extends AdminController
{

    /**
     * Initialize task controller
     * @param type TaskRepositoryInterface $task
     * @return type
     */
    public function __construct(TaskRepositoryInterface $task)
    {
        $this->model = $task;
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(TaskRequest $request)
    {
        $this->theme->prependTitle(trans('task::task.names').' :: ');

        return $this->theme->of('task::admin.task.index')->render();
    }

    /**
     * Return list of task as json.
     *
     * @param  Request  $request
     *
     * @return Response
     */
    public function lists(TaskRequest $request)
    {
        $array = $this->model->json();
        foreach ($array as $key => $row) {
            $array[$key] = array_only($row, config('package.task.task.listfields'));
        }

        return array('data' => $array);
    }

    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return Response
     */
    public function show(TaskRequest $request, $id)
    {
        $task = $this->model->findOrNew($id);

        Former::populate($task);

        return view('task::admin.task.show', compact('task'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return Response
     */
    public function create(TaskRequest $request)
    {
        $task = $this->model->findOrNew(0);
        Former::populate($task);

        return view('task::admin.task.create', compact('task'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(TaskRequest $request)
    {
        if ($row = $this->model->create($request->all())) {
            return Response::json(['message' => 'Task created sucessfully', 'type' => 'success', 'title' => 'Success'], 201);
        } else {
            return Response::json(['message' => $e->getMessage(), 'type' => 'error', 'title' => 'Error'], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function edit(TaskRequest $request, $id)
    {
        $task = $this->model->find($id);

        Former::populate($task);

        return view('task::admin.task.edit', compact('task'));
    }

    /**
     * Update the specified resource.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(TaskRequest $request, $id)
    {
        if ($row = $this->model->update($request->all(), $id)) {
            return Response::json(['message' => 'Task updated sucessfully', 'type' => 'success', 'title' => 'Success'], 201);
        } else {
            return Response::json(['message' => $e->getMessage(), 'type' => 'error', 'title' => 'Error'], 400);
        }
    }

    /**
     * Remove the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(TaskRequest $request, $id)
    {
        try {
            $this->model->delete($id);
            return Response::json(['message' => 'Task deleted sucessfully'.$id, 'type' => 'success', 'title' => 'Success'], 201);
        } catch (Exception $e) {
            return Response::json(['message' => $e->getMessage(), 'type' => 'error', 'title' => 'Error'], 400);
        }
    }
}
