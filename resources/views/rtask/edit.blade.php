@extends('layouts.app')

@section('content')
<h2 class="">{{$ttask->type}}</h2>
<!--form to edit ttasks-->
@if($user->role == 'A' )

<section class="form-task">
<h4>New Rtask</h4>

<form action="{{ route('rtask.edit') }}" method="POST">
@csrf
<input class="controls" type="text" name="title" id="title" placeholder="Title" maxlength="100" value="{{ $rtask->title }}" required>
<input class="controls" type="text" name="description" id="description" placeholder="Description" maxlength="255" value="{{ $rtask->description }}" required>
<input type="hidden" value = "{{$rtask->idRta}}" name="idRta">
<input class="botons" type="submit" value="Edit">
</form>
</section>

@endif


<!--card showing rtasks data-->
<main class="main-card">
@foreach($rtasks as $item)

  <div class="card-rtask">

    <div class="card-title">

     <h2>{{$item->title}}</h2>

    </div>

    <div class="card-body">
      <p>{{$item->description}}</p>
    </div>
   
    <!--if the user is an admin, shows the delete option-->
    @if($user->role != 'A' )
    <div class="card-footer-type">

      <div class="item">
        <div>
            <a class="" href="{{ route('rtask.seertask', $item) }}">{{ __('See Tasks') }}</a>
       </div>
      </div>

    </div>
    @else

    <div class="card-footer-admin">

      <div class="item">
        <div>
            <a class="" href="{{ route('rtask.seeadd', $item) }}">{{ __('Add Task') }}</a>
       </div>
      </div>

      <div class="item">
        <div>
            <a class="" href="{{ route('rtask.delete', $item) }}">{{ __('Delete') }}</a>
        </div>
      </div>

      <div class="item">
        <div>
            <a class="" href="{{ route('rtask.seedit', $item) }}">{{ __('Edit') }}</a>
        </div>
      </div>

    </div>
    @endif
   

  </div>

  @endforeach
  
</main>

@endsection