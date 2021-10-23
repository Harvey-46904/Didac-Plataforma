@extends('dashboard')
@section('registro')
<h2>Registro Estudiantes</h2>
<br>
@if (Session::get('correcto'))

                <div class="alert alert-success">
                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="tim-icons icon-simple-remove"></i>
                    </button>
                    <span><b></b> {!! \Session::get('correcto') !!}</span>
                  </div>
               
                @endif
<form method="POST" action="{{ route('registro_estudiantes') }}">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="exampleFormControlInput1">No Documento</label>
      <input type="text" class="form-control" id="" placeholder="" name="no_documento" required>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Nombres</label>
        <input type="text" class="form-control" id="" placeholder="" name="nombre" required>
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Apellidos</label>
        <input type="text" class="form-control" id="" placeholder="" name="apellido" required>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Sexo</label>
        <select class="form-control" id="" name="sexo">
          <option>M</option>
          <option>F</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Contacto</label>
        <input type="text" class="form-control" id="" placeholder="" name="contacto" required>
      </div>
<input type="submit" value="Registrar" class="btn btn-primary mb-2">
</form>
<hr>
<h2>Lista de Estudiantes</h2>
<br>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No Documento</th>
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Sexo</th>
      <th scope="col">Contacto</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($estudiantes as $estudiante)    
                        <tr>
                          <td>{{ $estudiante->no_documento }}</td>
                            <td>{{ $estudiante->nombre }}</td>
                            <td>{{ $estudiante->apellido }}</td>
                            <td>{{ $estudiante->sexo }}</td>
                            <td>{{ $estudiante->contacto }}</td>
                            
                            <td><a href="{{route("estudiantes_lista",$estudiante->id)}}" class="btn btn-primary">Mirar</a></td>
                        </tr>
            @endforeach
    
  </tbody>
</table>
@endsection
