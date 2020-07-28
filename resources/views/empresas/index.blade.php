@extends('layouts.panel')

@section('content')
                        <div class="col-md-12"><div class="col text-center">
                        <h2>Empresas</h2>
                        </div>
                        <div class="col-md-12"><div class="col text-right">
                        <a href="{{ url('empresa/create') }}" class="btn btn-sm btn-success">Nueva Empresa</a>
                        </div>
                        <br>
                <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                        <th scope="col">NombrEmpresa</th>
                        <th scope="col">Nit</th>
                        <th scope="col">Telefono </th> 
                        <th scope="col">Direccion </th> 
                        <th>Actions</th>           
                        </tr>
                        </thead class="list">
                        <tbody>
                        @foreach($empresas as $key => $empresa)
                        <tr>
                        <td>
                        {{ $empresa->nombreEmpresa}}
                        </td>         
                        <td>
                        {{ $empresa->nit}}
                        </td>
                        <td>
                        {{ $empresa->telefono}}
                        </td>
                        <td>
                        {{ $empresa->direccion }}
                        <td>
                        <form action="{{ url('/empresa/'.$empresa->idEmpresa)}}" method="POST">
                                @csrf
                                @method('delete')
                                <a href="{{ url('/empresa/'.$empresa->idEmpresa.'/ver')}}" class="btn btn-sm btn-primary">Ver</a>
                                <a href="{{ url('/empresa/'.$empresa->idEmpresa.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
                        <button type="submit" class="btn btn-sm btn-danger" >Eliminar</button>
                        </form>   
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                </table>
     
                
           
        </div>
    
@endsection
