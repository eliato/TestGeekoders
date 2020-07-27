@extends('layouts.panel')

@section('content')

                        <div class="col-md-12"><div class="col text-right">
                        <a href="{{ route('create') }}" class="btn btn-sm btn-success">Nueva Empresa</a>
                        </div>
                        <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email </th> 
                        <th scope="col">Phone </th> 
                        <th>Actions</th>           
                        </tr>
                        </thead class="list">
                        <tbody>
                        @foreach($empresas as $empresa)
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
                                <a href="" class="btn btn-sm btn-primary">Editar</a>
                        <button type="submit" class="btn btn-sm btn-danger" >Eliminar</button>
                        </form>   
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                </table>
     
                
           
        </div>
    
@endsection
