@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('task::task.name') !!} <small> {!! trans('cms.manage') !!} {!! trans('task::task.names') !!}</small>
@stop

@section('title')
{!! trans('task::task.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! URL::to('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('cms.home') !!} </a></li>
    <li class="active">{!! trans('task::task.names') !!}</li>
</ol>
@stop

@section('entry')
<div class="box box-warning" id='entry-task'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="main-list" class="table table-striped table-bordered">
    <thead>
        <th>{!! trans('task::task.label.task')!!}</th>
<th>{!! trans('task::task.label.time_required')!!}</th>
<th>{!! trans('task::task.label.time_taken')!!}</th>
<th>{!! trans('task::task.label.proprity')!!}</th>
<th>{!! trans('task::task.label.status')!!}</th>
    </thead>
</table>
@stop
@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    $('#entry-task').load('{{URL::to('admin/task/task/0')}}');
    oTable = $('#main-list').dataTable( {
        "ajax": '{{ URL::to('/admin/task/task/list') }}',
        "columns": [
        { "data": "task" },
{ "data": "time_required" },
{ "data": "time_taken" },
{ "data": "proprity" },
{ "data": "status" },],
        "taskLength": 50
    });

    $('#main-list tbody').on( 'click', 'tr', function () {
        $(this).toggleClass("selected").siblings(".selected").removeClass("selected");

        var d = $('#main-list').DataTable().row( this ).data();

        $('#entry-task').load('{{URL::to('admin/task/task')}}' + '/' + d.id);

    });
});
</script>
@stop

@section('style')
@stop