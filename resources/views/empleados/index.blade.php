@extends('layouts.panel')

@section('content')
<div class="col-md-12"><div class="col text-center">
                        <h2>Empleados</h2>
                        </div>
                        <div class="col-md-12"><div class="col text-right">
                        <a href="{{ url('empleados/create') }}" class="btn btn-sm btn-success">Nuevo Empleado</a>
                        </div>
                        <br>
                <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                        <th scope="col">nombre</th>
                        <th scope="col">apellido</th>
                        <th scope="col">dui </th> 
                        <th scope="col">nit</th> 
                       <th scope="col">nit</th> 
                        <th>Actions</th>           
                        </tr>
                        </thead class="list">
                        <tbody>
                        @foreach($empleados as $empleado)
                        <tr>
                        <td>
                        {{ $empleado->nombres}}
                        </td>         
                        <td>
                        {{ $empleado->apellidos}}
                        </td>
                        <td>
                        {{ $empleado->dui}}
                        </td>
                        <td>
                        {{ $empleado->nit }}
                        </td>
                        <td>
                                {{ ($empleado->estado == 1)? "Activo" : "inactivo" }}
                            </td>
                        <td>
                        <form action="{{ url('/empleados/'.$empleado->idEmpresa)}}" method="POST">
                                @csrf
                                @method('delete')
                                <a href="{{ url('/empleados/'.$empleado->idEmpresa.'/ver')}}" class="btn btn-sm btn-primary">Ver</a>
                                <a href="{{ url('/empleados/'.$empleado->idEmpresa.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
                        <button type="submit" class="btn btn-sm btn-danger" >Eliminar</button>
                        </form>   
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                </table>
     
                
           
        </div>
    
@endsection
