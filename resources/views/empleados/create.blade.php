@extends('layouts.panel')

@section('content')
<div class="col-md-12"><div class="col text-center">
<h2>Nuevo Empleado</h2> 
</div>
<div class="col-md-12"><div class="col text-right">
                        <a href="{{ url('empleados') }}" class="btn btn-sm btn-dark">Atras</a>
                        </div>
<form action="{{ url('empleados') }}" method="POST" >
       @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" class="form-control" id="nombres" name="nombres" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">apellidos</label>
    <input type="text" class="form-control" id="apellidos" name="apellidos" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">dui</label>
    <input type="number" class="form-control" id="dui" name="dui" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">nit</label>
    <input type="text" class="form-control" id="nit" name="nit" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Empresa</label>    
    <select class="form-control" id="empresa" name="empresa" >
    @foreach($empresas as $empresa)
      <option value="{{ $empresa->idEmpresa}}">{{ $empresa->nombreEmpresa}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Rol</label>    
    <select class="form-control" id="rol" name="rol" >
    @foreach($roles as $rol)
      <option value="{{ $rol->idRol}}">{{ $rol->nombreRol}}</option>
      @endforeach
    </select>
  </div>
  
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection
