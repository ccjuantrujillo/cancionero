<?php

namespace App\Http\Controllers\Admin;

use Redirect;
use App\Models\Cancion;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Categoriacancion;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CancionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // Get Canciones
        $canciones = Cancion::orderBy('CANCC_Titulo','asc')->get();
        return view('admin.cancion.index')->with('canciones',$canciones);
    }

   public function list(Request $request)
   {

        $compania_id = session('compania');

        $canciones = Categoriacancion::join('cancion','categoriacancion.CANCP_Codigo','=','cancion.CANCP_Codigo')
                ->join('categoria','categoria.CATEGP_Codigo','=','categoriacancion.CATEGP_Codigo')
                ->select('cancion.*','categoriacancion.*','categoria.CATEGC_DescripcionCorta')
                ->where('categoriacancion.COMPP_Codigo', $compania_id)
                ->orderBy('categoriacancion.CATEGCANCC_Orden','asc')
                ->get();
        return response()->json($canciones);
            
    } 
    
    public function create(){
        
        $cancion = new Cancion();
        
        // Get Categorias
        $categorias = Categoria::where('COMPP_Codigo', 3)
                ->orderBy('CATEGC_Orden','asc')
                ->get();
        
        // Get numero
        $maximo = Categoriacancion::where([
                            ['COMPP_Codigo', '=', 3],
                            ['CATEGCANCC_Orden', '<', 900],
                        ])->max('CATEGCANCC_Orden');

        return view('admin.cancion.create',[
            'cancion'    => $cancion,
            'categorias' => $categorias,
            'maximo'     => $maximo + 1
        ]);
    }
    
    public function store(Request $request){

        // Get variables
        $titulo    = $request->nombre;
        $letra     = $request->contenido;
        $categoria  = $request->categoria;
        $orden      = $request->orden;
        $cancionero = $request->cancionero;
        
        // Save Cancion
        $cancion = Cancion::create([
            "CANCC_Autor"  => NULL,
            "CANCC_Titulo" => $titulo,
            "CANCC_Letra"  => htmlentities(htmlentities($letra)),
        ]);
        
        // Save Categoriacancion
        foreach($cancionero as $index => $value) {
            Categoriacancion::create([
                "COMPP_Codigo"     => $cancionero[$index],                
                "CANCP_Codigo"     => $cancion->CANCP_Codigo,
                "CATEGP_Codigo"    => $categoria[$index],
                "CATEGP_Codigo2"   => NULL,
                "CATEGCANCC_Orden" => $orden[$index],
            ]);             
        }
        
        //Redirect
        return redirect()->route('cancion.index');
        
    }
    
    public function edit($cancion_id){
        
	    $compania_id = session('compania');
        
        // Get cancion
        $cancion = Cancion::where('CANCP_Codigo', $cancion_id)->first();
		
        // Get CategoriasCancion
        $categoriacancion = Categoriacancion::join(
                    'cancion','categoriacancion.CANCP_Codigo','=','cancion.CANCP_Codigo'
                )->select('cancion.*','categoriacancion.*')
                ->where([
                    'categoriacancion.CANCP_Codigo'          => $cancion_id,
                    'categoriacancion.CATEGCANCC_FlagEstado' => 1
                ])
                ->get();        
        
        // Get Categorias
        $categorias = Categoria::where('COMPP_Codigo', $compania_id)
                ->orderBy('CATEGC_Orden')
                ->get();        
        
        return view("admin.cancion.edit", [
            'cancion'          => $cancion,
            'companiacancion'  => $categoriacancion,
            'categorias'       => $categorias,
        ]);
    }
    
    public function update(Request $request, $cancion_id){
        
        // Get variables
        $titulo    = $request->nombre;
        $letra     = $request->contenido;
        $categoria  = $request->categoria;
        $orden      = $request->orden;
        $cancionero = $request->cancionero;
        
        // Update Cancion
        $cancion = Cancion::findOrFail($cancion_id);
        $cancion->CANCC_Titulo = $titulo;
        $cancion->CANCC_Letra  = $letra;
        $cancion->save();
        
        // Logic Delete details
        Categoriacancion::where('CANCP_Codigo',$cancion_id)->update([
            "CATEGCANCC_FlagEstado" => 0
        ]);
        
        // Save Categoriacancion
        foreach($cancionero as $index => $value) {
            Categoriacancion::create([
                "CANCP_Codigo"     => $cancion_id,
                "CATEGP_Codigo"    => $categoria[$index],
                "CATEGCANCC_Orden" => $orden[$index],
                "COMPP_Codigo"     => $cancionero[$index],
            ]);             
        }        

        return Redirect::to("/cancion/listar-canciones");
    }
    
    public function destroy($cancion_id)
    {
        
        DB::beginTransaction();
        Categoriacancion::where('CANCP_Codigo', $cancion_id)->delete();
        Cancion::destroy($cancion_id);
        DB::commit();
        
        return Redirect::to("/cancion/listar-canciones");
    }
    
    public function seleccionar_cancionero($cancionero_id)
    {

        $categorias = getCategorias($cancionero_id);

        $maximo = Categoriacancion::where([
                            ['COMPP_Codigo', '=', $cancionero_id],
                            ['CATEGCANCC_Orden', '<', 900],
                        ])->max('CATEGCANCC_Orden');  
        
        return [
            'categorias' => $categorias,
            'maximo'     => $maximo + 1
        ];
        
    }

    public function eliminar_categoriacancion ($categoriacancion_id)
    {
        $categoriacancion = Categoriacancion::where('CATEGCANCP_Codigo', $categoriacancion_id)->update([
            'CATEGCANCC_FlagEstado' => 0
        ]);
        return response()->json([
            'success' => true,
            'data'    => $categoriacancion
        ]);
    }

}
