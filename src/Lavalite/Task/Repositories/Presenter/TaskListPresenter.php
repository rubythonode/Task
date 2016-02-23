<?php

namespace Lavalite\Task\Repositories\Presenter;

use Litepie\Database\Presenter\FractalPresenter;

class TaskListPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TaskListTransformer();
    }
}