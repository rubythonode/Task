<?php

namespace Lavalite\Task\Http\Controllers;

use App\Http\Controllers\AdminController as AdminController;
use Form;
use Lavalite\Task\Http\Requests\TaskRequest;
use Lavalite\Task\Interfaces\TaskRepositoryInterface;
use Lavalite\Task\Models\Task;

/**
 *
 */
class TaskAdminController extends AdminController
{
    /**
     * Initialize task controller.
     *
     * @param type TaskRepositoryInterface $task
     *
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
        $tasks  = $this->model->setPresenter('\\Lavalite\\Task\\Repositories\\Presenter\\TaskListPresenter')->paginate(NULL, ['*']);
        $this   ->theme->prependTitle(trans('task::task.names').' :: ');
        $view   = $this->theme->of('task::admin.task.index',compact('tasks'))->render();

        $this->responseCode = 200;
        $this->responseMessage = trans('messages.success.loaded', ['Module' => 'Task']);
        $this->responseData = $tasks['data'];
        $this->responseMeta = $tasks['meta'];
        $this->responseView = $view;
        $this->responseRedirect = '';
        return $this->respond($request);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function show(TaskRequest $request, $id)
    {
        $task = $this->model->findOrNew($id);

        Form::populate($task);

        return view('task::admin.task.show', compact('task'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(TaskRequest $request)
    {
        $task = $this->model->newInstance([]);

        Form::populate($task);

        $this->responseCode = 200;
        $this->responseMessage = trans('messages.success.loaded', ['Module' => 'Task']);
        $this->responseData = $task;
        $this->responseView = view('task::admin.task.create', compact('task'));
        return $this -> respond($request);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(TaskRequest $request)
    {
        try {
            $attributes = $request->all();
            $task = $this->model->create($attributes);

            $this->responseCode = 201;
            $this->responseMessage = trans('messages.success.created', ['Module' => 'Task']);
            $this->responseData = $task;
            $this->responseMeta = '';
            $this->responseRedirect = trans_url('/admin/task/task/'.$task->getRouteKey());
            $this->responseView = view('task::admin.task.create', compact('task'));

            return $this -> respond($request);

        } catch (Exception $e) {
            $this->responseCode = 400;
            $this->responseMessage = $e->getMessage();
            return $this -> respond($request);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function edit(TaskRequest $request, $id)
    {
        $task = $this->model->find($id);

        Form::populate($task);

        return view('task::admin.task.edit', compact('task'));
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function update(TaskRequest $request, Task $task)
    {
    
        try {
            $attributes = $request->all();
            $attributes['status'] = $request->get('status');
/*print_r($task);
dd();*/
            $task->update($attributes);

            $this->responseCode = 204;
            $this->responseMessage = trans('messages.success.updated', ['Module' => 'Task']);
            $this->responseData = $task;
            $this->responseRedirect = trans_url('/admin/task/task/'.$task->getRouteKey());

            return $this -> respond($request);

        } catch (Exception $e) {

            $this->responseCode = 400;
            $this->responseMessage = $e->getMessage();
            $this->responseRedirect = trans_url('/admin/task/task/'.$task->getRouteKey());

            return $this -> respond($request);
        }
    }

    /**
     * Remove the specified resource.
     *
     * @param int $id
     *
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
