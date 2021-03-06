@extends('layouts.panel')

@section('content')
<div class="col-md-12"><div class="col text-center">
<h2>Nueva Empresa</h2> 
</div>
<div class="col-md-12"><div class="col text-right">
                        <a href="{{ url('empresa') }}" class="btn btn-sm btn-dark">Atras</a>
                        </div>
<form action="{{ url('empresa') }}" method="POST" >
       @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" class="form-control" id="nombreEmpresa" name="nombreEmpresa" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">nit</label>
    <input type="text" class="form-control" id="nit" name="nit" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Telefono</label>
    <input type="text" class="form-control" id="telefono" name="telefono" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Municipio</label>
    
    <select class="form-control" id="municipio" name="municipio" >
    @foreach($municipios as $municipio)
      <option value="{{ $municipio->Id}}">{{ $municipio->nombreMunicipio}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Direccion</label>
    <textarea class="form-control" id="direccion" name="direccion" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection
