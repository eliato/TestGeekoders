<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleados;
use Illuminate\Support\Facades\DB;
class EmpleadosController extends Controller
{
    
    public function __construct()
    {
    	$this->middleware('auth');
    }
    public function index()
    {
    	$empleados = Empleados::all();
        return view('empleados.index',compact('empleados'));

    }

    public function create()
    {   
        $empresas = DB::table('empresas')->get();
        $roles = DB::table('roles')->get();
    	return view('empleados.create',compact('empresas','roles'));
    }

         // funcion que sirve para validar reglas luego solo la mando a llamar.
         private function perfomValidation(Request $request)
         {
             $rules = [
                 'nombreEmpresa' => 'required|min:3'
             ];
             $message = [
                 'name.required' => 'Es necesario ingresar un nombre',
                 'name.min' => 'como minimo el nombre debe tener 3 caracteres!'
             ];
             $this->validate($request,$rules,$message);
         }
     
         public function store(Request $request)
         {
             //dd($request->all());
                  
            $empleado= new Empleados();
             $empleado->nombres = strtoupper($request->input('nombres'));
             $empleado->apellidos = strtoupper($request->input('apellidos'));
             $empleado->nit = $request->input('nit');
             $empleado->dui = $request->input('dui');
             $empleado->Empresas_idEmpresa = $request->input('empresa');
             $empleado->Roles_idRol = $request->input('rol');
             
             $empleado->save();
     
         
             //return back(); //lo deja donde esta
             return redirect('/empleados');
         }
     
         public function edit($empresa){
            $empresas= DB::table('empresas')->where('idEmpresa',$empresa)->first();
            //$empresas = empresas::where("idEmpresa",$empresa)->first();
             return view('empresas.edit', compact('empresas'));
         }

         public function editt($empresa){
            $empresas= DB::table('empresas')->where('idEmpresa',$empresa)->first();
            //$empresas = empresas::where("idEmpresa",$empresa)->first();
             return view('empresas.ver', compact('empresas'));
         }
         public function update(Request $request,$empresa)
         {
             //dd($request->all());
             $this->perfomValidation($request);             
             Empresas::where('idEmpresa', '=', $empresa)
             ->update(array('nombreEmpresa' => strtoupper($request->input('nombreEmpresa')),
                            'nit' => $request->input('nit'),
                            'telefono' =>  $request->input('telefono'),
                            'direccion' => $request->input('direccion'),
                            'id_municipio' => $request->input('municipio')
                        ));
         
             //return back(); //lo deja donde esta
             return redirect('/empresa');
         }

        public function destroy($empresa)
        {
            //DB::table('Empresas')->delete(); 	
            DB::delete('delete from empresas where idEmpresa = ?',[$empresa]);
            

            $notification = 'La Empresa  ha sido eliminada Correctamente!';
            $tiponoti = 'danger';
            return redirect('/empresa')->with(compact('notification','tiponoti'));
        }

   

}
