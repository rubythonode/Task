  <div class="row">

               <div class='col-md-4 col-sm-6'>{!! Form::text('parent_id')
               -> label(trans('task::task.label.parent_id'))
               -> placeholder(trans('task::task.placeholder.parent_id'))!!}
               </div>

               <div class='col-md-4 col-sm-6'>{!! Form::text('user_id')
               -> label(trans('task::task.label.user_id'))
               -> placeholder(trans('task::task.placeholder.user_id'))!!}
               </div>

               <div class='col-md-4 col-sm-6'>{!! Form::datetime('start')
               -> label(trans('task::task.label.start'))
               -> placeholder(trans('task::task.placeholder.start'))!!}
               </div>

               <div class='col-md-4 col-sm-6'>{!! Form::datetime('end')
               -> label(trans('task::task.label.end'))
               -> placeholder(trans('task::task.placeholder.end'))!!}
               </div>

               <div class='col-md-4 col-sm-6'>{!! Form::text('category')
               -> label(trans('task::task.label.category'))
               -> placeholder(trans('task::task.placeholder.category'))!!}
               </div>

               <div class='col-md-4 col-sm-6'>{!! Form::text('task')
               -> label(trans('task::task.label.task'))
               -> placeholder(trans('task::task.placeholder.task'))!!}
               </div>

               <div class='col-md-4 col-sm-6'>{!! Form::time('time_required')
               -> label(trans('task::task.label.time_required'))
               -> placeholder(trans('task::task.placeholder.time_required'))!!}
               </div>

               <div class='col-md-4 col-sm-6'>{!! Form::time('time_taken')
               -> label(trans('task::task.label.time_taken'))
               -> placeholder(trans('task::task.placeholder.time_taken'))!!}
               </div>

               <div class='col-md-4 col-sm-6'>{!! Form::text('proprity')
               -> label(trans('task::task.label.proprity'))
               -> placeholder(trans('task::task.placeholder.proprity'))!!}
               </div>

               <div class='col-md-4 col-sm-6'>{!! Form::text('status')
               -> label(trans('task::task.label.status'))
               -> placeholder(trans('task::task.placeholder.status'))!!}
               </div>

               <div class='col-md-4 col-sm-6'>{!! Form::text('created_by')
               -> label(trans('task::task.label.created_by'))
               -> placeholder(trans('task::task.placeholder.created_by'))!!}
               </div>
        </div>