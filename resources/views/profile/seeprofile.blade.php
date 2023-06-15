@extends('layouts.app')

@section('content')
<!--table to see thu user data-->
<div class = "flex-box" >
    <div class="flex-item">
        <table>
            <thead>
                <tr>
                   <th>Id</th>
                   <th>Name</th>
                   <th>Last Name</th>
                   <th>Birthdate</th>
                   <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$user->idUse}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->date}}</td>
                    <td>{{$user->email}}</td>
                </tr>
            </tbody>
        </table>

    </div>
<!--grafic to see the inprogress, complete and not complete tasks-->
    <div class="flex-item-grafic">
       <canvas id="myChart"></canvas>
    </div>
<!--boton to restart the complete and not complete tasks counter-->
    <div class="restart-button">
        <a href="{{ route('profile.restartg') }}">Restart Grafic</a>
    </div>
    
</div>



<script type="text/javascript">
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Inprogress', 'Complete', 'NotComplete'],
      datasets: [{
        label: 'Tasks',
        data: [{{$user->inptasks}}, {{$user->comtasks}}, {{$user->noctasks}}],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

@endsection