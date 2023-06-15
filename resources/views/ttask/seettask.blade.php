@extends('layouts.app')

@section('content')
<!--if the user is an admin the form to add ttasks is displayed-->
@if($user->role == 'A' )

<section class="form-ttask">

<form action="{{ route('ttask.insert') }}" method="POST">
@csrf
<input class="controls" type="text" name="type" id="type" placeholder="New Type" maxlength="100" value="{{ old('type') }}" required>
<input class="botons" type="submit" value="Submit">
</form>

</section>
@endif


<!--card showing the name of the task type-->
<main class="main-card">
@foreach($ttask as $item)
  <div class="card-ttask">

    <div class="card-title">

     <h2>{{$item->type}}</h2>

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
            <a class="" href="{{ route('rtask.seertask', $item) }}">{{ __('See Tasks') }}</a>
       </div>
      </div>

      <div class="item">
        <div>
            <a class="" href="{{ route('ttask.delete', $item) }}">{{ __('Delete') }}</a>
        </div>
      </div>

      <div class="item">
        <div>
            <a class="" href="{{ route('ttask.seedit', $item) }}">{{ __('Edit') }}</a>
        </div>
      </div>

    </div>

    @endif

  </div>

  @endforeach
  
</main>

@endsection