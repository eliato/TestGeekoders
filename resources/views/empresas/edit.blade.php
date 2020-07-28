@extends('layouts.panel')

@section('content')
<div class="col-md-12"><div class="col text-center">
<h2>Editar Empresa</h2> 
</div>

<div class="col-md-12"><div class="col text-right">
                <a href="{{ url('empresa') }}" class="btn btn-sm btn-dark">Cancelar</a>
                        </div>
<form action="{{ url('empresa/'.$empresas->idEmpresa) }}" method="POST" >
       @csrf
       @method('put')
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre</label>
    <input type="text" class="form-control" id="nombreEmpresa" name="nombreEmpresa" value="{{ $empresas->nombreEmpresa}}" required >
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">nit</label>
    <input type="text" class="form-control" id="nit" name="nit" value="{{ $empresas->nit}}" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Telefono</label>
    <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $empresas->telefono}}" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Municipio</label>
    
    <select class="form-control" id="municipio" name="municipio" >
   
      <option value="{{ $empresas->id_municipio}}">{{ $empresas->id_municipio}}</option>
      
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Direccion</label>
    <textarea class="form-control" id="direccion" name="direccion" rows="3">{{ $empresas->direccion}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection
