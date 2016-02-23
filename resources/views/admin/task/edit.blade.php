<div class="box-header with-border">
    <h3 class="box-title"> Edit  task [{!!$task->name!!}] </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-primary btn-sm" id="btn-save"><i class="fa fa-floppy-o"></i> Save</button>
        <button type="button" class="btn btn-default btn-sm" id="btn-close"><i class="fa fa-times-circle"></i> Close</button>
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Task</a></li>
        </ul>
        {!!Form::vertical_open()
        ->id('edit-task')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(URL::to('admin/task/task/'. $task['id']))!!}
        <div class="tab-content">
            <div class="tab-pane active" id="details">
                @include('task::admin.task.partial.entry')
            </div>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>
<script type="text/javascript">

        (function ($) {
            $('#btn-close').click(function(){
                $('#entry-task').load('{{URL::to('admin/task/task')}}/{{$task->id}}');
            });

            $('#btn-save').click(function(){
                $('#edit-task').submit();
            });

            $('#edit-task')
            .submit( function( e ) {
                var formURL  = "{{ URL::to('admin/task/task/')}}/{{@$task->id}}";
                $.ajax( {
                    url: formURL,
                    type: 'POST',
                    data: new FormData( this ),
                    processData: false,
                    contentType: false,
                    success:function(data, textStatus, jqXHR)
                    {
                        $('#entry-task').load('{{URL::to('admin/task/task')}}/{{$task->id}}');
                        $('#main-list').DataTable().ajax.reload( null, false );
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                    }
                });
                e.preventDefault();
            });

        }(jQuery));

</script>