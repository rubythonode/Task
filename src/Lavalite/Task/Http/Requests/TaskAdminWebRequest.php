<?php

namespace Lavalite\Task\Http\Requests;

use App\Http\Requests\Request;
use User;

class TaskAdminWebRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(\Illuminate\Http\Request $request)
    {

        if ($request->isMethod('POST') || $request->is('*/create')) {
            // Determine if the user is authorized to create an entry,
            return $request->user('admin.web')->canDo('task.task.create');
        }

        if ($request->isMethod('PUT') || $request->isMethod('PATCH') || $request->is('*/edit')) {
            // Determine if the user is authorized to update an entry,
            return $request->user('admin.web')->canDo('task.task.edit');
        }

        if ($request->isMethod('DELETE')) {
            // Determine if the user is authorized to delete an entry,
            return $request->user('admin.web')->canDo('task.task.delete');
        }

        // Determine if the user is authorized to view the module.
        return $request->user('admin.web')->canDo('task.task.view');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(\Illuminate\Http\Request $request)
    {

// validation rule for create request.
        if ($request->isMethod('POST')) {
            return [
                'task' => 'required',
            ];
        }

// Validation rule for update request.
        if ($request->isMethod('PUT') || $request->isMethod('PATCH')) {
            return [
            ];
        }

        // Default validation rule.
        return [

        ];
    }

}
