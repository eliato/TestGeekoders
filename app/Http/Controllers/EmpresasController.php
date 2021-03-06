<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresas;
use Illuminate\Support\Facades\DB;
class EmpresasController extends Controller
{
    
    public function __construct()
    {
    	$this->middleware('auth');
    }
    public function index()
    {
    	$empresas = Empresas::all();
        return view('empresas.index',compact('empresas'));

    }

    public function create()
    {   
        $municipios = DB::table('municipios')->get();
    	return view('empresas.create',compact('municipios'));
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
             $this->perfomValidation($request);      
            $empresa= new Empresas();
             $empresa->nombreEmpresa = strtoupper($request->input('nombreEmpresa'));
             $empresa->nit = $request->input('nit');
             $empresa->telefono = $request->input('telefono');
             $empresa->direccion = $request->input('direccion');
             $empresa->id_municipio = $request->input('municipio');
             $empresa->save();
     
         
             //return back(); //lo deja donde esta
             return redirect('/empresa');
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
