<?php
namespace App\Http\Controllers\Admin;

use App\Models\Misa;
use App\Models\Lectura;
use App\Models\UsuarioMisa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LecturaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index ()
    {
        $usuario_id = Auth::id();

        $usuariomisas = UsuarioMisa::with([
                            'misa' => function ($query) {
                                $query->select('MISAP_Codigo', 'MISAC_Descripcion', 'MISAC_Fecha')
                                        ->where('MISAC_FlagLecturas', 1);
                            }
                        ])
                        ->whereHas('misa', function ($query) {
                            return $query->where('MISAC_FlagLecturas', 1);
                        })
                        ->where('id', $usuario_id)
                        ->get();

        $usuariomisas = $usuariomisas->sortByDesc(function ($query) {
            return $query->misa->MISAC_Fecha;
        });
                        
        return view('admin.lectura.index')
                ->with('usuariomisas', $usuariomisas);
    }

    public function create (Request $request)
    {
        $misas  = Misa::select("MISAP_Codigo", "MISAC_Descripcion", "MISAC_Fecha")->where('MISAC_FlagLecturas', 0)->orderBy('MISAC_Fecha', 'desc')->get();           

        return view('admin.lectura.create',[
            'misas' => $misas
        ]);
    }

    public function store (Request $request)
    {

        try {

            DB::beginTransaction();

            $request->validate( ['misa' => 'required',] );
    
            $descripcion_lectura_1 = htmlentities($request->descripcion_lectura_1);
            $descripcion_lectura_2 = htmlentities($request->descripcion_lectura_2);
            $descripcion_evangelio = htmlentities($request->descripcion_evangelio);
            $descripcion_salmo     = htmlentities($request->descripcion_salmo);
    
            $misa                  = $request->misa;
            $titulo_lectura_1      = $request->titulo_lectura_1;
            $titulo_lectura_2      = $request->titulo_lectura_2;
            $titulo_evangelio      = $request->titulo_evangelio;        
            $titulo_salmo          = $request->titulo_salmo;

            $data = [
                ["MISAP_Codigo" => $misa, "TIPOLECP_Codigo" => 1, "LECTC_Titulo"=> $titulo_lectura_1, "LECTC_Descripcion" => $descripcion_lectura_1],
                ["MISAP_Codigo" => $misa, "TIPOLECP_Codigo" => 2, "LECTC_Titulo"=> $titulo_salmo, "LECTC_Descripcion" => $descripcion_salmo],
                ["MISAP_Codigo" => $misa, "TIPOLECP_Codigo" => 3, "LECTC_Titulo"=> $titulo_lectura_2, "LECTC_Descripcion" => $descripcion_lectura_2],
                ["MISAP_Codigo" => $misa, "TIPOLECP_Codigo" => 4, "LECTC_Titulo"=> $titulo_evangelio, "LECTC_Descripcion" => $descripcion_evangelio],
            ];
    
            Lectura::insert($data);
    
            Misa::where('MISAP_Codigo', $misa)->update( ["MISAC_FlagLecturas" => 1] );

            DB::commit();

        }
        catch (\Exception $e) {
            DB::rollback();
        }

        //Redirect
        return redirect()->route('lectura.index');  

    }

    public function edit ($id)
    {
        $misa = Misa::findOrFail($id);
        $misas  = Misa::select("MISAP_Codigo", "MISAC_Descripcion", "MISAC_Fecha")->orderBy('MISAC_Fecha', 'desc')->get(); 
        $lecturas = Lectura::where('MISAP_Codigo', $id)->get();

        return view("admin.lectura.editar", [
            'misa'      => $misa,
            'misas'     => $misas,
            'lecturas'  => $lecturas
        ]);

    }

    public function update (Request $request, $id)
    {

        try {

            DB::beginTransaction();

            Lectura::where(["MISAP_Codigo" => $id, "TIPOLECP_Codigo" => 1])->update([
                "LECTC_Titulo"      => $request->titulo_lectura_1,
                "LECTC_Descripcion" => htmlentities($request->descripcion_lectura_1),
            ]);
    
            Lectura::where(["MISAP_Codigo" => $id, "TIPOLECP_Codigo" => 2])->update([
                "LECTC_Titulo"      => $request->titulo_salmo,
                "LECTC_Descripcion" => htmlentities($request->descripcion_salmo),
            ]);
            
            Lectura::where(["MISAP_Codigo" => $id, "TIPOLECP_Codigo" => 3])->update([
                "LECTC_Titulo"      => $request->titulo_lectura_2,
                "LECTC_Descripcion" => htmlentities($request->descripcion_lectura_2),
            ]);
            
            Lectura::where(["MISAP_Codigo" => $id, "TIPOLECP_Codigo" => 4])->update([
                "LECTC_Titulo"      => $request->titulo_evangelio,
                "LECTC_Descripcion" => htmlentities($request->descripcion_evangelio),
            ]);

            DB::commit();

        }
        catch (\Exception $e) {
            DB::rollback();
        }

        return redirect()->route('lectura.index');

    }

    public function destroy ($id)
    {
        try {
            DB::beginTransaction();

            DB::commit();
        }
        catch (\Exception $e) {
            DB::rollback();
        }

        return redirect()->route('lectura.index');
    }
}
