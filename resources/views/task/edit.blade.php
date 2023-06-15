@extends('layouts.app')
@section('content')
<!--Form to edit a task-->
<section class="form-task">
<h4>Edit Task</h4>

<form action="{{ route('task.edit') }}" method="POST" id="formtask">
@csrf
<input class="controls" type="text" name="title" id="title" placeholder="Title" maxlength="100" value="{{$task->title}}" required>
<input class="controls" type="text" name="description" id="description" placeholder="Description" maxlength="255" value="{{$task->description}}" required>
<input class="controls" type="date" name="date" id="date" placeholder="Due date" value="{{$task->date}}" required>
<input type="hidden" value = "inprogress" name="status" id="status">
<input type="hidden" value = "{{$task->idTas}}" name="idTas">
<input type="hidden" value = "{{$task->idUse}}" name="idUse">
<input class="botons" type="submit" value="Submit">
</form>
</section>
@endsection


