{!!Form::vertical_open()
->id('create-task-task')
->method('POST')
->files('true')
->action(URL::to('admin/tasks/task'))!!}
<div class="input-group">
    <input type="hidden" name="status" value="to_do" placeholder="Add new task." class="input input-sm form-control">
    <input type="text" name="task" placeholder="Add new task." class="input input-sm form-control" required="required">
    <span class="input-group-btn">
        <button type="submit" class="btn btn-sm btn-white"> <i class="fa fa-plus"></i> Add task</button>
    </span>
</div>
{!! Form::close() !!}