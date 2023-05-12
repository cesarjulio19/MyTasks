@extends('layouts.app')
@section('content')
<!--Form to add a new task-->
<section class="form-task">
<h4>New Task</h4>

<form action="{{ route('task.insert') }}" method="POST">
@csrf
<input class="controls" type="text" name="title" id="title" placeholder="Title" maxlength="100" value="{{ old('title') }}" required>
<input class="controls" type="text" name="description" id="description" placeholder="Description" maxlength="255" value="{{ old('description') }}" required>
<input class="controls" type="date" name="date" id="date" placeholder="Due date" value="{{ old('description') }}" required>
<input type="hidden" value = "inprogress" name="status" id="status">
<input class="botons" type="submit" value="Submit">
</form>
</section>
@endsection