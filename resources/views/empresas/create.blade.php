@extends('layouts.panel')

@section('content')

<form action="{{ url('empresa') }}" method="POST" >
       @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" class="form-control" id="nombreEmpresa" name="nombreEmpresa" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">nit</label>
    <input type="text" class="form-control" id="nit" name="nit" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Telefono</label>
    <input type="text" class="form-control" id="telefono" name="telefono" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Municipio</label>
    <input type="text" class="form-control" id="municipip" name="municipio" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Direccion</label>
    <textarea class="form-control" id="direccion" name="direccion" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection