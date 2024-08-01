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
                                $query->select('MISAP_Codigo', 'MISAC_Descripcion', 'MISAC_Fecha')
                                    ->orderBy('MISAC_Fecha','desc');
                            }
                        ])
                        ->whereHas('misa', function ($query) {
                            return $query->orderBy('MISAC_Fecha', 'desc');
                        })
                        ->where('id', $usuario_id)
                        ->get();

        return view('admin.misa.index')
                ->with('usuariomisas', $usuariomisas);
    }

    public function create()
    {

        $compania_id = session('compania') ?? getCompaniaDefecto()->COMPP_Codigo;
        $misa  = new Misa();     
        $ritos = Rito::orderBy('RITOC_Orden')->get();
        
        $canciones = Categoriacancion::join('cancion','categoriacancion.CANCP_Codigo','=','cancion.CANCP_Codigo')
                ->select('cancion.*','categoriacancion.CATEGCANCC_Orden')
                ->where('categoriacancion.COMPP_Codigo', $compania_id)
                ->orderBy('categoriacancion.CATEGCANCC_Orden','asc')
                ->get();
        
        return view('admin.misa.create',[
            'canciones'  => $canciones,
            'misa'       => $misa,
            'ritos'      => $ritos,
        ]);
    }

    public function store(Request $request)
    {
        //request()->validate(Misa::$rules);        
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
        
        //Save headers
        $misa = Misa::create([
            "MISAC_Descripcion" => $request->descripcion,
            "MISAC_Fecha"       => $request->fecha,
            "MISAC_Tema"        => $request->tema
        ]);
        
        //Save details -- ACA FALTA
        foreach($_POST as $indice => $canciones){
            if(strpos($indice, "_")){
                $pos = strpos($indice, "_");
                $categoria_id = substr($indice,$pos+1);
                foreach($canciones as $cancion_id){
                    if($cancion_id!=""){
                        Misacancion::create([
                            "CANCP_Codigo"  => $cancion_id,
                            "MISAP_Codigo"  => $misa->MISAP_Codigo,
                            "CATEGP_Codigo" => $categoria_id
                        ]);                          
                    }
                }
            }
        }
        
        //Redirect
        return Redirect::to("/misa");
    }

    public function edit($id){

        $compania_id = session('compania') ?? getCompaniaDefecto()->COMPP_Codigo;

        $misa = Misa::findOrFail($id);

        $misa_canciones = Misacancion::with([
                                'categoria_cancion' => function ($query) {
                                    $query->select('CATEGCANCP_Codigo', 'CANCP_Codigo');
                                }
                            ])
                            ->where('MISAP_Codigo', $id)
                            ->get();
        
        foreach($misa_canciones as $value){
            $arrMisacanciones[$value->RITOP_Codigo][] = $value->categoria_cancion->CANCP_Codigo;
        }

        $ritos = Rito::orderBy('RITOC_Orden')->get();
        
        $canciones = Categoriacancion::join('cancion','categoriacancion.CANCP_Codigo','=','cancion.CANCP_Codigo')
                ->join('categoria','categoria.CATEGP_Codigo','=','categoriacancion.CATEGP_Codigo')
                ->select('cancion.*','categoriacancion.CATEGCANCC_Orden','categoriacancion.CATEGP_Codigo','categoria.CATEGC_DescripcionCorta')
                ->where('categoriacancion.COMPP_Codigo', $compania_id)
                ->orderBy('categoriacancion.CATEGCANCC_Orden','asc')
                ->get();        
        
        return view("admin.misa.edit", [
            'misa'             => $misa,
            'canciones'        => $canciones,
            'arrmisacanciones' => $arrMisacanciones,
            'ritos'            => $ritos,
        ]);
    }

    public function update(Request $request, $id)
    {
        //Update header
        $misa = Misa::findOrFail($id);
        $misa->MISAC_Descripcion = $request->descripcion;
        $misa->MISAC_Fecha = $request->fecha;
        $misa->save();
        
        //Delete details
        Misacancion::where('MISAP_Codigo',$id)->delete();
        
        //Update details
        foreach($_POST as $indice => $canciones){
            if(strpos($indice, "_")){
                $pos = strpos($indice, "_");
                $categoria_id = substr($indice,$pos+1);
                foreach($canciones as $cancion_id){
                    if($cancion_id!=""){
                        Misacancion::create([
                            "CANCP_Codigo"  => $cancion_id,
                            "MISAP_Codigo"  => $misa->MISAP_Codigo,
                            "CATEGP_Codigo" => $categoria_id
                        ]);                          
                    }
                }
            }
        }
        return Redirect::to("/misa");
    }

    public function destroy($id)
    {
        Misa::destroy($id);
        return Redirect::to("/misa");
    }

}
?>