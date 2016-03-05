<?php

namespace Lavalite\Task\Repositories\Eloquent;

use Lavalite\Task\Interfaces\TaskRepositoryInterface;
use Litepie\Database\Eloquent\BaseRepository;

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
       public function getCount()
    {
        return  $this->model->count();
    }
     public function completed()
    {
        return  $this->model->whereStatus('completed')->count();
    }

    public function tasks()
    {
        return  $this->model->with('user')->whereStatus('to_do')->orderBy('id','DESC')->get();
    }

    public function todo()
    {
        return  $this->model->with('user')->orderBy('id','DESC')->take(6)->get();
    }

}
