<?php
namespace App\Http\Controllers\Admin;

use Redirect;
use App\Models\Misa;
use App\Models\Rito;
use App\Models\Categoria;
use App\Models\Misacancion;
use App\Models\UsuarioMisa;
use Illuminate\Http\Request;
use App\Models\Categoriacancion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MisaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usuario_id = Auth::id();

        $usuariomisas = UsuarioMisa::with([
                            'misa' => function ($query) {
                                $query->orderBy('MISAC_Fecha', 'desc');
                            }
                        ])
                        ->where('id', $usuario_id)
                        ->get();

        $misas = $usuariomisas->pluck('misa')->sortByDesc('MISAC_Fecha');

        return view('admin.misa.index')
                ->with('misas', $misas);
    }

    public function create()
    {

        $compania_id = session('compania') ?? getCompaniaDefecto()->COMPP_Codigo;

        $misa  = new Misa();     

        $ritos = Rito::orderBy('RITOC_Orden')->get();
        
        $canciones = Categoriacancion::join('cancion','categoriacancion.CANCP_Codigo','=','cancion.CANCP_Codigo')
                ->select('cancion.*','categoriacancion.*')
                ->where('categoriacancion.COMPP_Codigo', $compania_id)
                ->orderBy('categoriacancion.CATEGCANCC_Orden','asc')
                ->get();
        
        return view('admin.misa.create',[
            'canciones'  => $canciones,
            'misa'       => $misa,
            'ritos'      => $ritos,
            'misa_canciones' => []
        ]);
    }

    public function store(Request $request)
    {
  
        try {

            DB::beginTransaction();

            //Validate
            $request->validate([
                'descripcion' => 'required',
                'tema'        => 'required',
                'fecha'       => 'required'
            ]);

            //Recuperamos variables
            $descripcion = $request->descripcion;
            $fecha       = $request->fecha;
            $tema        = $request->tema;

            //Save misa
            $misa = Misa::create([
                "MISAC_Descripcion" => $descripcion,
                "MISAC_Fecha"       => $fecha,
                "MISAC_Tema"        => $tema
            ]);

            // Save UsuarioMisa
            UsuarioMisa::create([
                "id"           => Auth::id(),
                "MISAP_Codigo" => $misa->MISAP_Codigo
            ]);    
            
            //Save MisaCancion
            $ritos = $request->except(['_token', 'descripcion', 'tema', 'fecha']);
            foreach ($ritos as $indice => $categoriacanciones) {
                $rito_id = substr($indice, strpos($indice, "_") + 1);
                foreach($categoriacanciones as $categoriacancion_id){
                    if($categoriacancion_id != ""){
                        Misacancion::create([
                            "CATEGCANCP_Codigo" => $categoriacancion_id,
                            "MISAP_Codigo"      => $misa->MISAP_Codigo,
                            "RITOP_Codigo"      => $rito_id
                        ]);                          
                    }
                }
            }            

            DB::commit();

        }
        catch (\Exception $e) {
            DB::rollback();
        }

        //Redirect
        return redirect()->route('misa.index');
        
    }

    public function edit($id){

        $compania_id = session('compania') ?? getCompaniaDefecto()->COMPP_Codigo;

        $misa = Misa::findOrFail($id);

        $misa_canciones = Misacancion::with([
                                'categoria_cancion' => function ($query) {
                                    $query->select('CATEGCANCP_Codigo', 'CANCP_Codigo', 'CATEGCANCC_Orden')
                                        ->with([
                                            'cancion' => function ($query) {
                                                $query->select('CANCP_Codigo', 'CANCC_Titulo');
                                            }
                                        ]);
                                }
                            ])
                            ->where('MISAP_Codigo', $id)
                            ->get();

        $ritos = Rito::orderBy('RITOC_Orden')->get();
        
        $canciones = Categoriacancion::join('cancion','categoriacancion.CANCP_Codigo','=','cancion.CANCP_Codigo')
                ->join('categoria','categoria.CATEGP_Codigo','=','categoriacancion.CATEGP_Codigo')
                ->select('cancion.*','categoriacancion.*')
                ->where('categoriacancion.COMPP_Codigo', $compania_id)
                ->orderBy('categoriacancion.CATEGCANCC_Orden','asc')
                ->get();                  
        
        return view("admin.misa.edit", [
            'misa'             => $misa,
            'canciones'        => $canciones,
            'misa_canciones'   => $misa_canciones,
            'ritos'            => $ritos,
        ]);
    }

    public function update(Request $request, $id)
    {

        try {
            
            DB::beginTransaction();

            Misa::where('MISAP_Codigo', $id)->update([
                "MISAC_Descripcion" => $request->descripcion,
                "MISAC_Fecha"       => $request->fecha,
                "MISAC_Tema"        => $request->tema
            ]);

            //Delete details
            Misacancion::where('MISAP_Codigo',$id)->delete();    
            
            //Update details
            foreach($_POST as $indice => $canciones){
                if(strpos($indice, "_")){
                    $pos     = strpos($indice, "_");
                    $rito_id = substr($indice, $pos+1);
                    foreach($canciones as $cancion_id){
                        if($cancion_id != ""){
                            Misacancion::create([
                                "CATEGCANCP_Codigo" => $cancion_id,
                                "MISAP_Codigo"      => $id,
                                "RITOP_Codigo"      => $rito_id
                            ]);                          
                        }
                    }
                }
            }

            DB::commit();

        }
        catch (\Exception $e) {
            DB::rollback();
            Log::error('Update Misa: ' . $e->getMessage());
        }

        return redirect()->route('misa.index');

    }

    public function destroy($id)
    {
        try {

            DB::beginTransaction();

            // Delete Usuariomisa
            Usuariomisa::where( ["id" => Auth::id(), "MISAP_Codigo" => $id] )->delete();

            // Delete Misacancion
            Misacancion::where("MISAP_Codigo", $id)->delete();

            // Delete misa
            Misa::where("MISAP_Codigo", $id)->delete();

            DB::commit();

        }
        catch (\Exception $e) {
            DB::rollback();
        }

        return redirect()->route('misa.index');

    }

}
?>