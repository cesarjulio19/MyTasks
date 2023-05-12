@extends('layouts.app')

@section('content')
<!--card showing stasks data-->
<main class="main-card">
@foreach($stask as $item)
  <div class="card">

    <div class="card-title">

     <h2>{{$item->title}}</h2>

    </div>

    <div class="card-body">
      <p>{{$item->description}}</p>
    </div>

    <div class="card-footer-saved">

      <div class="item">
        <div>
            <a class="" href="{{ route('stask.seeadd', $item) }}">{{ __('Add Task') }}</a>
       </div>
      </div>

      <div class="item">
        <div>
            <a class="" href="{{ route('stask.delete', $item) }}">{{ __('Delete') }}</a>
        </div>
      </div>

    </div>

  </div>

  @endforeach
  
</main>
@endsection