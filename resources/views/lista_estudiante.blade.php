@extends('dashboard')
@section('lista')
<h2>Estudiante</h2>
<br>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No Documento</th>
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Sexo</th>
      <th scope="col">Contacto</th>
      
    </tr>
  </thead>
  <tbody>
                        <tr>
                          <td>{{ $estudiantes->no_documento }}</td>
                            <td>{{ $estudiantes->nombre }}</td>
                            <td>{{ $estudiantes->apellido }}</td>
                            <td>{{ $estudiantes->sexo }}</td>
                            <td>{{ $estudiantes->contacto }}</td>
                            
                           
                        </tr>
  </tbody>
</table>

<h2>Progreso de Juego</h2>
<hr>
<h3>Nivel Bajo</h3>
<div>
  <canvas id="myChart"  width="200px" height="40px"></canvas>
</div>
<hr>
<h3>Nivel Medio</h3>
<div>
  <canvas id="myChart1"  width="200px" height="40px"></canvas>
</div>
<hr>
<h3>Nivel Alto</h3>
<div>
  <canvas id="myChart2"  width="200px" height="40px"></canvas>
</div>

<h3>Resultados</h3>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Estudiante</th>
      <th scope="col">Juego</th>
      <th scope="col">Puntuacion</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($puntos as $punto)
    <tr>
      <td>{{ $punto->id }}</td>
      <td>{{ $punto->id_estudiante }}</td>
      <td>juego {{ $punto->id_juego }}</td>
      <td>{{ $punto->puntuacion }}</td>
    </tr>

    @endforeach
  </tbody>
</table>

<hr>
<div class="container">
  <div class="row">
    <div class="col-md-12 text-center">
      <button class="btn btn-primary" >
        <i class="fas fa-book fa-sm"> Generar Reporte</i>
      </button>
      
    </div>
  </div>
</div>

@endsection