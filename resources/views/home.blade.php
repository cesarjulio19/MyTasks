@extends('layouts.app')

@section('content')
<!--Create the card of each task with your data-->
<main class="main-card">
@foreach($task as $item)
  <div class="card" >

    <div class="card-title">
    
     <h2>{{$item->title}}</h2>

    </div>

    <div class="card-body">
      <p>{{$item->description}}</p>
      <p>{{$item->date}}</p>
      @if($item->status == "complete")
      <p style="color:green;text-transform:uppercase">{{$item->status}}</p>
      @elseif($item->status == "not completed")
      <p style="color:red;text-transform:uppercase">{{$item->status}}</p>
      @else
      <p style="color:blue">{{$item->status}}</p>
      @endif
    </div>

    <div class="card-footer" >

      <div class="item">
        <div>
            <a class="" href="{{ route('task.seedit', $item) }}">{{ __('Edit') }}</a>
       </div>
      </div>

      <div class="item">
        <div>
            <a class="" href="{{ route('task.save', $item) }}">{{ __('Save') }}</a>
        </div>
      </div>

      <div class="item">
        <div>
            <a class="" href="{{ route('task.delete', $item) }}">{{ __('Delete') }}</a>
        </div>
      </div>

      <div class="item">
        <div>
            <a class="" href="{{ route('task.complete', $item) }}">{{ __('Complete') }}</a>
        </div>
      </div>



    </div>

  </div>

  @endforeach
  
</main>

@endsection
